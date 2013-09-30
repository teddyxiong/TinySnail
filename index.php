<?php
include 'init.php';

$controller = g('controller',false, 'Index');
$controller_name = get_class_name($controller);
$controller_file = PATH_CONTROLLERS.DS.$controller_name.'.class.php';
if (!file_exists($controller_file)) {
	$controller_name = 'Index';
	$controller_file = PATH_CONTROLLERS.DS.'Index.class.php';
}
$base_controller_file = PATH_CONTROLLERS.DS.'Base.class.php';
require_once $base_controller_file;
require_once $controller_file;

$obj = new $controller_name;
$obj->run();

?>
