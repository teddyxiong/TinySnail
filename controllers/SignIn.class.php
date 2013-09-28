<?php
if(!defined('SNAIL')) exit('Illegal Request');
class SignIn extends Base{

	public $code;
	public $github;

	public function __construct()
	{
		Base::__construct(); 
		$this->github = new GitHub();
		$this->code = g('code', false, false);
	}

	public function run() {
		if (false == $this->code) {
			$this->github->requestGitHub();
		} else {
			$user_info = $this->github->getUserInfo();
			var_dump($user_info);
			// todo 是否已注册
			// todo 注册和登录
			// todo 更新最近登录记录
			// todo 记SESSION
		}
		//$this->tpl->assign('name','Ned');
		//$this->tpl->display('signin.html');
	}
}
