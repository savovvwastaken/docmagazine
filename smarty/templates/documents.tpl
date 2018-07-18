{include file="head.tpl"}
{include file="top.tpl"}

<section class="inner-info">
	<div class="body">
    	<div class="path">
        	<a href="{$path_site}" title="Начало">Начало</a> | Документи
        </div>
        <div class="content">
        	<div class="content-page-title">
            	<h1>Документи</h1>
                <span><img src="{$path_site}img/slogan-borders.jpg"></span>
            </div>
              
            
            {if !empty($docs_arr)}
              {foreach $docs_arr as $key=>$item}
                 <div class="one-cmp">
                <a href="{$path_site}documents/{$key}/"><b>{$item.name}</b></a> <span class="pay">{if $item.pay}[абонамент]{else}[без абонамент]{/if}</span>
                <p class="sm">{$item.text} <a href="{$path_site}documents/{$key}/">>></a></p>
               </div>
              {/foreach}
            {/if}
            
            {if $nav}
            <div class="paging">
        	    <div class="border-paging">
               {$nav}
              </div>
              </div>
            {/if}
           
         
        </div> 
    </div>
</section>
{include file="footer.tpl"}