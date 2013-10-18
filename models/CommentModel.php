<?php
if(!defined('SNAIL')) exit('Illegal Request');

class CommentModel extends BaseModel {


	public $errors = array();

	public $tb_comment = 'task_comments';
	public $tb_comment_reply = 'task_comments_reply';
	public $tb_user = 'users';

	public function addComment($comment_info) {
		$this->db->Insert($comment_info, $this->tb_comment);
		$id = $this->db->LastInsertID();

		return $id;
	}

	public function addReply($reply_info) {
		$this->db->Insert($reply_info, $this->tb_comment_reply);
		$id = $this->db->LastInsertID();

		return $id;
	}

	public function getAllCommentByTid($tid, $page_num=1, $offset=20) {
		$start = ($page_num-1)*$offset;
		$query = "select c.*, u.user_name,u.uid,u.avatar from {$this->tb_comment} AS c, {$this->tb_user} AS u";
		$query .= " where c.tid='$tid' and c.uid=u.uid order by c.cid asc limit $start, $offset";
		$comment_info = $this->db->ExecuteSQL($query);
		if ($comment_info) {
			return $comment_info;
		}
		return null;
	}

	public function getAllReplyByCid($cids) {
		if (is_array($cids)) {
			$cid_str = implode(",", $cids);
			$where = "r.cid in($cid_str)";
		} else {
			$where = "r.cid='$cid'";
		}
		$query = "select r.*, u.user_name,u.uid,u.avatar from {$this->tb_comment_reply} AS r, {$this->tb_user} AS u";
		$query .= " where $where and r.uid=u.uid order by r.rid asc";
		$reply_info = $this->db->ExecuteSQL($query);
		if ($reply_info) {
			return $reply_info;
		}
		return null;
	}

	public function getTotalNumberByTid($tid) {
		$query = "select count(cid) total from {$this->tb_comment} where tid='$tid'";
		$ret = $this->db->ExecuteSQL($query);
		if ($ret['total']) {
			return $ret['total'];
		}
		return null;

	}
}
