<?php
/* Smarty version 3.1.30, created on 2018-07-18 19:52:52
  from "D:\Programs\XAMPP\htdocs\workspace\docmagazine\smarty\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b4f706466a257_86774131',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48fb1af3fa21cd7d959acc2b51bcc1ba014dcfb0' => 
    array (
      0 => 'D:\\Programs\\XAMPP\\htdocs\\workspace\\docmagazine\\smarty\\templates\\index.tpl',
      1 => 1531855079,
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
function content_5b4f706466a257_86774131 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<section class="inner-info">
	<div class="body">
      <div class="content">
          <div class="content-text-field">
          <p>Здравейте, тук може да видите последните 3 качени документа. </p>
            
              <?php if (!empty($_smarty_tpl->tpl_vars['last_doc']->value)) {?>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['last_doc']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
            	 <div class="one-cmp">
                <a href="<?php echo $_smarty_tpl->tpl_vars['path_site']->value;?>
documents/<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
/"><b><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</b></a> <span class="pay"><?php if ($_smarty_tpl->tpl_vars['item']->value['pay']) {?>[абонамент]<?php } else { ?>[без абонамент]<?php }?></span>
                <p class="sm"><?php echo $_smarty_tpl->tpl_vars['item']->value['text'];?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['path_site']->value;?>
documents/<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
/">>></a></p>
               </div>
             
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
 
              <?php } else { ?>
              <p>В момента няма въведени документи</p>
              <?php }?>  
           
           
           </div>  
           
        </div> 
    </div>
</section>
 
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
