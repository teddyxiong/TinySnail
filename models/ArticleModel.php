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
		$query = "select a.*,t.tid,t.subject task_subject,t.comments, u.user_name,u.uid,u.avatar from {$this->tb_article} AS a, {$this->tb_users} AS u, {$this->tb_tasks} t where a.aid='$id' and a.uid=u.uid and a.tid=t.tid";
		$info = $this->db->ExecuteSQL($query);
		if ($info) {
			return $info;
		}
		return null;
	} 

	public function fetchOneArticleByTid($tid) {
		$query = "select * from {$this->tb_article} where tid='$tid'";
		$info = $this->db->ExecuteSQL($query);
		if ($info) {
			return $info;
		}
		return null;
	}

	public function fetchAllArticle($condition, $page_num, $offset=20) {
		$start = ($page_num-1)*$offset;
		$condition_str = "";
		if (!empty($condition) && is_array($condition)) {
			foreach($condition as $k=>$v) {
				$condition_str .= " and a.$k='$v' ";
			}
		}
		$query = "select a.*, u.user_name, u.avatar, t.comment_last_time,t.comments,t.comment_last_user_name,t.comment_last_time from {$this->tb_article} AS a, {$this->tb_users} AS u, {$this->tb_tasks} AS t";
		$query .= " where a.uid=u.uid and a.tid=t.tid $condition_str order by a.aid DESC LIMIT $start, $offset";

		$list = $this->db->ExecuteSQL($query);                                                               
		if ($list) {
			return $list;
		}
		return null;
	}

	public function fetchHotArticles($num=20) {
		$query = "select aid,subject from {$this->tb_article} ";
		$query .= "order by hits DESC LIMIT $num";
		$list = $this->db->ExecuteSQL($query);
		if ($list) {
			if (!empty($list['aid'])) {
				return array(0=>$list);
			}
			return $list;
		}
		return null;
	}

	public function fetchTotal($condition) {	
		$condition_str = "";
		if (!empty($condition) && is_array($condition)) {
			foreach($condition as $k=>$v) {
				$condition_str .= " and $k='$v' ";
			}
		}
		$query = "select count(aid) total from {$this->tb_article} where 1 $condition_str";
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
