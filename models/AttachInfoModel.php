<?php
if(!defined('SNAIL')) exit('Illegal Request');

class AttachInfoModel extends BaseModel {

	public $errors = array();
	public $tb_attach_info = 'task_attach_info';
	public $tb_users = 'users';

	public function add($info) {
		$this->db->Insert($info, $this->tb_attach_info);
		$id = $this->db->LastInsertID();

		return $id;
	}

	public function fetchAllByTid($tid) {
		$query = "select * from {$this->tb_attach_info} where tid='$tid' order by aiid DESC";
		$list = $this->db->ExecuteSQL($query);                                                               
		if ($list) {
			return $list;
		}
		return null;
	}
}
