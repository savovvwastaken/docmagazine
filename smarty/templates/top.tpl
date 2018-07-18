<body>
 <header>
 	<div class="body">
    	<div class="logo">
        	<a href="{$path_site}" title="{$brand_title}"><img src="{$path_site}img/logo.png" align="{$brand_title}" title="{$brand_title}"></a>
        </div>
         
      <nav id="cssmenu">
			<div id="head-mobile"></div>
          <div class="button"></div>
            <ul>
            <li><a href="{$path_site}">Начало</a></li>
            <li>{if isset($smarty.session.user_login) and !empty($smarty.session.user_login)}<a href="{$path_site}exit/">Изход</a>{else}<a href="{$path_site}login/">Вход</a>{/if}</li>
            <li><a href="{$path_site}registration/">Регистрация</a></li>
            <li><a href="{$path_site}subscriptions/">Абонамент</a></li>
            <li><a href="{$path_site}documents/">Документи</a></li>
            {if isset($smarty.session.user_login) and !empty($smarty.session.user_login) and $smarty.session.user_login.id==1}<li><a href="{$path_site}documents/new/">Нов документ</a></li>{/if}
          </ul>
     </nav>
   	</div>
</header>
