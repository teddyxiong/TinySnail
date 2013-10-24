<?php
if(!defined('SNAIL')) exit('Illegal Request');
class Base {

    protected $tpl;	
    protected $uid;	
    protected $user_info;	

	public function __construct()
	{
		$this->tpl = new Template();

		$this->setWell();


		// 用户信息
		$this->getUser();

		$this->setGuest();

		$this->tpl->assign('uid', $this->uid);
		$this->tpl->assign('userinfo', $this->user_info);
	}

	private function setGuest() {
		if (empty($this->uid)) {
			$mem_obj         = new Memcached();
			$key = "guest_uid";
			$guest_uid = $mem_obj->get($key);
			if (empty($guest_uid)) {
				$guest_uid = -1;
			} else {
				$guest_uid += -1;
			}
			$mem_obj->set($key, $guest_uid, MEMCACHE_COMPRESSED,HOTDATA_CACHE_EXPIRE);

			$userip = get_client_ip();
			$user_name = "Guest-".substr($userip, 0, 10);
			$cookie_info = [
				'uid'=>$guest_uid,
				'user_password'=>md5($userip),
				'binduid'=>$guest_uid,
				'user_name'=>$userip,
				'avatar'=>'guest_avatar',
				'user_email'=>'guest_avatar'
			];
			// 登录
			$lib_user =  new User();
			$lib_user->setSiteCookie($cookie_info,SN_COOKIE_EXPIRE_TIME);
			$this->getUser();

		}
	}

	private function getUser() {
		$this->uid = User::getUid();
		$this->user_info = User::getCurrentLoginUser();
	}

	private function setWell() {
		require PATH_CONF . DS . "well_config.php";
		$cur_class_name = get_class($this);
		if (!empty($well_config[$cur_class_name])) {
			$this->tpl->assign('well', $well_config[$cur_class_name]);
		}
	}

	public function veiwNotice($content, $div_id) {
		echo "<script>
			parent.document.getElementById('{$div_id}').innerHTML = '{$content}';
		    parent.document.getElementById('{$div_id}').style.display = 'block';
		</script>";
		exit();
	}

	public function pageJump($url) {
		echo "<script>
			parent.window.location.href='{$url}';
		</script>";
		exit();
	}
}
