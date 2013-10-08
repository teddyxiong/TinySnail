<?php
if(!defined('SNAIL')) exit('Illegal Request');
class TaskDetail extends Base{

	public function run() {
		$id = g("id", false, '');
		$task_model = new TaskModel();
		$task_cate_model = new TaskCateModel();

		$all_cate = $task_cate_model->allCate();

		$task_info = $task_model->fetchOneTask($id);

		$this->tpl->assign('task_info',$task_info);
		$this->tpl->assign('all_cate',$all_cate);

		$this->tpl->display('task_detail.html');
	}
}
