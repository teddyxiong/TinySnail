<?php
define('APPLICATION', 'TinySnail');
define('APPLICATION_VERSION', '0.0.0.1');

error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_RECOVERABLE_ERROR);
ini_set('display_errors', 'on');
ini_set('track_errors', 1);
if (ini_get('date.timezone') == '') date_default_timezone_set('PRC'); 

define('DS', DIRECTORY_SEPARATOR);
define('PATH_ROOT', substr(dirname(__FILE__), 0,-6));
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

require_once(PATH_CONF.'/constants.php');

function autoload($classname) {

	if (file_exists(PATH_LIBS_CORE . DS . $classname . ".class.php")) {
		require PATH_LIBS_CORE . DS . $classname . ".class.php";
	}

	if (file_exists(PATH_MODELS.DS . $classname . ".php")) {
		require PATH_MODELS . DS . $classname . ".php";
	}
}

spl_autoload_register("autoload", true, true);

