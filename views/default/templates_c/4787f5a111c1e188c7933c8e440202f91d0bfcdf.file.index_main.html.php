<?php /* Smarty version Smarty-3.1.13, created on 2013-10-25 16:32:53
         compiled from "/HTML/TinySnail/views/default/templates/index_main.html" */ ?>
<?php /*%%SmartyHeaderCode:984769988526005f6c05a57-00407079%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4787f5a111c1e188c7933c8e440202f91d0bfcdf' => 
    array (
      0 => '/HTML/TinySnail/views/default/templates/index_main.html',
      1 => 1382689967,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '984769988526005f6c05a57-00407079',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_526005f6cb30f0_81911671',
  'variables' => 
  array (
    'login_uid' => 0,
    'tasks' => 0,
    'task_info' => 0,
    'page_info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526005f6cb30f0_81911671')) {function content_526005f6cb30f0_81911671($_smarty_tpl) {?><div class="col-xs-12 col-sm-9"> <!--span-->
<div class="panel panel-default">
<!-- Default panel contents -->
<div class="panel-heading">任务列表</div>
<div class="panel-body">
<button type="button" id="add_task" data-placement="top" class="btn btn-primary" login_uid="<?php echo $_smarty_tpl->tpl_vars['login_uid']->value;?>
" data-toggle="popover" title="" data-content="只有在&nbsp;[&nbsp;<a href='/signin'>登录</a>&nbsp;]&nbsp;以后才能发布任务！" data-original-title="<strong>友情提示：</strong>" data-html="true">发布任务</button>
&nbsp;&nbsp;
快速帮助：
<button class="btn btn-default" type="button" data-toggle="modal" data-target="#help_rule">玩转这里</button>
<button class="btn btn-default" type="button" data-toggle="modal" data-target="#help_philosophy">一点哲学</button>
<button class="btn btn-default" type="button" data-toggle="modal" data-target="#help_integral">不是彩蛋</button>
<!--button class="btn btn-default" type="button" data-toggle="modal" data-target="#help_tent">宗旨</button-->
<a href="http://sanrenbang.net/tinysnail问题反馈/" target="__blank">问题反馈</a>
</div>

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
<td class="col-xs-12 col-md-1" style="text-align: center;vertical-align:middle;">
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
</a>&nbsp;于&nbsp;<?php echo $_smarty_tpl->tpl_vars['task_info']->value['create_time'];?>
&nbsp;发布&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['task_info']->value['comment_last_user_name']){?>|&nbsp;&nbsp;最后回复&nbsp;<a href="/u/<?php echo $_smarty_tpl->tpl_vars['task_info']->value['comment_last_user_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['task_info']->value['comment_last_user_name'];?>
</a>&nbsp;<?php echo $_smarty_tpl->tpl_vars['task_info']->value['comment_last_time'];?>
<?php }?></small>
</div>
</td>
</tr>
<?php } ?>
</table>

</div>
<?php echo $_smarty_tpl->tpl_vars['page_info']->value;?>

</div> 

<!--模态框的帮助内容-->
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/help_model_tent.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/help_model_integral.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/help_model_rule.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/help_model_philosophy.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>