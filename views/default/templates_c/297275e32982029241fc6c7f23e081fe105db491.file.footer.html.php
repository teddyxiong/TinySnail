<?php /* Smarty version Smarty-3.1.13, created on 2013-10-17 23:43:59
         compiled from "/HTML/TinySnail/views/default/templates/footer.html" */ ?>
<?php /*%%SmartyHeaderCode:465792030526005bfd6e2b4-22381338%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '297275e32982029241fc6c7f23e081fe105db491' => 
    array (
      0 => '/HTML/TinySnail/views/default/templates/footer.html',
      1 => 1381201119,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '465792030526005bfd6e2b4-22381338',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'bootstrap_domain' => 0,
    'portal_domain' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_526005bfd9a286_02700614',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526005bfd9a286_02700614')) {function content_526005bfd9a286_02700614($_smarty_tpl) {?><!-- Footer
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

<?php }} ?>