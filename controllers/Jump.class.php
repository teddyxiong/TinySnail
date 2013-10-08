<?php
if(!defined('SNAIL')) exit('Illegal Request');
class Jump extends Base{

	public function run() {

		$base_model = new BaseModel();

		$type = g('type', false, '');
		$callback_id = g('callback_id', false, '');

		$callback_info = $base_model->getCallbackInfo($type, $callback_id);

		if (false == $callback_info) {
			redirect(DOMAIN);
		}

		$this->tpl->assign('callback_info',$callback_info);

		$this->tpl->display('jump.html');
	}
}
