<?php
if(!defined('SNAIL')) exit('Illegal Request');
class Account extends Base{

	public function run() {
		$task_model = new TaskModel();
		$user_model = new UserModel();

		$tasks = $task_model->fetchAllTask();

		$tabs = ["task", "article", "fans", "follower", "send_message", "message", "settings"];
		$tab = g("tab", true, 'task');
		if (!in_array($tab, $tabs)) {
			$tab = 'task';
		}

		$user_name = g("user_name", true, '');

		$user_info = $user_model->getUserByName($user_name);
		$user_info['extend'] = unserialize($user_info['extend']);
		$user_info['user_registration_timeline'] = date("Y-m-d H:i:s", $user_info['user_registration_timeline']);
		
		$this->tpl->assign('tab',$tab);
		$this->tpl->assign('tasks',$tasks);
		$this->tpl->assign('user_info',$user_info);
		$this->tpl->display('account.html');
	}
}
