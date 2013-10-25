<?php /* Smarty version Smarty-3.1.13, created on 2013-10-18 19:29:35
         compiled from "/HTML/TinySnail/views/default/templates/hot_tasks.html" */ ?>
<?php /*%%SmartyHeaderCode:15808672945260b7cf0fcee6-05177729%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd135a9ec8099de07cd43f21d33ee1e0b8350cb25' => 
    array (
      0 => '/HTML/TinySnail/views/default/templates/hot_tasks.html',
      1 => 1382094853,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15808672945260b7cf0fcee6-05177729',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5260b7cf0fee84_51297610',
  'variables' => 
  array (
    'hot_tasks' => 0,
    'task' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5260b7cf0fee84_51297610')) {function content_5260b7cf0fee84_51297610($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/HTML/TinySnail/libs/vendors/Smarty-3.1.13/plugins/modifier.truncate.php';
?><div class="col-xs-12 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation" style="">
<div class="panel panel-default">
<div class="panel-heading">热门任务</div>
<ul class="list-group">
<?php  $_smarty_tpl->tpl_vars["task"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["task"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hot_tasks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["task"]->key => $_smarty_tpl->tpl_vars["task"]->value){
$_smarty_tpl->tpl_vars["task"]->_loop = true;
?>
<li class="list-group-item">
<small>
	<a href="/task_detail/<?php echo $_smarty_tpl->tpl_vars['task']->value['tid'];?>
/" title="<?php echo $_smarty_tpl->tpl_vars['task']->value['subject'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['task']->value['subject'],18,"...",true);?>
</a>                                                       
</small>
</li>
<?php } ?>
</ul>
</div>
</div><!--/span-->
<?php }} ?>