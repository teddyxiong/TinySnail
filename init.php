<?php
define('APPLICATION', 'TinySnail');
define('APPLICATION_VERSION', '0.0.0.1');

error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_RECOVERABLE_ERROR);
ini_set('display_errors', 'on');
ini_set('track_errors', 1);
if (ini_get('date.timezone') == '') date_default_timezone_set('PRC'); 

ob_start();

define('DS', DIRECTORY_SEPARATOR);
define('PATH_ROOT', dirname(__FILE__));
define('DOMAIN', 'http://snail.sanrenbang.net');

define('PATH_CONF', PATH_ROOT.'/config');
define('PATH_CACHE', PATH_ROOT.'/cache');
define('PATH_UPLOADS', PATH_ROOT.'/uploads');
define('PATH_CONTROLLERS', PATH_ROOT.'/controllers');
define('PATH_MODELS', PATH_ROOT.'/models');
define('PATH_VIEWS', PATH_ROOT.'/views');
define('PATH_LIBS_CORE', PATH_ROOT.'/libs/core');
define('PATH_LIBS_VENDORS', PATH_ROOT.'/libs/vendors');

require_once(PATH_LIBS_CORE.DS.'function.php');

@ini_set('memory_limit',          '64M');
@ini_set('session.cache_expire',  180);
@ini_set('session.use_trans_sid', 0);
@ini_set('session.use_cookies',   1);
@ini_set('session.auto_start',    0);
@ini_set('display_errors',        1);

require_once(PATH_CONF.'/constants.php');

/* 对用户传入的变量进行转义操作。*/
if (!get_magic_quotes_gpc())
{
	if (!empty($_GET))
	{
		$_GET  = addslashes_deep($_GET);
	}
	if (!empty($_POST))
	{
		$_POST = addslashes_deep($_POST);
	}

	$_COOKIE   = addslashes_deep($_COOKIE);
	$_REQUEST  = addslashes_deep($_REQUEST);
}

function autoload($class) {

	if (file_exists(PATH_LIBS_CORE . DS . $class . ".class.php")) {
		require PATH_LIBS_CORE . DS . $class . ".class.php";
	}

	if (file_exists(PATH_MODELS.DS . $class . ".php")) {
		require PATH_MODELS . DS . $class . ".php";
	}
}

spl_autoload_register("autoload");
