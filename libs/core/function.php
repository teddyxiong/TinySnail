<?php

function g($name,$ishtml=false,$default='') {
	if(!isset($_GET[$name]))
	{
		return $default ;
	}
	if ( false === $ishtml) {
		return trim($_GET[$name]);
	}
	return trim(strip_tags($_GET[$name]));
}

function p($name,$ishtml=false,$default='') {
	if(!isset($_POST[$name]))
	{
		return $default ;
	}
	if ( false === $ishtml) {
		return trim($_POST[$name]);
	}
	return trim(strip_tags($_POST[$name]));
}

function get_class_name($action) {
	$func = function($value) {
		return ucwords($value);
	};

	return implode("", (array_map($func, explode('_', $action))));
}


/**
 * 验证输入的邮件地址是否合法
 *
 * @access  public
 * @param   string      $email      需要验证的邮件地址
 *
 * @return bool
 */
function is_email($user_email)
{
	$chars = "/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$/i";
	if (strpos($user_email, '@') !== false && strpos($user_email, '.') !== false)
	{
		if (preg_match($chars, $user_email))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	else
	{
		return false;
	}
}

/**
 * 检查是否为一个合法的时间格式
 *
 * @access  public
 * @param   string  $time
 * @return  void
 */
function is_time($time)
{
	$pattern = '/[\d]{4}-[\d]{1,2}-[\d]{1,2}\s[\d]{1,2}:[\d]{1,2}:[\d]{1,2}/';

	return preg_match($pattern, $time);
}

/**
 * 递归方式的对变量中的特殊字符进行转义
 *
 * @access  public
 * @param   mix     $value
 *
 * @return  mix
 */
function addslashes_deep($value)
{
	if (empty($value))
	{
		return $value;
	}
	else
	{
		return is_array($value) ? array_map('addslashes_deep', $value) : addslashes($value);
	}
}

/**
 * 将对象成员变量或者数组的特殊字符进行转义
 *
 * @access   public
 * @param    mix        $obj      对象或者数组
 * @author   Xuan Yan
 *
 * @return   mix                  对象或者数组
 */
function addslashes_deep_obj($obj)
{
	if (is_object($obj) == true)
	{
		foreach ($obj AS $key => $val)
		{
			$obj->$key = addslashes_deep($val);
		}
	}
	else
	{
		$obj = addslashes_deep($obj);
	}

	return $obj;
}

/**
 * 递归方式的对变量中的特殊字符去除转义
 *
 * @access  public
 * @param   mix     $value
 *
 * @return  mix
 */
function stripslashes_deep($value)
{
	if (empty($value))
	{
		return $value;
	}
	else
	{
		return is_array($value) ? array_map('stripslashes_deep', $value) : stripslashes($value);
	}
}
?>
