<?php
if(!defined('SNAIL')) exit('Illegal Request');
class SignOut extends Base{

	public function __construct()
	{
		Base::__construct(); 
	}

	public function run() {
		$lib_user = new User();
		$lib_user->setSiteCookie(array(), -86400);
		redirect(DOMAIN);
	}
}
