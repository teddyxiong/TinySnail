<?php /* Smarty version Smarty-3.1.13, created on 2013-10-24 21:40:17
         compiled from "/HTML/TinySnail/views/default/templates/account_task.html" */ ?>
<?php /*%%SmartyHeaderCode:3786768605260d9b42f3263-15794173%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dadbb0c1a6fd7aed956bf0a1e3d44b9db83c6327' => 
    array (
      0 => '/HTML/TinySnail/views/default/templates/account_task.html',
      1 => 1382537924,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3786768605260d9b42f3263-15794173',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5260d9b4330621_43467293',
  'variables' => 
  array (
    'tasks' => 0,
    'task_info' => 0,
    'page_info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5260d9b4330621_43467293')) {function content_5260d9b4330621_43467293($_smarty_tpl) {?><p></p>
<div class="panel panel-default">
<!-- Default panel contents -->
<div class="panel-heading">任务列表</div>                                                                         
<div class="panel-body">

<!-- tasks list-->
<table class="table table-hover">
<tbody>
<?php  $_smarty_tpl->tpl_vars["task_info"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["task_info"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tasks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["task_info"]->key => $_smarty_tpl->tpl_vars["task_info"]->value){
$_smarty_tpl->tpl_vars["task_info"]->_loop = true;
?>
<tr class="row">
<td class="col-xs-12 col-md-1" style="text-align:center;vertical-align:middle;"> <span class="badge" title="点击数"><?php echo $_smarty_tpl->tpl_vars['task_info']->value['hits'];?>
</span> </td>
<td class="col-xs-12 col-md-1" style="text-align:center;vertical-align:middle;"><span class="badge" title="评论数"><?php echo $_smarty_tpl->tpl_vars['task_info']->value['comments'];?>
</span></td> 
<td class="col-xs-12 col-md-1" style="text-align:center;vertical-align:middle;">
<?php if ($_smarty_tpl->tpl_vars['task_info']->value['status']==@constant('TASK_STATUS_DELETED')){?>
<span class="badge" title="已删除">del</span> <!--已删除-->
<?php }elseif($_smarty_tpl->tpl_vars['task_info']->value['status']==@constant('TASK_STATUS_ONGOING')){?>
<span class="glyphicon glyphicon-time" title="进行中"></span> <!--进行中-->
<?php }elseif($_smarty_tpl->tpl_vars['task_info']->value['status']==@constant('TASK_STATUS_FINISHED')){?>
<span class="glyphicon glyphicon-thumbs-up" title="已完成"></span> <!--已完成-->
<?php }elseif($_smarty_tpl->tpl_vars['task_info']->value['status']==@constant('TASK_STATUS_UNFINISHED')){?>
<span class="glyphicon glyphicon-thumbs-down" title="未完成"></span><!--未完成-->
<?php }else{ ?>
<?php }?>
</td>
<td class="col-xs-12 col-md-9" style="">
<div class="">
<a href="/task_detail/<?php echo $_smarty_tpl->tpl_vars['task_info']->value['tid'];?>
/"><?php echo $_smarty_tpl->tpl_vars['task_info']->value['subject'];?>
。</a>
</div>
<div>
<small class="text-muted">此任务由 <a href="/u/<?php echo $_smarty_tpl->tpl_vars['task_info']->value['user_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['task_info']->value['user_name'];?>
</a>&nbsp;       
于&nbsp;<?php echo $_smarty_tpl->tpl_vars['task_info']->value['create_time'];?>
&nbsp;发布&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['task_info']->value['comment_last_user_name']){?>|&nbsp;&nbsp;     
最后回复&nbsp;<a href="/u/<?php echo $_smarty_tpl->tpl_vars['task_info']->value['comment_last_user_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['task_info']->value['comment_last_user_name'];?>
</a>&nbsp;  
<?php echo $_smarty_tpl->tpl_vars['task_info']->value['comment_last_time'];?>
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