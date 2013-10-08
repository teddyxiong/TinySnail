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
