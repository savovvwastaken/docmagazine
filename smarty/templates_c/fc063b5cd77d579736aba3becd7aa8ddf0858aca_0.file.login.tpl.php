<?php
/* Smarty version 3.1.30, created on 2018-07-18 19:53:02
  from "D:\Programs\XAMPP\htdocs\workspace\docmagazine\smarty\templates\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b4f706ea0a7d7_37668347',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc063b5cd77d579736aba3becd7aa8ddf0858aca' => 
    array (
      0 => 'D:\\Programs\\XAMPP\\htdocs\\workspace\\docmagazine\\smarty\\templates\\login.tpl',
      1 => 1531853845,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:top.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5b4f706ea0a7d7_37668347 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<section class="inner-info">
	<div class="body">
    	<div class="path">
        	<a href="<?php echo $_smarty_tpl->tpl_vars['path_site']->value;?>
" title="Начало">Начало</a> | Вход
        </div>
        <div class="content">
        	<div class="content-page-title">
            	<h1>Вход</h1>
                <span><img src="<?php echo $_smarty_tpl->tpl_vars['path_site']->value;?>
img/slogan-borders.jpg"></span>
            </div>
          <?php if (isset($_SESSION['user_login']) && !empty($_SESSION['user_login'])) {?> 
            <div class="content-text-field">
            <p>Здравейте, <b><?php echo $_SESSION['user_login']['uname'];?>
</b>!</p>
            </div>
          <?php } else { ?>  
           <form name="Ologin" id="Ocontact" method="post" action="#Ologin">   
           <div class="content-text-field">
                <input class="i2" type="text" name="uname" value="<?php echo $_smarty_tpl->tpl_vars['uname']->value;?>
" placeholder="Потребителско име" onblur="if(this.placeholder=='')this.placeholder='Потребителско име'" onfocus="this.placeholder=''" maxlength="20" autocomplete="off">
                <?php if (isset($_smarty_tpl->tpl_vars['err']->value['uname']) && $_smarty_tpl->tpl_vars['err']->value['uname']) {?><br><span class="err"><?php echo $_smarty_tpl->tpl_vars['err']->value['uname'];?>
</span><?php }?> 
           </div>  
           <div class="content-text-field">
                <input class="i2" type="password" name="upass" value="<?php echo $_smarty_tpl->tpl_vars['upass']->value;?>
" placeholder="Парола" onblur="if(this.placeholder=='')this.placeholder='Парола'" onfocus="this.placeholder=''" maxlength="20" autocomplete="off">
                <?php if (isset($_smarty_tpl->tpl_vars['err']->value['upass']) && $_smarty_tpl->tpl_vars['err']->value['upass']) {?><br><span class="err"><?php echo $_smarty_tpl->tpl_vars['err']->value['upass'];?>
</span><?php }?>  
           </div> 
           
            <button type="submit" class="contact-btn" name="sendlogin">Send</button>
          </form>
          <?php }?>
        </div> 
    </div>
</section>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
