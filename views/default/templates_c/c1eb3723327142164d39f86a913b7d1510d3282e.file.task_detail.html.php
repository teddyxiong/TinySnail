<?php /* Smarty version Smarty-3.1.13, created on 2013-10-25 16:31:18
         compiled from "/HTML/TinySnail/views/default/templates/task_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:1487094651526005bfb449f2-31285789%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1eb3723327142164d39f86a913b7d1510d3282e' => 
    array (
      0 => '/HTML/TinySnail/views/default/templates/task_detail.html',
      1 => 1382689490,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1487094651526005bfb449f2-31285789',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_526005bfcd45a1_96693244',
  'variables' => 
  array (
    'article_info' => 0,
    'task_info' => 0,
    'login_uid' => 0,
    'attach_info_list' => 0,
    'attach' => 0,
    'comments' => 0,
    'item' => 0,
    'reply_list' => 0,
    'reply_info' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526005bfcd45a1_96693244')) {function content_526005bfcd45a1_96693244($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="container">

<!-- 导航 -->
<ol class="breadcrumb">
<li><a href="/home">首页</a></li>
<li class="active">任务详情</li>
</ol>
<hr/>
<!-- /导航-->

<?php if ($_smarty_tpl->tpl_vars['article_info']->value){?>
<p><h3>当前任务对应的文章是：<a href="/article_detail/<?php echo $_smarty_tpl->tpl_vars['article_info']->value['aid'];?>
/"><?php echo $_smarty_tpl->tpl_vars['article_info']->value['subject'];?>
</a></h3></p>
<?php }?>
<div class="row row-offcanvas row-offcanvas-right">
				<div class="col-xs-12 col-sm-9">
					<div class="progress progress-striped active">
						<div class="progress-bar progress-bar-info"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"  style="width: <?php echo $_smarty_tpl->tpl_vars['task_info']->value['schedule'];?>
%"><?php if ($_smarty_tpl->tpl_vars['task_info']->value['schedule_txt_local']=='left'){?> <strong class="text-muted">&nbsp;<?php echo $_smarty_tpl->tpl_vars['task_info']->value['schedule_txt'];?>
</strong>
<?php }?></div>
<?php if ($_smarty_tpl->tpl_vars['task_info']->value['schedule_txt_local']=='right'){?>
<strong class="text-muted">&nbsp;<?php echo $_smarty_tpl->tpl_vars['task_info']->value['schedule_txt'];?>
</strong>
<?php }?>
					</div>
				</div>

				<div class="col-xs-12 col-sm-3">
				</div>
				</div>
<div class="row row-offcanvas row-offcanvas-right">
	<div class="col-xs-12 col-sm-9"> <!--span-->
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-body">
				<h3 ><a href="/u/<?php echo $_smarty_tpl->tpl_vars['task_info']->value['user_name'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['task_info']->value['avatar'];?>
" width="25" height="25" class="img-rounded" ></img></a>&nbsp;<strong><?php echo $_smarty_tpl->tpl_vars['task_info']->value['subject'];?>
</strong></h3>
				<div class="text-muted">
				<ul class="list-inline">
				    <li><a href="/u/<?php echo $_smarty_tpl->tpl_vars['task_info']->value['user_name'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['task_info']->value['user_name'];?>
</a> 发表于：<?php echo $_smarty_tpl->tpl_vars['task_info']->value['create_time'];?>
</li>
				    <li><?php echo $_smarty_tpl->tpl_vars['task_info']->value['hits'];?>
 次阅读</li>
				    <li><a href="#comment_input"><?php echo $_smarty_tpl->tpl_vars['task_info']->value['comments'];?>
</a> 条评论</li>
<?php if ($_smarty_tpl->tpl_vars['task_info']->value['status']==@constant('TASK_STATUS_UNFINISHED')){?>
				    <li><span class="label label-warning">当前任务未完成</span></li>
<?php if ($_smarty_tpl->tpl_vars['login_uid']->value==$_smarty_tpl->tpl_vars['task_info']->value['uid']){?>
				    <li><button type="button" class="btn btn-primary btn-xs" id="confirm_task" confirm_task_id="<?php echo $_smarty_tpl->tpl_vars['task_info']->value['tid'];?>
">确认完成</button></li>
<?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['task_info']->value['status']==@constant('TASK_STATUS_FINISHED')){?>
				    <li><span class="label label-success">当前任务已完成</span></li>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['task_info']->value['status']==@constant('TASK_STATUS_ONGOING')){?>
				    <li><span class="label label-info">任务正在进行中</span></li>
<?php }?>
				</ul>
				</div>
				<hr/>
				<div style="line-height:28px;letter-spacing:1px;"> <?php echo $_smarty_tpl->tpl_vars['task_info']->value['description'];?>
 </div>

				<div>
				<!-- 提示 -->
				<div class="form-group">
				<div class="alert alert-danger" style="display:none" id="attach_info_alert_danger">                       
				<strong>标题输入不合法...</strong> </div>
				</div>
				<!-- /提示 -->
<?php if ($_smarty_tpl->tpl_vars['login_uid']->value==$_smarty_tpl->tpl_vars['task_info']->value['uid']){?>
				<form class="form-inline" role="form"action="" method="post"              target="inner_post_iframe">
				<input type="hidden" name="posttype" value="attach"/>
				<div class="form-group">
				<label class="sr-only" for="">追加记录:</label>
				<input type="text" class="form-control" name="attach_info" size="86" placeholder="请输入追加信息...">
				</div>
				<button type="submit" class="btn btn-info">&nbsp;提&nbsp;交&nbsp;</button>
				</form>
<?php }?>
				<br/>
<?php if (isset($_smarty_tpl->tpl_vars['attach_info_list']->value)){?>
				<div class="panel panel-info">
				  <div class="panel-heading">追加记录：</div>
				    <div class="panel-body">
<?php  $_smarty_tpl->tpl_vars['attach'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attach']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attach_info_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['attach']->key => $_smarty_tpl->tpl_vars['attach']->value){
$_smarty_tpl->tpl_vars['attach']->_loop = true;
?>
					<p class="text-info"><?php echo $_smarty_tpl->tpl_vars['attach']->value['content'];?>
&nbsp;&nbsp;<small>[&nbsp;发表于：<?php echo $_smarty_tpl->tpl_vars['attach']->value['create_time'];?>
&nbsp;]</small></p>
<?php }
if (!$_smarty_tpl->tpl_vars['attach']->_loop) {
?>
...
<?php } ?>
						  </div>
						  </div>
<?php }?>
				</div>
				<a name="comment_input">.</a>
			</div>
		</div>
		<!--评论-->
<?php if ($_smarty_tpl->tpl_vars['login_uid']->value>0){?>
		<div style="text-align: right;">
			<!-- 提示 -->
			<div class="form-group">
					<div class="alert alert-danger" style="display:none" id="alert_danger"> <strong>标题输入不合法...</strong> </div>
			</div>
			<!-- /提示 -->
			<form class="form-horizontal" role="form" name="comment_form" action="" method="post" target="inner_post_iframe">
				<input type="hidden" name="post_type" value="task_comment" />
				<input type="hidden" name="alert_div_id" value="alert_danger" />
				<input type="hidden" name="reply_uid" value="" />
				<input type="hidden" name="reply_username" value="" />
				<input type="hidden" name="comment_id" value="" />
				<textarea class="form-control" rows="3" name="comment" id="comment"></textarea>
				
				<h5>
					<small>评论仍然可以使用<a href="http://en.wikipedia.org/wiki/Markdown" target="_blank">MarkDown</a>语法哟。</small>
					<button type="submit" class="btn btn-primary">发表评论</button>
				</h5>
			</form>
		</div>
<?php }else{ ?>
		<span class="help-block"><a href="/signin">登录</a>后才能进行评论。</span>
<?php }?>
		<a name="comment">评论列表</a>
		<hr/>
		<!--/评论-->
<?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value){
$_smarty_tpl->tpl_vars["item"]->_loop = true;
?>
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-1"> 
				<a href="/u/<?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" width="40" height="40" class="img-rounded"/></a>
			</div>
			<div class="col-xs-12 col-sm-11"> 
				<h5> <small>#<?php echo $_smarty_tpl->tpl_vars['item']->value['floor'];?>
&nbsp;&nbsp;<a href="/u/<?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
</a>&nbsp;发表于：<?php echo $_smarty_tpl->tpl_vars['item']->value['create_time'];?>
</small></h5>
				<div style="word-break:break-all;">
					<?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>

				</div>
				<div style="text-align: right;">
					<a href="javascript:void(0);" id="reply_comment_button_<?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
" comment_cid="<?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
" login_uid="<?php echo $_smarty_tpl->tpl_vars['login_uid']->value;?>
">回复此评论</a>
				</div>

				<!-- 提示 -->
				<div class="form-group">
					<div class="alert alert-danger" style="display:none" id="alert_danger_<?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
"> 
						<strong>标题输入不合法...</strong> 
					</div>
				</div>
				<!-- /提示 -->

				<!--表单-->
				<div style="text-align:right;display:none" id="reply_div_<?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
">
					<textarea class="form-control" rows="3" id="reply_comment_<?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
"></textarea>
					<p></p>
					<button type="button" class="btn btn-info" id="reply_submit_<?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
" comment_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
" reply_uid="<?php echo $_smarty_tpl->tpl_vars['item']->value['uid'];?>
" reply_username="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
">回复评论</button>
				</div>
				<!--/表单-->

				<!--回复数据-->
<?php  $_smarty_tpl->tpl_vars["reply_info"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["reply_info"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['reply_list']->value[$_smarty_tpl->tpl_vars['item']->value['cid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["reply_info"]->key => $_smarty_tpl->tpl_vars["reply_info"]->value){
$_smarty_tpl->tpl_vars["reply_info"]->_loop = true;
?>
				<hr/>
				<div class="row row-offcanvas row-offcanvas-right">
					<div class="col-xs-12 col-sm-1"> 
						<a href="/u/<?php echo $_smarty_tpl->tpl_vars['reply_info']->value['user_name'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['reply_info']->value['avatar'];?>
" width="30" height="30" class="img-rounded"/></a>
					</div>
					<div class="col-xs-12 col-sm-11"> 
						<h5><small>
							<a href="/u/<?php echo $_smarty_tpl->tpl_vars['reply_info']->value['user_name'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['reply_info']->value['user_name'];?>
</a>&nbsp;发表于：<?php echo $_smarty_tpl->tpl_vars['reply_info']->value['create_time'];?>

						</small></h5>
						<div style="word-break:break-all;">
							回复@<a href="?<?php echo $_smarty_tpl->tpl_vars['reply_info']->value['reply_uid'];?>
"><?php echo $_smarty_tpl->tpl_vars['reply_info']->value['reply_username'];?>
</a>：<?php echo $_smarty_tpl->tpl_vars['reply_info']->value['reply'];?>

						</div> 
						<div style="text-align: right;">
							<a href="javascript:void(0);" id="reply_reply_button_<?php echo $_smarty_tpl->tpl_vars['reply_info']->value['rid'];?>
" reply_id="<?php echo $_smarty_tpl->tpl_vars['reply_info']->value['rid'];?>
" login_uid="<?php echo $_smarty_tpl->tpl_vars['login_uid']->value;?>
">回复此评论</a>
						</div>

						<!-- 提示 -->
						<div class="form-group">
							<div class="alert alert-danger" style="display:none" id="reply_alert_danger_<?php echo $_smarty_tpl->tpl_vars['reply_info']->value['rid'];?>
"> 
								<strong>标题输入不合法...</strong> 
							</div>
						</div>
						<!--/提示-->

						<!--表单-->
						<div style="text-align:right;display:none" id="reply_reply_div_<?php echo $_smarty_tpl->tpl_vars['reply_info']->value['rid'];?>
"> 
							<textarea class="form-control" rows="3" id="reply_reply_<?php echo $_smarty_tpl->tpl_vars['reply_info']->value['rid'];?>
"></textarea>
							<p></p>
							<button type="button" class="btn btn-info" id="reply_reply_submit_<?php echo $_smarty_tpl->tpl_vars['reply_info']->value['rid'];?>
" reply_id="<?php echo $_smarty_tpl->tpl_vars['reply_info']->value['rid'];?>
" comment_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['cid'];?>
" reply_uid="<?php echo $_smarty_tpl->tpl_vars['reply_info']->value['uid'];?>
" reply_username="<?php echo $_smarty_tpl->tpl_vars['reply_info']->value['user_name'];?>
">回复评论</button>
						</div>
																													                <!--/表单-->

					</div>
				</div>
<?php } ?>
				<!--/回复数据-->

			</div>
		</div> 
		<hr/>
<?php }
if (!$_smarty_tpl->tpl_vars["item"]->_loop) {
?>
没有评论!!!
<?php } ?>
<?php echo $_smarty_tpl->tpl_vars['page']->value;?>

	</div>

<!--推荐-->
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/hot_tasks.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/hot_article.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
</div>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<iframe name="inner_post_iframe" style="display:none;width:98%;height:300px;"></iframe>
</body>
</html>
<?php }} ?>