<?php /* Smarty version Smarty-3.1.13, created on 2013-09-30 01:52:10
         compiled from "/HTML/TinySnail/views/default/templates/index.html" */ ?>
<?php /*%%SmartyHeaderCode:91001765952470405998015-50244973%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8589550ebde04ea5f05f5c6634a60ce447dc3b01' => 
    array (
      0 => '/HTML/TinySnail/views/default/templates/index.html',
      1 => 1380477128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91001765952470405998015-50244973',
  'function' => 
  array (
  ),
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52470405a969e9_50812543',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52470405a969e9_50812543')) {function content_52470405a969e9_50812543($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


<div class="container">

<!-- Split button -->
<div class="btn-group">
<button type="button" class="btn btn-danger">查询操作</button>
<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
<span class="caret"></span>
<span class="sr-only">Toggle Dropdown</span>
</button>
<ul class="dropdown-menu" role="menu">
<li><a href="#">查看正在执行的任务</a></li>
<li><a href="#">查看正在执行的任务</a></li>
<li><a href="#">查看正在执行的任务</a></li>
<li class="divider"></li>
<li><a href="#">所有任务</a></li>
<li><a href="#">我的任务</a></li>
<li><a href="#">我的文章</a></li>
</ul>
</div>
<hr/>

<!--row-->
<div class="row row-offcanvas row-offcanvas-right">
<div class="col-xs-12 col-sm-8"> <!--span-->

<div class="panel panel-default">
<!-- Default panel contents -->
<div class="panel-heading">任务守则</div>
<div class="panel-body">
<button type="button" class="btn btn-primary">发布任务</button>
<button type="button" class="btn btn-primary">发布文章</button>
&nbsp;&nbsp;
快速帮助：
<button class="btn btn-default" type="button" data-toggle="modal" data-target="#helpModal">宗旨</button>
<button class="btn btn-default" type="button" data-toggle="modal" data-target="#helpModal">规则</button>
<button class="btn btn-default" type="button" data-toggle="modal" data-target="#helpModal">哲学</button>
<button class="btn btn-default" type="button" data-toggle="modal" data-target="#helpModal">积分</button>
</div>

<!-- Table -->
<ul class="list-group">
<li class="list-group-item">
<span class="badge">1</span>
想问一下各位，你们公司的线上Linux服务器都是无GUI环境的吗？
<p>111</p>
</li>
<li class="list-group-item">
<span class="badge">12</span>
为什么Xcode5在默认开启ARC的情况下，通过模版创建工程，默认生成的NSWindow的IBOutlet还是assign的呢？
</li>

</ul>

</div>
</div> <!--/span-->

<div class="col-xs-12 col-sm-4 sidebar-offcanvas" id="sidebar" role="navigation">
<div class="panel panel-default">
<div class="panel-heading">热门任务</div>
<ul class="list-group">
<li class="list-group-item">
<span class="badge">14</span>
Cras justo odio
</li>
<li class="list-group-item">
<span class="badge">14</span>
Cras justo odio
</li>
</ul>
</div>
</div><!--/span-->

<div class="col-xs-12 col-sm-4 sidebar-offcanvas" id="sidebar" role="navigation">
<div class="panel panel-default">
<div class="panel-heading">推荐任务</div>
<ul class="list-group">
<li class="list-group-item">
<span class="badge">14</span>
Cras justo odio
</li>
<li class="list-group-item">
<span class="badge">14</span>
Cras justo odio
</li>
</ul>
</div>
</div><!--/span-->
</div> <!-- /row -->

<div class="well">
<p>
生命本没有意义，你要能给它什么意义，他就有什么意义。与其终日冥想人生有何意义，不如试用此生做点有意义的事。
</p>
</div> 

<!-- helpModal -->
<div class="modal fade" id="helpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">帮助中心</h4>
</div>
<div class="modal-body">
TinySnail用来帮助(监督)更多的人更快更好的完成任务。你需要为自己在未来的某段时间内设定务并完成它,完成任务会得到相应的积分；完不成任务会减少相应的积分。你在规定时间段内完成了某项工作，必需写一篇相应的文章附加到当前伤务上，其它网友根据你所写的文章来确认你是否真的完成了任务。
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<!--button type="button" class="btn btn-primary">Save changes</button-->
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.helpmodal -->

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php }} ?>