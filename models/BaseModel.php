<?php
if(!defined('SNAIL')) exit('Illegal Request');

class BaseModel {

	public $db;

	public function __construct()
	{
		$this->db = new MySQL();
	}

	public function getCallbackInfo($type, $callback_id) {
		$ret = [];

		if (empty($type) || empty($callback_id)) return false;

		if ('addtask' == $type) {
			$ret['label_txt_1'] = '任务';
			$ret['label_txt_2'] = '任务详情';
			$ret['label_txt_3'] = '任务列表';
			$ret['default_url'] = DOMAIN."/task_detail/{$callback_id}";
			$ret['plans_url'] = DOMAIN;
			$ret['mrefreshtime'] = 3000; //默认3秒后跳转
		} else {
			return false;
		}

		return $ret;
	}
}

