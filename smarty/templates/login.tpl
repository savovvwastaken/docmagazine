{include file="head.tpl"}
{include file="top.tpl"}

<section class="inner-info">
	<div class="body">
    	<div class="path">
        	<a href="{$path_site}" title="Начало">Начало</a> | Вход
        </div>
        <div class="content">
        	<div class="content-page-title">
            	<h1>Вход</h1>
                <span><img src="{$path_site}img/slogan-borders.jpg"></span>
            </div>
          {if isset($smarty.session.user_login) and !empty($smarty.session.user_login)} 
            <div class="content-text-field">
            <p>Здравейте, <b>{$smarty.session.user_login.uname}</b>!</p>
            </div>
          {else}  
           <form name="Ologin" id="Ocontact" method="post" action="#Ologin">   
           <div class="content-text-field">
                <input class="i2" type="text" name="uname" value="{$uname}" placeholder="Потребителско име" onblur="if(this.placeholder=='')this.placeholder='Потребителско име'" onfocus="this.placeholder=''" maxlength="20" autocomplete="off">
                {if isset($err.uname) and $err.uname}<br><span class="err">{$err.uname}</span>{/if} 
           </div>  
           <div class="content-text-field">
                <input class="i2" type="password" name="upass" value="{$upass}" placeholder="Парола" onblur="if(this.placeholder=='')this.placeholder='Парола'" onfocus="this.placeholder=''" maxlength="20" autocomplete="off">
                {if isset($err.upass) and $err.upass}<br><span class="err">{$err.upass}</span>{/if}  
           </div> 
           
            <button type="submit" class="contact-btn" name="sendlogin">Send</button>
          </form>
          {/if}
        </div> 
    </div>
</section>
{include file="footer.tpl"}