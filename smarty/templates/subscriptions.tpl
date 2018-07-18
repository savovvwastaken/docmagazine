{include file="head.tpl"}
{include file="top.tpl"}

<section class="inner-info">
	<div class="body">
    	<div class="path">
        	<a href="{$path_site}" title="Начало">Начало</a> | Абонамент
        </div>
        <div class="content">
        	<div class="content-page-title">
            	<h1>Абонамент</h1>
                <span><img src="{$path_site}img/slogan-borders.jpg"></span>
            </div>
              
           <div class="content-text-field">
           {if isset($smarty.session.user_login) and !empty($smarty.session.user_login) and $smarty.session.user_login.id!=1}
           
              {if $text}
                 <p>{$text}</p>
              {else}
               {if $subscr==1}
                  <p>Вие сте заплатили абонамент на {$date_subsr|date_format:"%d.%m.%Y"}.</p>
                  
               {else}
              <p>За да заявите абонамент и достъп до всички документи, моля отговорте:</p> 
              <p><b>Колко е 2+2?</b></p>
              <form name="Ologin" id="Osubscr" method="post" action="#Osubscr">   
           <div class="content-text-field">
                <input class="i2" type="text" name="res" value="{$res}" placeholder="Резултат" onblur="if(this.placeholder=='')this.placeholder='Резултат'" onfocus="this.placeholder=''" maxlength="1" autocomplete="off">
                {if isset($err.res) and $err.res}<br><span class="err">{$err.res}</span>{/if} 
           </div>  
            <button type="submit" class="contact-btn" name="sendres">Send</button>
          </form>
           {/if}
          {/if}
           {else}
           {if isset($smarty.session.user_login) and !empty($smarty.session.user_login) and $smarty.session.user_login.id==1}
           
           {else}
           <p>Нужно е да се <a href="{$path_site}registration/">регистрирате</a>, за да заявите абонамент.</p>
           {/if}
           {/if}
          
           
           
           </div>  
           
         
        </div> 
    </div>
</section>
{include file="footer.tpl"}