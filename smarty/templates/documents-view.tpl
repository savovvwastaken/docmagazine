{include file="head.tpl"}
{include file="top.tpl"}

<section class="inner-info">
	<div class="body">
    	<div class="path">
        	<a href="{$path_site}" title="Начало">Начало</a> | <a href="{$path_site}documents/" title="Документи">Документи</a>
        </div>
        <div class="content">
        	<div class="content-page-title">
            	<h1>{$doc_arr.name}</h1>
                <span><img src="{$path_site}img/slogan-borders.jpg"></span>
            </div>
               <div class="one-cmp">
               <img src="{$path_site}{$path_doc}{$doc_arr.pic}" alt="" title="" style="float:left; margin: 0.375rem 1.5rem 0 0; width:33%">   
                  {$doc_arr.text} <span class="pay">{if $doc_arr.pay}[абонамент]{else}[без абонамент]{/if}</span>
               </div>
                  {if $doc_arr.pay==0}   
                  <form name="Odoc" id="Oreg" method="post" action="#Odoc">
                    <button type="submit" class="contact-btn" name="download">Download</button>
                   </form>  
                  {else}  
                    {if $subscr==1}
                       <form name="Odoc" id="Oreg" method="post" action="#Odoc">
                         <button type="submit" class="contact-btn" name="download">Download</button>
                        </form> 
                     {else}
                        <b>Нужно е да се <a href="{$path_site}subscriptions/">абонирате</a>, за да даунлоднете файла</b> 
                     
                     
                      {/if}
                  {/if}
               
        </div> 
    </div>
</section>
{include file="footer.tpl"}