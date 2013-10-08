<?php
if(!defined('SNAIL')) exit('Illegal Request');
class AddTask extends Base{

	public function run() {
		$task_model = new TaskModel();
		$task_cate_model = new TaskCateModel();

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
