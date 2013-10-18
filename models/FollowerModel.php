<?php
if(!defined('SNAIL')) exit('Illegal Request');

class FollowerModel extends BaseModel {


	public $errors = array();

	public $tb_followers = 'followers';
	public $tb_users = 'users';

	public function updateRelation($uid, $follower_uid, $relation) {
		$now = time();
		$ip = get_client_ip();
		$set = ['relation'=>$relation, 'last_time'=>$now, 'last_ip'=>$ip];
		$where = ['uid'=>$uid, 'follower_uid'=>$follower_uid];

		return $this->db->Update($this->tb_users, $set, $where);
	}

	public function userFollowedUser($uid, $follower_uid) {
		$where = array('uid'=>$uid, 'follower_uid'=>$follower_uid);
		$followed = $this->db->Select($this->tb_followers, $where);
		if ($followed) {
			return $followed;
		}
		return null;
	}

	public function follower($uid, $follower_uid, $relation) {
		$now = time();
		$ip = get_client_ip();
		$posts = [
			'fid'=>NULL, 
			'uid'=>$uid, 
			'follower_uid'=>$follower_uid,
			'create_time'=>$now,
			'create_ip'=>$ip,
			'last_ip'=>$ip,
			'last_time'=>$now,
			'relation'=>$relation 
		];
		$this->db->Insert($posts, $this->tb_followers);
		$fid = $this->db->LastInsertID();

		if ($fid) {
			return $fid;
		}
		return null;
	}

	public function getUserRelation($uid, $follower_uid) {
		$query = "select relation from {$this->tb_followers} ";
		$query .= " where uid='$uid' and follower_uid='$follower_uid'";
		$relation = $this->db->ExecuteSQL($query);
		if ($relation) {
			return $relation['relation'];
		}
		return null;
	}

	public function cancelFollower($uid, $follower_uid) {
		$query = "delete {$this->tb_followers} where uid='$uid' and follower_uid='{$follower_uid}'";
		return $this->db->ExecuteSQL($query);
	}

	public function fetchAllFollowers($uid) {
		$query = "select f.*, u.user_name, u.avatar from {$this->tb_followers} AS f, {$this->tb_users} AS u";
		$query .= " where f.uid=u.uid and f.uid='$uid' order by fid ASC";
		$list = $this->db->ExecuteSQL($query);                                                               
		if ($list) {
			return $list;
		}
	}

	public function fetchAllFans($uid) {
		$query = "select f.*, u.user_name, u.avatar from {$this->tb_followers} AS f, {$this->tb_users} AS u";
		$query .= " where f.follower_uid=u.uid and follower_uid='$uid' order by fid ASC";
		$list = $this->db->ExecuteSQL($query);                                                               
		if ($list) {
			return $list;
		}
	}
}
