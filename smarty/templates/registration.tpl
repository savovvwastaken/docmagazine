{include file="head.tpl"}
{include file="top.tpl"}

<section class="inner-info">
	<div class="body">
    	<div class="path">
        	<a href="{$path_site}" title="Начало">Начало</a> | Регистрация
        </div>
        <div class="content">
        	<div class="content-page-title">
            	<h1>Регистрация</h1>
                <span><img src="{$path_site}img/slogan-borders.jpg"></span>
            </div>
            
           {if isset($smarty.session.user_login) and !empty($smarty.session.user_login)}
             <div class="content-text-field">
              <p>Здравейте <b>{$smarty.session.user_login.uname}</b>, Вие сте регистриран в системата.</p>
           </div>
           {else} 
            
           {if $text_send}
           <div class="content-text-field">
           <p>{$text_send}</p>
           </div>
           
           {else}   
           <div class="content-text-field">
           <p>За да ползвате услугите, моля регистрирайте се в системата</p>
           </div>
           
           <form name="Ologin" id="Oreg" method="post" action="#Oreg">
           <div class="content-text-field">
                <input class="i2" type="text" name="email" value="{$email}" placeholder="E-mail" onblur="if(this.placeholder=='')this.placeholder='E-mail'" onfocus="this.placeholder=''" maxlength="100" autocomplete="off">
                {if isset($err.email) and $err.email}<br><span class="err">{$err.email}</span>{/if} 
           </div>   
           <div class="content-text-field">
                <input class="i2" type="text" name="uname" value="{$uname}" placeholder="Потребителско име" onblur="if(this.placeholder=='')this.placeholder='Потребителско име'" onfocus="this.placeholder=''" maxlength="20" autocomplete="off">
                {if isset($err.uname) and $err.uname}<br><span class="err">{$err.uname}</span>{/if} 
           </div>  
           <div class="content-text-field">
                <input class="i2" type="password" name="upass" value="{$upass}" placeholder="Парола" onblur="if(this.placeholder=='')this.placeholder='Парола'" onfocus="this.placeholder=''" maxlength="20" autocomplete="off">
                {if isset($err.upass) and $err.upass}<br><span class="err">{$err.upass}</span>{/if}  
           </div> 
           
            <button type="submit" class="contact-btn" name="sendreg">Send</button>
          </form>  
          {/if} 
         {/if}
        </div> 
    </div>
</section>
{include file="footer.tpl"}