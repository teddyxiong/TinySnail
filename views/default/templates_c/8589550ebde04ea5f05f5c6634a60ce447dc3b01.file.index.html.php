<?php /* Smarty version Smarty-3.1.13, created on 2013-10-18 15:22:11
         compiled from "/HTML/TinySnail/views/default/templates/index.html" */ ?>
<?php /*%%SmartyHeaderCode:640717761526005f6b74319-34723116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8589550ebde04ea5f05f5c6634a60ce447dc3b01' => 
    array (
      0 => '/HTML/TinySnail/views/default/templates/index.html',
      1 => 1382080845,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '640717761526005f6b74319-34723116',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_526005f6bfd9a2_51645896',
  'variables' => 
  array (
    'all_cate' => 0,
    'cate_id' => 0,
    'cate_name' => 0,
    'well' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526005f6bfd9a2_51645896')) {function content_526005f6bfd9a2_51645896($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="container">

<!-- Split button -->
<div class="text-muted">
	<ul class="list-inline">
<?php if (isset($_GET['cate_id'])&&$_GET['cate_id']>0){?>
	<li><a href="/" target="_self">全部</a></li>
<?php }else{ ?>
	<li><span class="label label-info">全部</span></li>
<?php }?>
<?php  $_smarty_tpl->tpl_vars["cate_name"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["cate_name"]->_loop = false;
 $_smarty_tpl->tpl_vars["cate_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['all_cate']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["cate_name"]->key => $_smarty_tpl->tpl_vars["cate_name"]->value){
$_smarty_tpl->tpl_vars["cate_name"]->_loop = true;
 $_smarty_tpl->tpl_vars["cate_id"]->value = $_smarty_tpl->tpl_vars["cate_name"]->key;
?>                                                         
	<?php if ($_GET['cate_id']==$_smarty_tpl->tpl_vars['cate_id']->value){?>
		<li><span class="label label-info"><?php echo $_smarty_tpl->tpl_vars['cate_name']->value;?>
</span></li>
	<?php }else{ ?>
		<li><a href="/<?php echo $_smarty_tpl->tpl_vars['cate_id']->value;?>
/" target="_self"><?php echo $_smarty_tpl->tpl_vars['cate_name']->value;?>
</a></li>
	<?php }?>
<?php } ?>
	</ul>
</div>
<hr/>
<!-- /Split button-->

<!--row-->
<div class="row row-offcanvas row-offcanvas-right">
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/index_main.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/hot_tasks.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/hot_article.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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