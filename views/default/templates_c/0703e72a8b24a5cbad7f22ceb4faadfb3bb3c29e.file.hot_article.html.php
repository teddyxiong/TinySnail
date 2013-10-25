<?php /* Smarty version Smarty-3.1.13, created on 2013-10-18 19:05:26
         compiled from "/HTML/TinySnail/views/default/templates/hot_article.html" */ ?>
<?php /*%%SmartyHeaderCode:11011859755260b7cf102888-12771134%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0703e72a8b24a5cbad7f22ceb4faadfb3bb3c29e' => 
    array (
      0 => '/HTML/TinySnail/views/default/templates/hot_article.html',
      1 => 1382094294,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11011859755260b7cf102888-12771134',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5260b7cf1048c3_46805052',
  'variables' => 
  array (
    'hot_articles' => 0,
    'article' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5260b7cf1048c3_46805052')) {function content_5260b7cf1048c3_46805052($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/HTML/TinySnail/libs/vendors/Smarty-3.1.13/plugins/modifier.truncate.php';
?><div class="col-xs-12 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation" style="float:right;">
<div class="panel panel-default">
<div class="panel-heading">热门文章</div>
<ul class="list-group">
<?php  $_smarty_tpl->tpl_vars["article"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["article"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hot_articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["article"]->key => $_smarty_tpl->tpl_vars["article"]->value){
$_smarty_tpl->tpl_vars["article"]->_loop = true;
?>
<li class="list-group-item">
<a href="/article_detail/<?php echo $_smarty_tpl->tpl_vars['article']->value['aid'];?>
/" title="<?php echo $_smarty_tpl->tpl_vars['article']->value['subject'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['article']->value['subject'],18,"...",true);?>
</a>
</li>
<?php } ?>
</ul>
</div>
</div><!--/span-->
<?php }} ?>