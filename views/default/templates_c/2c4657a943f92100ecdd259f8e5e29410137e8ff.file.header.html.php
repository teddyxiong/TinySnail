<?php /* Smarty version Smarty-3.1.13, created on 2013-10-24 23:09:59
         compiled from "/HTML/TinySnail/views/default/templates/header.html" */ ?>
<?php /*%%SmartyHeaderCode:1453369630526005bfcdc1e4-18064947%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c4657a943f92100ecdd259f8e5e29410137e8ff' => 
    array (
      0 => '/HTML/TinySnail/views/default/templates/header.html',
      1 => 1382627268,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1453369630526005bfcdc1e4-18064947',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_526005bfd68f77_34124668',
  'variables' => 
  array (
    'docs_assets_domain' => 0,
    'title' => 0,
    'bootstrap_domain' => 0,
    'portal_domain' => 0,
    'project' => 0,
    'userinfo' => 0,
    'login_user_info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526005bfd68f77_34124668')) {function content_526005bfd68f77_34124668($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="任务">
<meta name="author" content="genghonghao@gmail.com">
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['docs_assets_domain']->value;?>
/ico/favicon.ico">

<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>

<!-- Bootstrap -->
<link href="<?php echo $_smarty_tpl->tpl_vars['bootstrap_domain']->value;?>
/css/bootstrap.min.css" rel="stylesheet" media="screen">
<!-- Custom styles for this template -->
<link href="<?php echo $_smarty_tpl->tpl_vars['portal_domain']->value;?>
/css/global.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="<?php echo $_smarty_tpl->tpl_vars['docs_assets_domain']->value;?>
/docs-assets/js/html5shiv.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['docs_assets_domain']->value;?>
/docs-assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/"><?php echo $_smarty_tpl->tpl_vars['project']->value;?>
</a>
		</div>
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-nav">
			<!--li><a href="#">首页</a></li-->
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#">用户排行</a></li>
			<li><a href="#">精品任务</a></li>
			<li><a href="#">帮助中心</a></li>
			<?php if ($_smarty_tpl->tpl_vars['userinfo']->value['user_name']){?>
			<li><div style="padding: 15px;"><a href="/u/<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['user_name'];?>
/"><img src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['userinfo']->value['avatar'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
' class="img-rounded" height="20" width="20"/></a>
			<a href="/u/<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['user_name'];?>
/">
			<small id="header_user_name" login_user_name="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['user_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['user_name'];?>
</small>
			</a>
			&nbsp;
			  <span class="glyphicon glyphicon-plus-sign" id="create_task" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="添加任务"></span> 
			&nbsp;
			  <span class="glyphicon glyphicon-cog" id="setting" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="偏好设置" login_user_name="<?php echo $_smarty_tpl->tpl_vars['login_user_info']->value['user_name'];?>
"></span> 
			&nbsp;
			  <span class="glyphicon glyphicon-log-out" id="signout" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="退出"></span> 
			  </div>
			</li>
			<?php }else{ ?>
			<li><button type="button" id="signin" class="btn btn-default navbar-btn">使用github帐号登录</button></li>
			<?php }?>
		</ul>
	</div><!--/.nav-collapse -->
	</div>
</div>
<?php }} ?>