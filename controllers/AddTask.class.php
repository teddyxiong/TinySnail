<?php
if(!defined('SNAIL')) exit('Illegal Request');
class AddTask extends Base{

	private $errors = [];

	public function run() {
		$task_model = new TaskModel();
		$task_cate_model = new TaskCateModel();

		$post_type = p('post_type', false, '');

		if ('add_task' == $post_type) {
			$post = [];
			$post['subject'] = p('subject', false, '');
			$post['begin_time'] = p('begin_time', false, '');
			$post['finish_time'] = p('finish_time', false, '');
			$post['task_cate_id'] = p('task_cate_id', false, '');
			$post['description'] = p('description', false, '');
			$post['status'] = TASK_STATUS_ONGOING;
			$post['comment_last_time'] = time();
			$now = time();
			$ip = get_client_ip();
			$begin_for_today = mktime(0,0,0,date("m"),date("d"),date("Y"));

			if (empty($post['subject']) || mb_strlen($post['subject']) < 3 && mb_strlen($post['subject']) > 150) {
				$this->errors[] = '任务标题必需大于等于3个汉字小于等于150个汉字,并且只允许输入汉字、字母和数字。';
			}

			$post['begin_time'] = strtotime($post['begin_time']);
			$post['finish_time'] = strtotime($post['finish_time']);
			if (empty($post['begin_time']) || empty($post['finish_time']) || $post['begin_time'] < $begin_for_today || $post['begin_time'] >= $post['finish_time']) {
				$this->errors[] = '任务的开始时间最早必需是今天；结束时间必需大于开始时间。';
			}

			if (empty($post['description']) || mb_strlen($post['description']) < 15 || mb_strlen($post['description']) > 8000) {
				var_dump($post['description']);
				$this->errors[] = '任务描述必需大于等于15个汉字；小于等于8000个字符,并且只允许输入汉字、字母和数字和MarkDown的语法。';
			}

			$div_id = p('alert_div_id', false, 'alert_danger');
			if (!empty($this->errors[0])) {
				$this->veiwNotice($this->errors[0], $div_id);
			}

			$post['tid'] = NULL;
			$post['uid'] = User::getUid();
			$post['article_id'] = 0;
			$post['point'] = 2;
			$post['status'] = 1; //进行中，未完成，已完成
			$post['comments'] = 0;
			$post['hits'] = 0;
			$post['confirmation_number'] = 0;
			$post['questioned_number'] = 0;
			$post['create_time'] = $now;
			$post['create_ip'] = $ip;
			$post['last_time'] = $now; 
			$post['last_ip'] = $ip;

			$task_id = $task_model->addTask($post);
			if (!empty($task_id)) {
				$url = DOMAIN."/jump/addtask/$task_id";
				$this->pageJump($url);
			}
            $this->veiwNotice("未知错误 [ 数据库写入失败 ] !!!", $div_id);
		} 
		elseif ('edit_task' == $post_type) {
		
		}

		$now = time();
		$default_begin_time  = date("Y-m-d", $now);
		$default_finish_time = date("Y-m-d", ($now+86400*7));

		$all_cate = $task_cate_model->allCate();

		$this->tpl->assign('default_begin_time',$default_begin_time);
		$this->tpl->assign('default_finish_time',$default_finish_time);
		$this->tpl->assign('all_cate',$all_cate);

		$this->tpl->display('add_task.html');
	}
}
