<?php /* Smarty version Smarty-3.1.13, created on 2013-10-25 16:00:03
         compiled from "/HTML/TinySnail/views/default/templates/add_article.html" */ ?>
<?php /*%%SmartyHeaderCode:102465299852600602bbaf85-25315383%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '653f7facfaba840fb822ccd0aa39abac934ac30b' => 
    array (
      0 => '/HTML/TinySnail/views/default/templates/add_article.html',
      1 => 1382687999,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102465299852600602bbaf85-25315383',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52600602c3d605_58561970',
  'variables' => 
  array (
    'portal_domain' => 0,
    'task_info' => 0,
    'all_cate' => 0,
    'cate_id' => 0,
    'cate_name' => 0,
    'well' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52600602c3d605_58561970')) {function content_52600602c3d605_58561970($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<link href="<?php echo $_smarty_tpl->tpl_vars['portal_domain']->value;?>
/css/datepicker.css" rel="stylesheet">

<div class="container">

<!-- 导航 -->
<ol class="breadcrumb">
<li><a href="/home">首页</a></li>
<li class="active">确认任务</li>
<li class="active">添加文章</li>
</ol>
<hr/>
<!-- /导航-->

<p><h4>当前文章确认的任务是：<a href="/task_detail/<?php echo $_smarty_tpl->tpl_vars['task_info']->value['tid'];?>
/"><?php echo $_smarty_tpl->tpl_vars['task_info']->value['subject'];?>
</a></h4></p>

<!--form-->
<div class="panel panel-default">
<!-- Default panel contents -->
<div class="panel-heading">添加文章</div>
<div class="panel-body">

<form class="form-horizontal" role="form" action="" method="post" target="inner_post_iframe">
	<input type="hidden" name="post_type" value="add" />
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
		<label for="inputEmail3" class="col-sm-2 control-label">文章标题</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="subject" id="inputSubject" placeholder="请输入文章的标题...">
		</div>
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
		<label for="inputPassword3" class="col-sm-2 control-label">文章内容</label>
		<div class="col-sm-8">
			<textarea class="form-control" rows="5" name="article"></textarea>
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

<iframe name="inner_post_iframe" style="display:block;width:98%;height:300px;"></iframe>
</body>
</html>

<?php }} ?>