<?php
if(!defined('SNAIL')) exit('Illegal Request');
class Index extends Base{

	public function run() {
		$task_model = new TaskModel();
		$tasks = $task_model->fetchAllTask();
		$this->tpl->assign('tasks',$tasks);
		$this->tpl->display('index.html');
	}
}
