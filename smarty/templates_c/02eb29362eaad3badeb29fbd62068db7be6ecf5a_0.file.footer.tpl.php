<?php
/* Smarty version 3.1.30, created on 2018-07-18 19:52:52
  from "D:\Programs\XAMPP\htdocs\workspace\docmagazine\smarty\templates\footer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b4f7064a2e9a4_39962032',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02eb29362eaad3badeb29fbd62068db7be6ecf5a' => 
    array (
      0 => 'D:\\Programs\\XAMPP\\htdocs\\workspace\\docmagazine\\smarty\\templates\\footer.tpl',
      1 => 1531853845,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b4f7064a2e9a4_39962032 (Smarty_Internal_Template $_smarty_tpl) {
?>

<footer>
	<div class="body">
    	<div class="blue-footer">
        	<div class="blue-left">
               
            </div>
            <div class="blue-right">
            	 
            </div>
        </div>
    </div>
    <div class="body-copy">
    <div class="copy">
    	 
    	
    </div>
     
    <div class="abc">
     
    </div>
     
    </div>
</footer>
    

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path_site']->value;?>
js/jquery-2.1.1.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path_site']->value;?>
js/styled-file-browse-button.js"><?php echo '</script'; ?>
>

<!-------------MENU------------------------->
<?php echo '<script'; ?>
 type="text/javascript">
 (function($) {
$.fn.menumaker = function(options) {  
 var cssmenu = $(this), settings = $.extend({
   format: "dropdown",
   sticky: false
 }, options);
 return this.each(function() {
   $(this).find(".button").on('click', function(){
     $(this).toggleClass('menu-opened');
     var mainmenu = $(this).next('ul');
     if (mainmenu.hasClass('open')) { 
       mainmenu.slideToggle().removeClass('open');
     }
     else {
       mainmenu.slideToggle().addClass('open');
       if (settings.format === "dropdown") {
         mainmenu.find('ul').show();
       }
     }
   });
   cssmenu.find('li ul').parent().addClass('has-sub');
   multiTg = function() {
     cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
     cssmenu.find('.submenu-button').on('click', function() {
       $(this).toggleClass('submenu-opened');
       if ($(this).siblings('ul').hasClass('open')) {
         $(this).siblings('ul').removeClass('open').slideToggle();
       }
       else {
         $(this).siblings('ul').addClass('open').slideToggle();
       }
     });
   };
   if (settings.format === 'multitoggle') multiTg();
   else cssmenu.addClass('dropdown');
   if (settings.sticky === true) cssmenu.css('position', 'fixed');
   var windowWidth = $(window).width();
   resizeFix = function() {
 
if ($(window).width() != windowWidth) {
 
 windowWidth = $(window).width();

 setTimeout(function(){
   var mediasize = 800;
   if ($( window ).width() > mediasize) {
    cssmenu.find('ul').show();
   }

  if ($(window).width() <= mediasize) {
   cssmenu.find('ul').hide().removeClass('open');
 
  $('.submenu-button').removeClass('submenu-opened');
  $('.submenu-button').addClass('submenu-closed');
 }
 }, 500);
 
}
 }; 
   resizeFix();
   return $(window).on('resize', resizeFix);
  });
 };
})(jQuery);

(function($){
$(document).ready(function(){
$("#cssmenu").menumaker({
   format: "multitoggle"
  });
 });
 })(jQuery);		
 
<?php echo '</script'; ?>
> 

</body>
</html><?php }
}
