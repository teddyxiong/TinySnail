<?php

require_once(PATH_LIBS_VENDORS.DS.'Smarty-3.1.13/Smarty.class.php');
class Template extends Smarty {

	function __construct()
	{

		parent::__construct();

		$this->setTemplateDir(PATH_VIEWS.DS.'default/templates/');
		$this->setCompileDir(PATH_VIEWS.DS.'default/templates_c/');
		$this->setConfigDir(PATH_VIEWS.DS.'default/configs/');
		$this->setCacheDir(PATH_VIEWS.DS.'default/cache/');

		$this->left_delimiter = "{{";
		$this->right_delimiter = "}}";

		$this->caching = Smarty::CACHING_LIFETIME_CURRENT;
		$this->assign('project', 'TinySnail');
	}

}
