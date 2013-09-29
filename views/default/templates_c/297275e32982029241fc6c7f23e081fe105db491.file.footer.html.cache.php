<?php /* Smarty version Smarty-3.1.13, created on 2013-09-30 00:36:31
         compiled from "/HTML/TinySnail/views/default/templates/footer.html" */ ?>
<?php /*%%SmartyHeaderCode:2622848615247fd52a0cb04-06260574%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '297275e32982029241fc6c7f23e081fe105db491' => 
    array (
      0 => '/HTML/TinySnail/views/default/templates/footer.html',
      1 => 1380472527,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2622848615247fd52a0cb04-06260574',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5247fd52a0f200_93014761',
  'variables' => 
  array (
    'bootstrap_domain' => 0,
    'portal_domain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5247fd52a0f200_93014761')) {function content_5247fd52a0f200_93014761($_smarty_tpl) {?><!-- Footer
================================================== -->
<!-- FOOTER -->
<hr/>
<footer>
<p class="pull-right"><a href="#">Back to top</a></p>
<p>&copy; 2013 TinySnail. &middot; <a href="http://sanrenbang.net">三人邦</a> &middot; <a href="http://github.com">Github</a></p>
</footer>

</div><!-- /.container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo $_smarty_tpl->tpl_vars['bootstrap_domain']->value;?>
/js/bootstrap.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['portal_domain']->value;?>
/js/global.js"></script>
</body>
</html>
<?php }} ?>