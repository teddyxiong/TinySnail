<?php /* Smarty version Smarty-3.1.13, created on 2013-10-21 11:13:14
         compiled from "/HTML/TinySnail/views/default/templates/account_follower.html" */ ?>
<?php /*%%SmartyHeaderCode:16502921695260d9bac59da5-67245894%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38b1f0eb53d4bf4b58ff9797a758f8bd8c8a0d9d' => 
    array (
      0 => '/HTML/TinySnail/views/default/templates/account_follower.html',
      1 => 1382151642,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16502921695260d9bac59da5-67245894',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5260d9baca39e4_54512990',
  'variables' => 
  array (
    'follower_list' => 0,
    'follower' => 0,
    'relation' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5260d9baca39e4_54512990')) {function content_5260d9baca39e4_54512990($_smarty_tpl) {?><p></p>
<div class="panel panel-default">
<!-- Default panel contents -->
<div class="panel-heading">关注列表</div> 
<div class="panel-body">

<div class="row">
<?php  $_smarty_tpl->tpl_vars["follower"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["follower"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['follower_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["follower"]->key => $_smarty_tpl->tpl_vars["follower"]->value){
$_smarty_tpl->tpl_vars["follower"]->_loop = true;
?>
<?php if ($_smarty_tpl->tpl_vars['follower']->value['relation']==@constant('SN_FOLLOWER_MUTUAL')){?>
<?php $_smarty_tpl->tpl_vars['relation'] = new Smarty_variable("[相互关注]", null, 0);?>
<?php }else{ ?>
<?php $_smarty_tpl->tpl_vars['relation'] = new Smarty_variable('', null, 0);?>
<?php }?>
<div class="col-sm-6 col-md-3">
<a href="/u/<?php echo $_smarty_tpl->tpl_vars['follower']->value['user_name'];?>
/" class="thumbnail">
<img src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['follower']->value['avatar'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&s=440" alt="<?php echo $_smarty_tpl->tpl_vars['follower']->value['user_name'];?>
<?php echo $_smarty_tpl->tpl_vars['relation']->value;?>
"             
title="<?php echo $_smarty_tpl->tpl_vars['follower']->value['user_name'];?>
<?php echo $_smarty_tpl->tpl_vars['relation']->value;?>
" width="171" height="180">
</a>
</div>
<?php }
if (!$_smarty_tpl->tpl_vars["follower"]->_loop) {
?>
<div>&nbsp;还没有关注任何人...</div> 
<?php } ?>
</div>

</div>
</div>
<?php }} ?>