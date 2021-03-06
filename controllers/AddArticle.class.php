<?php
if(!defined('SNAIL')) exit('Illegal Request');
class AddArticle extends Base{

	private $errors = [];

	public function run() {
		$task_model = new TaskModel();
		$article_model = new ArticleModel();
		$task_cate_model = new TaskCateModel();

		$tid = g('tid', true, '');
		$uid = User::getUid();

		if (empty($tid)) {
			redirect(DOMAIN);
		}


                $id = g('id', false, '');
                $action = g('action', false, '');
                if ($action == 'edit' && !empty($id)) {
                        $article_info = $article_model->fetchOneArticle($id);
                        if (!empty($article_info) && is_array($article_info) && $article_info['uid']==$this->uid) {
                                $this->tpl->assign('action', $action);
                                $this->tpl->assign('article_info', $article_info);
                        }
                }

		$task_info = $task_model->fetchOneTask($tid);
		if (empty($task_info) || $task_info['uid'] != $uid) {
			redirect(DOMAIN);
		}

$article_item = $article_model->fetchOneArticleByTid($tid);
if (!empty($article_item['aid'])) {
	if ($action != 'edit' && $_POST['action_type'] != 'edit') {
			redirect(DOMAIN);
}
}

		$post_type = p('post_type', false, '');

		if ('add' == $post_type) {
			$post = [];
			$post['aid'] = null;
			$post['cate_id'] = p('task_cate_id', true, '');
			$post['tid'] = $tid;
			$post['uid'] = $uid;
			$post['user_name'] = $user_info['user_name'];
			$post['subject'] = p('subject', true, '');
			$post['article'] = p('article', true, '');
			$post['hits'] = 0;
			$post['create_time'] = $post['last_time'] = time();
			$post['create_ip'] = $post['last_ip'] = get_client_ip();

			if (empty($post['subject']) || mb_strlen($post['subject']) < 3 || mb_strlen($post['subject']) > 150) {
				$this->errors[] = '文章标题必需大于等于3个汉字小于等于150个汉字,并且只允许输入汉字、字母和数字。';
			}

			if (empty($post['article']) || mb_strlen($post['article']) < 15 || mb_strlen($post['article']) > 8000) {
				$this->errors[] = '文章描述必需大于等于15个汉字；小于等于8000个字符,并且只允许输入汉字、字母和数字和MarkDown的语法。';
			}

			$div_id = p('alert_div_id', false, 'alert_danger');
			if (!empty($this->errors[0])) {
				$this->veiwNotice($this->errors[0], $div_id);
			}

			$action_type = p("action_type", false, '');
			$edit_aid    = p("edit_aid", false, '');


			if ('edit' == $action_type && !empty($edit_aid)) {
				$modify_info = ['cate_id'=>$post['cate_id'],
                        		'subject'=>$post['subject'],
                        		'article'=>$post['article'],
                        		'last_time' => time(),
                        		'last_ip' => get_client_ip(),
				];
				$article_id = $article_model->modifyArticle($edit_aid, $modify_info);
                        if (!empty($article_id)) {
                            $task_model->setStatus($tid, TASK_STATUS_FINISHED);
                                $user_model = new UserModel();                                                    
                
                                $user_model->modifyScore($this->uid, 'create_article'); // 增加积分
                                $url = DOMAIN."/jump/article/$edit_aid/";
                                $this->pageJump($url);
                        }
} else {

			$article_id = $article_model->addArticle($post);
			if (!empty($article_id)) {
			    $task_model->setStatus($tid, TASK_STATUS_FINISHED);
				$user_model = new UserModel();                                                                    
				$user_model->modifyScore($this->uid, 'create_article'); // 增加积分
				$url = DOMAIN."/jump/article/$article_id/";
				$this->pageJump($url);
			}
}
            $this->veiwNotice("未知错误 [ 数据库写入失败 ] !!!", $div_id);
		} 
		elseif ('edit' == $post_type) {
		
		}

		$all_cate = $task_cate_model->allCate();

		$this->tpl->assign('task_info',$task_info);
		$this->tpl->assign('all_cate',$all_cate);

		$this->tpl->display('add_article.html');
	}
}
