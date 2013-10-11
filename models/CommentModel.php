<?php
if(!defined('SNAIL')) exit('Illegal Request');

class CommentModel extends BaseModel {


	public $errors = array();

	public $tb_comment = 'task_comments';
	public $tb_users = 'users';

	public function addComment($comment_info) {
		$this->db->Insert($comment_info, $this->tb_comment);
		$id = $this->db->LastInsertID();

		return $id;
	}

	public function getAllCommentByTid($tid, $page_num=1, $offset=20) {
		$start = ($page_num-1)*$offset;
		$query = "select c.*, u.user_name,u.uid,u.avatar from {$this->tb_comment} AS c, {$this->tb_users} AS u";
		$query .= " where c.tid='$tid' order by c.cid asc limit $start, $offset";
		$comment_info = $this->db->ExecuteSQL($query);
		if ($comment_info) {
			return $comment_info;
		}
		return null;
	}

	public function getTotalNumberByTid($tid) {
		$query = "select count(cid) total from {$this->tb_comment} where tid='$tid'";
		$total = $this->db->ExecuteSQL($query);
		if ($total) {
			return $total;
		}
		return null;

	}
}
