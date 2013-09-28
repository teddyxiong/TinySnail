<?php
if(!defined('SNAIL')) exit('Illegal Request');
class Index extends Base{

	public function run() {
		$userModel = new UserModel();
		$this->tpl->assign('name','Ned');
		$this->tpl->display('index.html');
	}
}
