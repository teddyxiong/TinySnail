<?php
if(!defined('SNAIL')) exit('Illegal Request');

class ArticleModel extends BaseModel {

	public $errors = array();
	public $tb_article = 'task_article';
	public $tb_tasks = 'tasks';
	public $tb_users = 'users';

	public function addArticle($article_info) {
		$this->db->Insert($article_info, $this->tb_article);
		$id = $this->db->LastInsertID();

		return $id;
	}

	public function fetchOneArticle($id) {
		$query = "select a.*, u.user_name,u.uid,u.avatar from {$this->tb_article} AS a, {$this->tb_users} AS u, {$this->tb_tasks} t where a.aid='$id' and a.uid=u.uid and a.tid=t.tid";
		$info = $this->db->ExecuteSQL($query);
		if ($info) {
			return $info;
		}
		return null;
	}

	public function fetchAllTask($page_num, $offset=20) {
		$start = ($page_num-1)*$offset;
		$query = "select a.*, u.user_name, u.avatar from {$this->tb_article} AS a, {$this->tb_users} AS u";
		$query .= " where a.uid=u.uid order by a.aid DESC LIMIT $start, $offset";
		$list = $this->db->ExecuteSQL($query);                                                               
		if ($list) {
			return $list;
		}
	}

	public function fetchTotal() {	
		$query = "select count(aid) total from {$this->tb_article} ";
		$ret = $this->db->ExecuteSQL($query);                                                               
		if ($ret['total']) {
			return $ret['total'];
		}

		return null;
	}

	public function hits($id) {
		$query = "update {$this->tb_article} set hits=hits+1 where aid='$id'"; 
		return $this->db->ExecuteSQL($query);
	}
}
