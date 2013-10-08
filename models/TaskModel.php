<?php
if(!defined('SNAIL')) exit('Illegal Request');

class TaskModel extends BaseModel {


	public $errors = array();

	public $tb_tasks = 'tasks';
	public $tb_bind_users = 'bind_users';

	public function lastLogin($uid) {
		$now = time();
		$ip = get_client_ip();
		$set = ['user_last_timeline'=>$now, 'user_last_ip'=>$ip];
		$where = ['uid'=>$uid];

		return $this->db->Update($this->tb_users, $set, $where);
	}

	public function getUserByUid($uid) {
		$where = array('uid'=>$uid);
		$user_info = $this->db->Select($this->tb_users, $where);
		if ($user_info) {
			return $user_info;
		}
		return null;
	}
	public function userIsExists($user_name, $user_email) {
		$where = array('user_name'=>$user_name,'user_email'=>$user_email);
		$operand = "OR";
		$user_list = $this->db->Select($this->tb_users, $where, '', '', false);
		if (0 == count($user_list)) {
			return false;
		}

		return $user_list['uid'];
	}

	public function registerNewUser($uname, $uemail, $upassword,$upassword_repeat,$avatar)
	{
		$uname  = trim($uname);
		$uemail = trim($uemail);

		if (empty($uname)) {
			$this->errors[] = '用户名不能为空';
		} elseif (empty($upassword) || empty($upassword_repeat)) {
			$this->errors[] = '密码不能为空';
		} elseif ($upassword !== $upassword_repeat) {
			$this->errors[] = '两次输入的密码不同';
		} elseif (strlen($upassword) < 6) {
			$this->errors[] = '密码长度小于6';
		} elseif (strlen($uname) > 64 || strlen($uname) < 2) {
			$this->errors[] = '用户名的长度应在2-64个字符之间';
		} elseif (!preg_match('/^[a-z\d]{2,64}$/i', $uname)) {
			$this->errors[] = '用户名不合法';
		} elseif (empty($uemail)) {
			$this->errors[] = "邮箱地址不能为空";
		} elseif (strlen($uemail) > 64) {
			$this->errors[] = '邮箱地址长度超过了64个字符';
		} elseif (!filter_var($uemail, FILTER_VALIDATE_EMAIL)) {
			$this->errors[] = '邮箱地址不合法';
		}
		if (count($this->errors) == 0) {
			$where = array('user_name'=>$uname,'user_email'=>$uemail);
			$operand = "OR";
			$user_list = $this->db->Select($this->tb_users, $where, '', '', false);

			$now = time();
			$ip = get_client_ip();
			if (!is_array($user_list) || count($user_list) == 0) {
				$vars = [
					'uid'=>null,
					'binduid'=>0,
					'user_name'=>$uname,
					'user_password_hash'=>md5($upassword),
					'avatar'=>$avatar,
					'user_email'=>$uemail,
					'user_active'=>1,
					'user_activation_hash'=>'',
					'user_password_reset_hash'=>'',
					'user_password_reset_timeline'=>'',
					'user_rememberme_token'=>'', 
					'user_registration_timeline'=>$now,
					'user_registration_ip'=>$ip, 
					'user_last_timeline'=>$now, 
					'user_last_ip'=>$ip
				];
				$ret = $this->db->Insert($vars, $this->tb_users);
				if ($ret) {
					return $this->db->LastInsertID();
				}
				return null;
			} else {
				$this->errors[] = '此用户已存在';
			}
		} 

		return $this->errors;
	}

	public function bindUser($uid, $data, $source_flag='github') {
		$now = time();
		$ip = get_client_ip();
		if (SN_GITHUB_FLAG == $source_flag) {
			$posts = [
				'binduid'=>NULL, 
				'source_uid'=>$data['id'], 
				'user_source'=>SN_GITBUB_FLAG,
				'login_name'=>$data['login'],
				'user_name'=>$data['name'],
				'user_email'=>$data['email'],
				'extend'=>serialize($data),
				'bind_ip'=>$ip, 
				'bind_dateline'=>$now
			];
			// 绑定
			$this->db->Insert($posts, $this->tb_bind_users);
			$binduid = $this->db->LastInsertID();

			// 更新users表
			$set = ['binduid'=>$binduid];
			$where = ['uid'=>$uid];
			$users_ret = $this->db->Update($this->tb_users, $set, $where);
			if ($binduid && $users_ret) {
				return $users_ret;
			}
			return null;

		}
	}

	public function signUp() {
		//$this->db;
	}

	public function signIn() {
		//$this->db;
	}

	public function signOut() {
	}
}
