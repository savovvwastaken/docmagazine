{include file="head.tpl"}
{include file="top.tpl"}


<section class="inner-info">
	<div class="body">
      <div class="content">
          <div class="content-text-field">
          <p>Здравейте, тук може да видите последните 3 качени документа. </p>
            
              {if !empty($last_doc)}
              {foreach $last_doc as $key=>$item}
            	 <div class="one-cmp">
                <a href="{$path_site}documents/{$key}/"><b>{$item.name}</b></a> <span class="pay">{if $item.pay}[абонамент]{else}[без абонамент]{/if}</span>
                <p class="sm">{$item.text} <a href="{$path_site}documents/{$key}/">>></a></p>
               </div>
             
              {/foreach} 
              {else}
              <p>В момента няма въведени документи</p>
              {/if}  
           
           
           </div>  
           
        </div> 
    </div>
</section>
 
{include file="footer.tpl"}