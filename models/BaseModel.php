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
			$ret['default_url'] = DOMAIN."/task_detail/{$callback_id}/";
			$ret['plans_url'] = DOMAIN;
			$ret['mrefreshtime'] = 3000; //默认3秒后跳转
		} else if ('edittask' == $type) {
			$ret['label_txt_1'] = '任务';
			$ret['label_txt_2'] = '任务详情';
			$ret['label_txt_3'] = '任务列表';
			$ret['default_url'] = DOMAIN."/task_detail/{$callback_id}/";
			$ret['plans_url'] = DOMAIN;
			$ret['mrefreshtime'] = 3000; //默认3秒后跳转
		} else if ('taskcomment' == $type) {
			$ret['label_txt_1'] = '评论';
			$ret['label_txt_2'] = '评论详情';
			$ret['label_txt_3'] = '任务列表';
			$ret['default_url'] = DOMAIN."/task_detail/{$callback_id}/#comment";
			$ret['plans_url'] = DOMAIN;
			$ret['mrefreshtime'] = 3000; //默认3秒后跳转
		} else if ('article' == $type) {
			$ret['label_txt_1'] = '文章';
			$ret['label_txt_2'] = '文章详情';
			$ret['label_txt_3'] = '文章列表';
			$ret['default_url'] = DOMAIN."/article_detail/{$callback_id}/";
			$ret['plans_url'] = DOMAIN;
			$ret['mrefreshtime'] = 3000; //默认3秒后跳转
		}else if ('articlecomment' == $type) {
			$ret['label_txt_1'] = '评论';
			$ret['label_txt_2'] = '评论详情';
			$ret['label_txt_3'] = '任务列表';
			$ret['default_url'] = DOMAIN."/article_detail/{$callback_id}/#comment";
			$ret['plans_url'] = DOMAIN;
			$ret['mrefreshtime'] = 3000; //默认3秒后跳转
		} else if ('taskattach' == $type) {
			$ret['label_txt_1'] = '附加信息';
			$ret['label_txt_2'] = '任务详情';
			$ret['label_txt_3'] = '任务列表';
			$ret['default_url'] = DOMAIN."/task_detail/{$callback_id}/";
			$ret['plans_url'] = DOMAIN;
			$ret['mrefreshtime'] = 3000; //默认3秒后跳转
		} else if ('settings' == $type) {
			$ret['label_txt_1'] = '说明信息';
			$ret['label_txt_2'] = '设置';
			$ret['label_txt_3'] = '设置页面';
			$ret['default_url'] = DOMAIN."/u/{$callback_id}/?tab=settings";
			$ret['plans_url'] = DOMAIN;
			$ret['mrefreshtime'] = 3000; //默认3秒后跳转
		} else {
			return false;
		}

		return $ret;
	}
}

