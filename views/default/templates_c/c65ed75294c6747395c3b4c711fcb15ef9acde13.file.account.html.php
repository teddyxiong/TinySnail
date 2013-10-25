<?php /* Smarty version Smarty-3.1.13, created on 2013-10-22 21:48:46
         compiled from "/HTML/TinySnail/views/default/templates/account.html" */ ?>
<?php /*%%SmartyHeaderCode:11525026105260d9b41de022-06590110%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c65ed75294c6747395c3b4c711fcb15ef9acde13' => 
    array (
      0 => '/HTML/TinySnail/views/default/templates/account.html',
      1 => 1382449708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11525026105260d9b41de022-06590110',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5260d9b42e9f35_63602307',
  'variables' => 
  array (
    'user_info' => 0,
    'user_relation' => 0,
    'login_uid' => 0,
    'tab' => 0,
    'well' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5260d9b42e9f35_63602307')) {function content_5260d9b42e9f35_63602307($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/HTML/TinySnail/libs/vendors/Smarty-3.1.13/plugins/modifier.regex_replace.php';
?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="container">

<!-- 导航 -->
<ol class="breadcrumb">                                                                                           
<li><a href="/home">首页</a></li>
<li class="active">用户中心</li>
</ol>
<hr/>
<!-- /导航-->

<!--row-->
<div class="row row-offcanvas row-offcanvas-right">
<div class="col-xs-12 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">                                 
<img src="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['avatar'];?>
&s=440" class="img-rounded" height="220" width="220">
<p></p>
<div align="center">
<?php if ($_smarty_tpl->tpl_vars['user_relation']->value!='no'){?>
	<?php if ($_smarty_tpl->tpl_vars['user_relation']->value==@constant('SN_FOLLOWER_MUTUAL')){?>
	<button type="button" class="btn btn-primary" id="cancel_follower">取消关注</button> 
		相互关注 
	<?php }elseif($_smarty_tpl->tpl_vars['user_relation']->value==@constant('SN_FOLLOWER_YES')){?>
		<button type="button" class="btn btn-primary" id="cancel_follower">取消关注</button> 
	<?php }elseif($_smarty_tpl->tpl_vars['user_relation']->value==@constant('SN_FOLLOWER_NO')){?>
		<button type="button" class="btn btn-primary" id="set_follower">关注</button> 
	<?php }?>
<?php }?>
</div>

<?php if (isset($_smarty_tpl->tpl_vars['user_info']->value['user_name'])){?>
<h3><?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_name'];?>
</h3>                                                                                 
<?php }?>
<h5><?php echo $_smarty_tpl->tpl_vars['user_info']->value['login_name'];?>
</h5>

<hr/>
<h5><strong>积分：</strong><small><?php echo $_smarty_tpl->tpl_vars['user_info']->value['total_score'];?>
</small></h5>
<?php if (isset($_smarty_tpl->tpl_vars['user_info']->value['extend']['blog'])){?>
<h5><strong>博客：</strong><small><?php echo $_smarty_tpl->tpl_vars['user_info']->value['extend']['blog'];?>
</small></h5>
<?php }?>
<h5><strong>邮箱：</strong><small><?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['user_info']->value['user_email'],"/@github\.com/","...");?>
</small></h5>
<?php if (isset($_smarty_tpl->tpl_vars['user_info']->value['extend']['compny'])){?>
<h5><strong>就职公司：</strong><small><?php echo $_smarty_tpl->tpl_vars['user_info']->value['extend']['company'];?>
</small></h5>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['user_info']->value['extend']['location'])){?>
<h5><strong>所在地区：</strong><small><?php echo $_smarty_tpl->tpl_vars['user_info']->value['extend']['location'];?>
</small></h5>
<?php }?>
<h5><strong>注册时间：</strong><small><?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_registration_timeline'];?>
</small></h5>
<h5><strong><?php if ($_smarty_tpl->tpl_vars['user_info']->value['uid']==$_smarty_tpl->tpl_vars['login_uid']->value){?>我的项目<?php }else{ ?>Ta的项目<?php }?>：</strong><small><a href="http://github.com/<?php echo $_smarty_tpl->tpl_vars['user_info']->value['login_name'];?>
" target="_blank">GitHub repositories</a></small></h5>
</div><!--/span-->

<div class="col-xs-12 col-sm-9"> <!--span-->
	<div class="panel panel-default">
		<div class="panel-body"> <?php echo $_smarty_tpl->tpl_vars['user_info']->value['about_me'];?>
 </div>
	</div>
<!-- Nav tabs -->
<ul class="nav nav-tabs">
<li <?php if ($_smarty_tpl->tpl_vars['tab']->value=="task"){?>class="active"<?php }?>><a href="?tab=task"><?php if ($_smarty_tpl->tpl_vars['user_info']->value['uid']==$_smarty_tpl->tpl_vars['login_uid']->value){?>我的任务<?php }else{ ?>Ta的任务<?php }?></a></li>
<li <?php if ($_smarty_tpl->tpl_vars['tab']->value=="article"){?>class="active"<?php }?>><a href="?tab=article"><?php if ($_smarty_tpl->tpl_vars['user_info']->value['uid']==$_smarty_tpl->tpl_vars['login_uid']->value){?>我的文章<?php }else{ ?>Ta的文章<?php }?></a></li>
<li <?php if ($_smarty_tpl->tpl_vars['tab']->value=="fans"){?>class="active"<?php }?>><a href="?tab=fans"><?php if ($_smarty_tpl->tpl_vars['user_info']->value['uid']==$_smarty_tpl->tpl_vars['login_uid']->value){?>我的粉丝<?php }else{ ?>Ta的粉丝<?php }?></a></li>
<li <?php if ($_smarty_tpl->tpl_vars['tab']->value=="follower"){?>class="active"<?php }?>><a href="?tab=follower"><?php if ($_smarty_tpl->tpl_vars['user_info']->value['uid']==$_smarty_tpl->tpl_vars['login_uid']->value){?>我的关注<?php }else{ ?>Ta的关注<?php }?></a></li> 

<?php if ($_smarty_tpl->tpl_vars['user_info']->value['uid']!=$_smarty_tpl->tpl_vars['login_uid']->value){?>
<li <?php if ($_smarty_tpl->tpl_vars['tab']->value=="send_message"){?>class="active"<?php }?>><a href="?tab=send_message">给Ta发消息</a></li>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['user_info']->value['uid']==$_smarty_tpl->tpl_vars['login_uid']->value){?>
<li <?php if ($_smarty_tpl->tpl_vars['tab']->value=="message"){?>class="active"<?php }?>><a href="?tab=message">消息中心</a></li>
<li <?php if ($_smarty_tpl->tpl_vars['tab']->value=="settings"){?>class="active"<?php }?>><a href="?tab=settings">设置</a></li>
<?php }?>
</ul>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/account_".((string)$_smarty_tpl->tpl_vars['tab']->value).".html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</div> 
</div>
<!-- /row -->

<!-- well -->
<div class="well">
<p>
<?php echo $_smarty_tpl->tpl_vars['well']->value;?>

</p>
</div> 
<!-- /well -->

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</body>
</html>
<?php }} ?>