<?php
if(!defined('SNAIL')) exit('Illegal Request');
class Index extends Base{

	public function run() {
		$task_model = new TaskModel();

		// 自动更新已经结束的任务的状态
		$task_model->autoUpdateOverdueTask();

		// 任务总数
		$task_total= $task_model->fetchTotal();

		// 任务列表
		$p = g("p", true, 1);
		if ($p < 1) $p = 1;

		$pages = ceil(($task_total/TASK_PAGE_OFFSET));

		if ($p > $pages) $p = $pages;

		$page_info = pages_info($task_total, $p, TASK_PAGE_OFFSET);

		$task_list = $task_model->fetchAllTask($p, TASK_PAGE_OFFSET);
		if (!empty($task_list['tid'])) {
			$tmp = $task_list;
			$task_list = array(0=>$tmp);
		}
		foreach($task_list as $k=>$task) {
			$remain = $task['create_time'] - time();
			$task_list[$k]['create_time'] = fromat_view_date($task['create_time']);
			$task_list[$k]['comment_last_time'] = fromat_view_date($task['comment_last_time']);
		}

		$this->tpl->assign('tasks',$task_list);
		$this->tpl->assign('page_info',$page_info);
		$this->tpl->display('index.html');
	}
}
