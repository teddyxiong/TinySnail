<?php /* Smarty version Smarty-3.1.13, created on 2013-10-25 16:25:32
         compiled from "/HTML/TinySnail/views/default/templates/add_task.html" */ ?>
<?php /*%%SmartyHeaderCode:8621979655260af4b1e44c8-95428188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '630e60f09c4249cb6af43ba5b4d277ed65097b53' => 
    array (
      0 => '/HTML/TinySnail/views/default/templates/add_task.html',
      1 => 1382689463,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8621979655260af4b1e44c8-95428188',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5260af4b266117_11156228',
  'variables' => 
  array (
    'portal_domain' => 0,
    'default_begin_time' => 0,
    'default_finish_time' => 0,
    'all_cate' => 0,
    'cate_id' => 0,
    'cate_name' => 0,
    'well' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5260af4b266117_11156228')) {function content_5260af4b266117_11156228($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<link href="<?php echo $_smarty_tpl->tpl_vars['portal_domain']->value;?>
/css/datepicker.css" rel="stylesheet">

<div class="container">

<!-- 导航 -->
<ol class="breadcrumb">
<li><a href="/home">首页</a></li>
<li><a href="/home">任务列表</a></li>
<li class="active">添加任务</li>
</ol>
<hr/>
<!-- /导航-->

<!--form-->
<div class="panel panel-default">
<!-- Default panel contents -->
<div class="panel-heading">添加任务</div>
<div class="panel-body">


<form class="form-horizontal" role="form" action="" method="post" target="inner_post_iframe">
	<input type="hidden" name="post_type" value="add_task" />
	<input type="hidden" name="alert_div_id" value="alert_danger" />

	<!-- 提示 -->
	<div class="form-group">                                                                                      
	    <label for="inputEmail3" class="col-sm-2 control-label"></label>
		<div class="col-sm-8">
			<div class="alert alert-danger" style="display:none" id="alert_danger"> <strong>标题输入不合法...</strong> </div>
		</div>
	</div>
	<!-- /提示 -->
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">任务标题</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="subject" id="inputSubject" placeholder="请输入任务的标题...">
		</div>
	</div>

	<div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label">起止时间</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['default_begin_time']->value;?>
" name="begin_time" id="begin_time" data-date-format="yyyy-mm-dd" placeholder="请输入任务开始时间...">
		</div>
		<div class="col-sm-3">
			<input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['default_finish_time']->value;?>
" name="finish_time" id="finish_time" data-date-format="yyyy-mm-dd" placeholder="请输入任务结束时间...">
		</div>
		<div class="col-sm-2"></div>
	</div>
	<div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label">选择分类</label>
		<div class="col-sm-3">
		<select class="form-control" name="task_cate_id">
<?php  $_smarty_tpl->tpl_vars["cate_name"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["cate_name"]->_loop = false;
 $_smarty_tpl->tpl_vars["cate_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['all_cate']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["cate_name"]->key => $_smarty_tpl->tpl_vars["cate_name"]->value){
$_smarty_tpl->tpl_vars["cate_name"]->_loop = true;
 $_smarty_tpl->tpl_vars["cate_id"]->value = $_smarty_tpl->tpl_vars["cate_name"]->key;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['cate_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['cate_name']->value;?>
</option>
<?php } ?>
		</select>
		</div>
		<div class="col-sm-5"></div>
	</div>
	<div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label">任务内容</label>
		<div class="col-sm-8">
			<textarea class="form-control" rows="5" name="description"></textarea>
			<br/>
			<div class="well">
			<p>我们支持完整的<a href="http://en.wikipedia.org/wiki/Markdown" target="_blank">MarkDown</a>语法，并且仅支持MarkDown语法。</p>
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-8">
			<button type="submit" class="btn btn-primary" data-loading-text="正在加载...">提 交</button>
		</div>
	</div>
</form>
</div>
</div>
<!-- /form -->


<!-- well -->
<div class="well">
<p>
<?php echo $_smarty_tpl->tpl_vars['well']->value;?>

</p>
</div> 
<!-- /well -->

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="<?php echo $_smarty_tpl->tpl_vars['portal_domain']->value;?>
/js/bootstrap-datepicker.js"></script>
<script>
if (top.location != location) {
	top.location.href = document.location.href ;
}
$(function(){
	window.prettyPrint && prettyPrint();
	$('#begin_time').datepicker({
		format: 'yyyy-mm-dd'
	});
	$('#finish_time').datepicker({
		format: 'yyyy-mm-dd'
	});
});
</script>

<iframe name="inner_post_iframe" style="display:none;width:98%;height:300px;"></iframe>
</body>
</html>

<?php }} ?>