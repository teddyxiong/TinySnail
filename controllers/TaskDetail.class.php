<?php
if(!defined('SNAIL')) exit('Illegal Request');
require PATH_LIBS_VENDORS.DS."PHPMarkdown-1.2.7/Michelf/Markdown.php";
require PATH_LIBS_VENDORS.DS."PHPMarkdown-1.2.7/Michelf/MarkdownExtra.php";
use \Michelf\Markdown;
class TaskDetail extends Base{

	public function run() {
		$id = g("id", false, '');
		$mem_obj = new Memcached();
		$task_model = new TaskModel();
		$comment_model = new CommentModel();
		$task_cate_model = new TaskCateModel();

		// 评论的总数
		$total_page = $comment_model->getTotalNumberByTid($id);
		// 当前页的评论
		$page_num = g("p", false, 1);
		if ($page_num < 1) $page_num = 1;
		$pages = ceil(($total_page['total']/COMMENT_PAGE_OFFSET));
		if ($page_num > $pages) $page_num = $pages;

		$page = pages_info($total_page['total'], $page_num, COMMENT_PAGE_OFFSET);

		$comments = $comment_model->getAllCommentByTid($id, $page_num, COMMENT_PAGE_OFFSET);
		if (empty($comments)) {
			$comments = [];
		}
		if (!empty($comments['cid'])) {
			$tmp = $comments;
			$comments = [];
			$comments[] = $tmp;
			unset($tmp);
		}

		$comment_ids = array();

		foreach($comments as $key=>$val) {
			$comments[$key]['create_time'] = fromat_view_date($val['create_time']);
			$comments[$key]['comment'] = Markdown::defaultTransform($val['comment']);
			$comments[$key]['floor'] = ($key+1)+($page_num-1)*COMMENT_PAGE_OFFSET;
			$comment_ids[] = $val['cid'];
		}

		// 取得评论数据
		$replys = $comment_model->getAllReplyByCid($comment_ids);
		if (!empty($replys['rid'])) {
			$tmp = $replys;
			$replys = [];
			$replys[] = $tmp;
		}
		$reply_list = [];
		foreach($replys as $reply_info) {
			$reply_info['create_time'] = fromat_view_date($reply_info['create_time']);
			$reply_info['reply'] = Markdown::defaultTransform($reply_info['reply']);
			$reply_list[$reply_info['cid']][] = $reply_info;
		}

		 // 评论
		$post_type = p('post_type', true,'');
		if ('task_comment' == $post_type) {
			$div_id = p('alert_div_id', true, 'alert_danger');
			$post = [];
			$post['uid'] = User::getUid();

			$mem_key = "last_comment_user_{$post['uid']}";

			$last_comment_id = $mem_obj->get($mem_key);
			if (!empty($last_comment_id)) {
				$error = "对不起，5分钟内您只能发表一次评论。";                                               
				$this->veiwNotice($error, $div_id);
			}

			$post['comment'] = p('comment', true, '');
			$post['cid'] = NULL;
			$post['tid'] = $id;
			$post['create_time'] = time();
			$post['create_ip'] = get_client_ip();
			$post['status'] = COMMENT_NORMAL;

			if (empty($post['comment']) || mb_strlen($post['comment']) < 3 || mb_strlen($post['comment']) > 1000) {
				$error = "评论内容必需大于3个字符小于1000个字符。";
				$this->veiwNotice($error, $div_id);
			}

			$comment_id = $comment_model->addComment($post);
			if (!empty($comment_id)) { 
				$task_model->comments($id); // 评论数加1
				$mem_obj->set($mem_key, $comment_id, MEMCACHE_COMPRESSED,COMMENT_MAX_EXTENT);
				$url = DOMAIN."/jump/taskcomment/$id";
				$this->pageJump($url);
			}
			$this->veiwNotice("未知错误 [ 数据库写入失败 ] !!!", $div_id);
		} else if ('reply' == $post_type) {
			$div_id = p('alert_div_id', true, 'alert_danger');
			$post = [];
			$post['uid'] = User::getUid();

			$mem_key = "last_comment_user_{$post['uid']}";
			$last_comment_id = $mem_obj->get($mem_key);
			if (!empty($last_comment_id)) {
				$error = "对不起，5分钟内您只能发表一次评论。";                                               
				$this->veiwNotice($error, $div_id);
			}

			$post['reply'] = p('comment', true, '');
			$post['cid'] = p('comment_id', true, '');
			$post['reply_uid'] = p('reply_uid', true, '');
			$post['reply_username'] = p('reply_username', true, '');
			$post['create_time'] = time();
			$post['create_ip'] = get_client_ip();
			$post['status'] = COMMENT_NORMAL;

			if (empty($post['reply']) || mb_strlen($post['reply']) < 3 || mb_strlen($post['reply']) > 1000) {
				$error = "评论内容必需大于3个字符小于500个字符。";
				$this->veiwNotice($error, $div_id);
			}

			$reply_id = $comment_model->addReply($post);
			if (!empty($reply_id)) { 
				$task_model->comments($id); // 评论数加1
				$mem_obj->set($mem_key, $reply_id, MEMCACHE_COMPRESSED,COMMENT_MAX_EXTENT);
				$url = DOMAIN."/jump/taskcomment/$id";
				$this->pageJump($url);
			}
			$this->veiwNotice("未知错误 [ 数据库写入失败 ] !!!", $div_id);

		}

		$all_cate = $task_cate_model->allCate();

		$task_info = $task_model->fetchOneTask($id);

		//点击数加1
		$task_model->hits($task_info['tid']);

		$task_info['description'] = Markdown::defaultTransform($task_info['description']);
		$task_info['create_time'] = fromat_view_date($task_info['create_time']);

		$total_time = $task_info['finish_time']-$task_info['begin_time'];
		$remaining_time = $task_info['finish_time']-time();

		if ($remaining_time < 1) {
			$task_info['schedule'] = 100;
			$begin_time = date("Y-m-d", $task_info['begin_time']);
			$finish_time = date("Y-m-d", $task_info['finish_time']);
			$task_info['schedule_txt'] = "任务已结束[$begin_time $finish_time]";
			$task_info['schedule_txt_local'] = "left";
		} else if ($remaining_time > ($total_time-$remaining_time)) {
			$task_info['schedule'] = ceil((1-$remaining_time/$total_time)*100);
			$task_info['schedule_txt'] = "距任务结束还有：".ceil($remaining_time/86400)."天";
			$task_info['schedule_txt_local'] = "right";
		} else {
			$task_info['schedule'] = ceil((1-$remaining_time/$total_time)*100);
			$task_info['schedule_txt'] = "距任务结束还有：".ceil($remaining_time/86400)."天";
			$task_info['schedule_txt_local'] = "left";
		}

		$this->tpl->assign('task_info',$task_info);
		$this->tpl->assign('all_cate',$all_cate);
		$this->tpl->assign('comments',$comments);
		$this->tpl->assign('reply_list',$reply_list);
		$this->tpl->assign('page',$page);

		$this->tpl->display('task_detail.html');
	}
}
