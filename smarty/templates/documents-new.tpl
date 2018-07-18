{include file="head.tpl"}
{include file="top.tpl"}

<section class="inner-info">
	<div class="body">
    	<div class="path">
        	<a href="{$path_site}" title="Начало">Начало</a> | Документи
        </div>
        <div class="content">
        	<div class="content-page-title">
            	<h1>Нов документ</h1>
                <span><img src="{$path_site}img/slogan-borders.jpg"></span>
            </div>
          {if $text}    
           <div class="content-text-field">
             {$text}
           </div>  
          {else}
          {if $text_ok}
           <p>{$text_ok}</p>
          {else}
          
          <p>За да въведете документ, моля попълнете следните полета:</p>
             <form name="Odoc" id="Oreg" method="post" action="#Odoc" ENCTYPE="multipart/form-data">
           <div class="content-text-field">
                <input class="i2" type="text" name="name" value="{$name}" placeholder="Име на документ" onblur="if(this.placeholder=='')this.placeholder='Име на документ'" onfocus="this.placeholder=''" maxlength="100" autocomplete="off">
                {if isset($err.name) and $err.name}<br><span class="err">{$err.name}</span>{/if} 
           </div>
           <div class="content-text-field">
           <textarea class="t1" name="textdoc"  placeholder="Кратко описание" onblur="if(this.placeholder=='')this.placeholder='Кратко описание'" onfocus="this.placeholder=''">{$textdoc}</textarea>   
            {if isset($err.textdoc) and $err.textdoc}<br><span class="err">{$err.textdoc}</span>{/if} 
            </div> 
            <p></p>
            <div class="form-group">Картинка
                        <input type="file" name="pic" class="file"> 
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control input-lg" disabled placeholder="Upload Image">
                            <span class="input-group-btn">
                                <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                            </span>
                        </div>
               {if isset($err.pic) and $err.pic}<br><span class="err">{$err.pic}</span>{/if}          
            </div>
            <p></p>
            <div class="form-group">Документ
                        <input type="file" name="doc" class="file"> 
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control input-lg" disabled placeholder="Upload Documnet">
                            <span class="input-group-btn">
                                <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                            </span>
                        </div>
                 {if isset($err.doc) and $err.doc}<br><span class="err">{$err.doc}</span>{/if}       
            </div>
             <p></p>
            <div class="content-text-field">
               <input type="checkbox" name="pay" id="pay" {if $pay}checked{/if}> <label for="pay">изисква плащане</label>
            </div>  
               
            
            <p><button type="submit" class="contact-btn" name="create">Create</button></p>
            
          </form>
           {/if}
           
          {/if} 
         
        </div> 
    </div>
</section>
{include file="footer.tpl"}