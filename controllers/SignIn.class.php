<?php
if(!defined('SNAIL')) exit('Illegal Request');
class SignIn extends Base{

	public $code;
	public $github;
	private $referer_key;

	public function __construct()
	{
		Base::__construct(); 
		$this->github = new GitHub();
		$this->code = g('code', false, false);

		$this->referer_key = $this->uid."referer";
		if (empty($_COOKIE[$this->referer_key])) {
			setcookie($this->referer_key, $_SERVER['HTTP_REFERER']);
		}
	}

	public function run() {
		if (false == $this->code) {
			$this->github->requestGitHub();
		} else {
			$user_info = $this->github->getUserInfo();
			if (empty($user_info)) {
				display_error_page('取用户失败', '无法从github取得用户信息');
			}
			$user_info = object_to_array($user_info);
			$user_model = new UserModel();

			if (empty($user_info['email'])) {
				$user_info['email'] = $user_info['login']."@github.com";
			}

			// 用户不存在时先注册和绑定帐号
			$existing_uid = $user_model->userIsExists($user_info['login'], $user_info['email']);
			if (false==$existing_uid){
				$pwd = $user_info['login'];
				$uid = $user_model->registerNewUser($user_info['login'], $user_info['email'], $pwd,$pwd,$user_info['avatar_url']);
				if (is_array($uid)) {
					display_error_page('注册失败', $uid[0]);
				}

				$user_model->bindUser($uid, $user_info, SN_GITHUB_FLAG);
			}

			$uuid = !empty($existing_uid) ? $existing_uid : $uid;
			$userinfo = $user_model->getUserByUid($uuid);

			$cookie_info = [
				'uid'=>$userinfo['uid'],
				'user_password'=>$userinfo['user_password_hash'],
				'binduid'=>$userinfo['binduid'],
				'user_name'=>$userinfo['user_name'],
				'avatar'=>$userinfo ['avatar'],
				'user_email'=>$userinfo['user_email']
			];
			// 登录
			$lib_user =  new User();
			$lib_user->setSiteCookie($cookie_info,SN_COOKIE_EXPIRE_TIME);

			// 更新最近登录记录
			$user_model->lastLogin($uuid);
			if (!empty($_COOKIE[$this->referer_key])) {
				redirect($_COOKIE[$this->referer_key]);
			}
			redirect(DOMAIN);
		}
		//$this->tpl->assign('name','Ned');
		//$this->tpl->display('signin.html');
	}
}
