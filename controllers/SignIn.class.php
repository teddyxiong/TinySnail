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
			if (empty($user_info)) {
				display_error_page('取用户失败', '无法从github取得用户信息');
			}
			$user_info = object_to_array($user_info);
			$user_model = new UserModel();

			// 用户不存在时先注册和绑定帐号
			$existing_uid = $user_model->userIsExists($user_info['name'], $user_info['email']);
			if (false==$existing_uid){
				$pwd = $user_info['name'];
				$uid = $user_model->registerNewUser($user_info['name'], $user_info['email'], $pwd,$pwd,$user_info['avatar_url']);
				if (is_array($uid)) {
					display_error_page('注册失败', $uid[0]);
				}

				$user_model->bindUser($uid, $user_info, SN_GITHUB_FLAG);
			}

			$uuid = !empty($existing_uid) ? $existing_uid : $uid;
			$userinfo = $user_model->getUserByUid($uuid);

			$cookie_info = [
				'loginuser_uid'=>$userinfo['uid'],
				'pwd'=>$userinfo['user_password_hash'],
				'binduid'=>$userinfo['binduid'],
				'loginuser_name'=>$userinfo['user_name'],
				'loginuser_avatar'=>$userinfo ['avatar'],
				'user_email'=>$userinfo['user_email']
			];
			// 登录
			$lib_user =  new User();
			$lib_user->setSiteCookie($cookie_info);

			// 更新最近登录记录
			$user_model->lastLogin($uuid);
			redirect(DOMAIN);
		}
		//$this->tpl->assign('name','Ned');
		//$this->tpl->display('signin.html');
	}
}
