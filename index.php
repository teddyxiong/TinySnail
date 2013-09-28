<?php
include 'init.php';

$action = g('action',false, 'Index');
$class_name = get_class_name($action);
$class_file = PATH_CONTROLLERS.DS.$class_name.'.class.php';
if (!file_exists($class_file)) {
	$class_name = 'Index';
	$class_file = PATH_CONTROLLERS.DS.'Index.class.php';
}
$base_file = PATH_CONTROLLERS.DS.'Base.class.php';
require_once $base_file;
require_once $class_file;

$obj = new $class_name;
$obj->run();

?>
