<?php
/* Smarty version 3.1.30, created on 2018-07-18 19:52:52
  from "D:\Programs\XAMPP\htdocs\workspace\docmagazine\smarty\templates\top.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b4f7064842702_74248066',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bedcdd348d55d68d9aaf519807bbfa3ca7936008' => 
    array (
      0 => 'D:\\Programs\\XAMPP\\htdocs\\workspace\\docmagazine\\smarty\\templates\\top.tpl',
      1 => 1531853845,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b4f7064842702_74248066 (Smarty_Internal_Template $_smarty_tpl) {
?>
<body>
 <header>
 	<div class="body">
    	<div class="logo">
        	<a href="<?php echo $_smarty_tpl->tpl_vars['path_site']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['brand_title']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['path_site']->value;?>
img/logo.png" align="<?php echo $_smarty_tpl->tpl_vars['brand_title']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['brand_title']->value;?>
"></a>
        </div>
         
      <nav id="cssmenu">
			<div id="head-mobile"></div>
          <div class="button"></div>
            <ul>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['path_site']->value;?>
">Начало</a></li>
            <li><?php if (isset($_SESSION['user_login']) && !empty($_SESSION['user_login'])) {?><a href="<?php echo $_smarty_tpl->tpl_vars['path_site']->value;?>
exit/">Изход</a><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['path_site']->value;?>
login/">Вход</a><?php }?></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['path_site']->value;?>
registration/">Регистрация</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['path_site']->value;?>
subscriptions/">Абонамент</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['path_site']->value;?>
documents/">Документи</a></li>
            <?php if (isset($_SESSION['user_login']) && !empty($_SESSION['user_login']) && $_SESSION['user_login']['id'] == 1) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['path_site']->value;?>
documents/new/">Нов документ</a></li><?php }?>
          </ul>
     </nav>
   	</div>
</header>
<?php }
}
