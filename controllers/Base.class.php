<?php
if(!defined('SNAIL')) exit('Illegal Request');
class Base {

    protected $tpl;	

	public function __construct()
	{
		$this->tpl = new Template();
		$this->tpl->assign('userinfo', User::getCurrentLoginUser());
		$this->tpl->assign('uid', User::getUid());
	}
}
