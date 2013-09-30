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

		//$this->caching = Smarty::CACHING_LIFETIME_CURRENT;
		$this->caching = 0;
		$this->assign('project', 'TinySnail');
		$this->assign('title', 'TinySnail-任务发生器。');
		$this->assign('template_path', PATH_VIEWS.DS.'default/templates');
		$this->assign('bootstrap_domain', DOMAIN.DS.'public/bootstrap-3.0.0-dist');
		$this->assign('portal_domain', DOMAIN.DS.'public/portal');
		$this->assign('docs_assets_domain', DOMAIN.DS.'public/docs-assets');
	}

}
