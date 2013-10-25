<?php /* Smarty version Smarty-3.1.13, created on 2013-10-18 23:11:06
         compiled from "/HTML/TinySnail/views/default/templates/account_article.html" */ ?>
<?php /*%%SmartyHeaderCode:9058995825260d9b77be6e9-08893674%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '425d0795214a184dde629f660b4ffca5fa486b3b' => 
    array (
      0 => '/HTML/TinySnail/views/default/templates/account_article.html',
      1 => 1382107966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9058995825260d9b77be6e9-08893674',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5260d9b7826346_38588984',
  'variables' => 
  array (
    'articles' => 0,
    'info' => 0,
    'page_info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5260d9b7826346_38588984')) {function content_5260d9b7826346_38588984($_smarty_tpl) {?><p></p>
<div class="panel panel-default">
<!-- Default panel contents -->
<div class="panel-heading">文章列表</div>                                                                         
<div class="panel-body">

<!-- tasks list-->
<table class="table table-hover">
<tbody>
<?php  $_smarty_tpl->tpl_vars["info"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["info"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["info"]->key => $_smarty_tpl->tpl_vars["info"]->value){
$_smarty_tpl->tpl_vars["info"]->_loop = true;
?>
<tr class="row">
<td>
<div class="">
<a href="/article_detail/<?php echo $_smarty_tpl->tpl_vars['info']->value['aid'];?>
/"><?php echo $_smarty_tpl->tpl_vars['info']->value['subject'];?>
。</a>
</div>
<div>
<small class="text-muted">此文章由 <a href="/u/<?php echo $_smarty_tpl->tpl_vars['info']->value['user_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['info']->value['user_name'];?>
</a>&nbsp;       
于&nbsp;<?php echo $_smarty_tpl->tpl_vars['info']->value['create_time'];?>
&nbsp;发布&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['info']->value['comment_last_user_name']){?>|&nbsp;&nbsp;     
最后回复&nbsp;<a href="/u/<?php echo $_smarty_tpl->tpl_vars['info']->value['comment_last_user_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['info']->value['comment_last_user_name'];?>
</a>&nbsp;  
<?php echo $_smarty_tpl->tpl_vars['info']->value['comment_last_time'];?>
<?php }?></small>
</div>
</td>       
</tr>
<?php } ?>
</table>

</div>
<div align="center"><?php echo $_smarty_tpl->tpl_vars['page_info']->value;?>
</div>
</div> 
<?php }} ?>