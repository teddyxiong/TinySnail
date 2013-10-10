<?php
if(!defined('SNAIL')) exit('Illegal Request');
require PATH_LIBS_VENDORS.DS."PHPMarkdown-1.2.7/Michelf/Markdown.php";
require PATH_LIBS_VENDORS.DS."PHPMarkdown-1.2.7/Michelf/MarkdownExtra.php";
use \Michelf\Markdown;
class TaskDetail extends Base{

	public function run() {
		$id = g("id", false, '');
		$task_model = new TaskModel();
		$task_cate_model = new TaskCateModel();

		$all_cate = $task_cate_model->allCate();

		$task_info = $task_model->fetchOneTask($id);

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

		$this->tpl->display('task_detail.html');
	}
}
