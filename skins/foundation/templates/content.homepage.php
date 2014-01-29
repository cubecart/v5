{if isset($DOCUMENT)}
<h1>{$DOCUMENT.title}</h1>
{$DOCUMENT.content}
{/if}
{if isset($LATEST_PRODUCTS)}
<h2>{$LANG.catalogue.latest_products}</h2>
<ul class="large-block-grid-3 small-block-grid-1 equalheight">
   {foreach from=$LATEST_PRODUCTS item=product}
   <li>
      <form action="{$VAL_SELF}" method="post" class="addForm panel">
         <div class="text-center">
            <a class="th" href="{$product.url}" title="{$product.name}"><img src="{$product.image}" alt="{$product.name}" /></a>
         </div>
         <h3><a href="{$product.url}" title="{$product.name}">{$product.name|truncate:38:"&hellip;"}</a></h3>
         {if $product.ctrl_sale}
         <span class="old_price">{$product.price}</span> <span class="sale_price">{$product.sale_price}</span>
         {else}
         {$product.price}
         {/if}
         <div class="rating"> {for $i = 1; $i <= 5; $i++}
            {if $product.review_score >= $i} <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star.png" alt="" /> {elseif $product.review_score > ($i - 1) && $product.review_score < $i} <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star_half.png" alt="" /> {else} <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star_off.png" alt="" /> {/if}
            {/for} 
         </div>
         <!--<a href="{$product.url}" title="{$product.name}" class="button tiny secondary left">{$LANG.common.info}</a>-->
         <input type="hidden" name="add" value="{$product.product_id}" />
         {if $product.ctrl_stock && !$CATALOGUE_MODE}
         <input type="submit" value="{$LANG.catalogue.add_to_basket}" class="button tiny expand marg-top" />
         {elseif !$CATALOGUE_MODE}
         <input type="submit" value="{$LANG.catalogue.out_of_stock_short}" class="button tiny disabled expand marg-top" disabled="disabled" />
         {/if}
      </form>
   </li>
   {/foreach}
</ul>
{/if}
