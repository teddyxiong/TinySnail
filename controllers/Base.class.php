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
		$this->uid = User::getUid();
		$this->user_info = User::getCurrentLoginUser();
		$this->tpl->assign('uid', $this->uid);
		$this->tpl->assign('userinfo', $this->user_info);
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
