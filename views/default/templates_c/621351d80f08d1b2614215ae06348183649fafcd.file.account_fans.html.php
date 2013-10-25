<?php /* Smarty version Smarty-3.1.13, created on 2013-10-21 11:13:12
         compiled from "/HTML/TinySnail/views/default/templates/account_fans.html" */ ?>
<?php /*%%SmartyHeaderCode:20727251665260d9b9770508-43173552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '621351d80f08d1b2614215ae06348183649fafcd' => 
    array (
      0 => '/HTML/TinySnail/views/default/templates/account_fans.html',
      1 => 1382151644,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20727251665260d9b9770508-43173552',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5260d9b97c8e96_72348054',
  'variables' => 
  array (
    'fans_list' => 0,
    'fans' => 0,
    'relation' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5260d9b97c8e96_72348054')) {function content_5260d9b97c8e96_72348054($_smarty_tpl) {?><p></p>
<div class="panel panel-default">
<!-- Default panel contents -->
<div class="panel-heading"> 粉丝列表</div> 
<div class="panel-body">

<div class="row">
<?php  $_smarty_tpl->tpl_vars["fans"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["fans"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fans_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["fans"]->key => $_smarty_tpl->tpl_vars["fans"]->value){
$_smarty_tpl->tpl_vars["fans"]->_loop = true;
?>
	<?php if ($_smarty_tpl->tpl_vars['fans']->value['relation']==@constant('SN_FOLLOWER_MUTUAL')){?>
		<?php $_smarty_tpl->tpl_vars['relation'] = new Smarty_variable("[相互关注]", null, 0);?>
	<?php }else{ ?>
		<?php $_smarty_tpl->tpl_vars['relation'] = new Smarty_variable('', null, 0);?>
	<?php }?>
	<div class="col-sm-6 col-md-3">
		<a href="/u/<?php echo $_smarty_tpl->tpl_vars['fans']->value['user_name'];?>
/" class="thumbnail">
			<img src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['fans']->value['avatar'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&s=440" alt="<?php echo $_smarty_tpl->tpl_vars['fans']->value['user_name'];?>
<?php echo $_smarty_tpl->tpl_vars['relation']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['fans']->value['user_name'];?>
<?php echo $_smarty_tpl->tpl_vars['relation']->value;?>
" width="171" height="180">
		</a>
	</div>
<?php }
if (!$_smarty_tpl->tpl_vars["fans"]->_loop) {
?>
<div>&nbsp;还没有粉丝...</div>
<?php } ?>
</div>

</div>
</div>
<?php }} ?>