<?php
if(!defined('SNAIL')) exit('Illegal Request');

class BaseModel {

	public $db;

	public function __construct()
	{
		$this->db = new MySQL();
	}
}

