<?php /* Smarty version Smarty-3.1.13, created on 2013-10-17 23:44:20
         compiled from "/HTML/TinySnail/views/default/templates/jump.html" */ ?>
<?php /*%%SmartyHeaderCode:52150452526005d4463820-55734641%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53d2ed97f31af02ee40903b90395a89d477941ac' => 
    array (
      0 => '/HTML/TinySnail/views/default/templates/jump.html',
      1 => 1381249358,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52150452526005d4463820-55734641',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'callback_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_526005d45293e9_20991839',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526005d45293e9_20991839')) {function content_526005d45293e9_20991839($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="container">

<div class="panel panel-default">
<!-- Default panel contents -->
<div class="panel-heading">跳转中，请稍后...</div>
<div class="panel-body">
<p class="text-center ">非常感谢，您的<?php echo $_smarty_tpl->tpl_vars['callback_info']->value['label_txt_1'];?>
已经发布，现在将进入<?php echo $_smarty_tpl->tpl_vars['callback_info']->value['label_txt_2'];?>
页。</p>
<p class="text-center "><a href="<?php echo $_smarty_tpl->tpl_vars['callback_info']->value['plans_url'];?>
" target="_self">[ 需要进入<?php echo $_smarty_tpl->tpl_vars['callback_info']->value['label_txt_3'];?>
页请点击这里 ]</a><p>
<p class="text-center "><a href="<?php echo $_smarty_tpl->tpl_vars['callback_info']->value['default_url'];?>
" target="_self">如果您的浏览器没有自动跳转，请点击这里。</a></p>
</div>
</div>
<script>
setTimeout("window.location.href='<?php echo $_smarty_tpl->tpl_vars['callback_info']->value['default_url'];?>
'", <?php echo $_smarty_tpl->tpl_vars['callback_info']->value['mrefreshtime'];?>
);
</script>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_path']->value)."/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</body>
</html>
<?php }} ?>