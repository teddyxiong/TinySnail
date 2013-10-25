<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 22:23:42
         compiled from "/HTML/TinySnail/views/default/templates/account_settings.html" */ ?>
<?php /*%%SmartyHeaderCode:1850750775260d9c196e6b9-51326985%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96b2b5c8da90088185193f9a19634f19db03a266' => 
    array (
      0 => '/HTML/TinySnail/views/default/templates/account_settings.html',
      1 => 1382451429,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1850750775260d9c196e6b9-51326985',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5260d9c19ba706_32524811',
  'variables' => 
  array (
    'login_uid' => 0,
    'user_info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5260d9c19ba706_32524811')) {function content_5260d9c19ba706_32524811($_smarty_tpl) {?><p></p>
<div class="panel panel-default">
<!-- Default panel contents -->
<div class="panel-heading">设置中心</div>                                                                         
<div class="panel-body">
<!-- 提示 -->
<div class="form-group">
	<div class="alert alert-danger" style="display:none" id="alert_danger">
		<strong>标题输入不合法...</strong>
	</div>
</div>
<!-- /提示 -->

<?php if ($_smarty_tpl->tpl_vars['login_uid']->value>0){?>
<form class="form-inline" role="form"action="" method="post" target="inner_post_iframe">
<input type="hidden" name="posttype" value="setting"/>
<div class="form-group">
<label class="sr-only" for=""></label>
<input type="text" class="form-control" name="about_me" size="86" placeholder="请输入说明信息..." value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['about_me'];?>
">
</div>
<button type="submit" class="btn btn-info">&nbsp;提&nbsp;交&nbsp;</button>
</form>
<?php }?>

</div>
</div>


<iframe name="inner_post_iframe" style="display:none;width:98%;height:300px;"></iframe>
<?php }} ?>