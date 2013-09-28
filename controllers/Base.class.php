<?php
if(!defined('SNAIL')) exit('Illegal Request');
class Base {

    protected $tpl;	

	public function __construct()
	{
		$this->tpl = new Template();
	}
}
