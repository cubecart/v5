<h2>{$category.cat_name}</h2>
{if isset($category.image)}
<div class="row">
   <div class="small-12 columns"><img src="{$category.image}" alt="{$category.cat_name}" /></div>
</div>
{/if}
{if !empty($category.cat_desc)}
<div class="row">
   <div class="small-12 columns">{$category.cat_desc}</div>
</div>
{/if}
{if isset($SUBCATS) && $SUBCATS}
<ul class="small-block-grid-6 data-equalizer">
   {foreach from=$SUBCATS item=subcat}
   <li data-equalizer-watch>
      <a href="{$subcat.url}" title="{$subcat.cat_name}">
      <img class="th" src="{$subcat.cat_image}" alt="{$subcat.cat_name}" />
      </a>
      <a href="{$subcat.url}" title="{$subcat.cat_name}"><small>{$subcat.cat_name}</small></a>
   </li>
   {/foreach}
</ul>
{/if}

{include file='templates/element.sort_category.php'}

<ul class="small-block-grid-1" data-equalizer>
{foreach from=$PRODUCTS item=product}
<li data-equalizer-watch>
   <form action="{$VAL_SELF}" method="post" class="panel" id="add_to_basket">
     
      <div class="row">
         <div class="small-3 columns">
            
            <a href="{$product.url}" title="{$product.name}" class="image">
            <img class="th" src="{$product.thumbnail}" alt="{$product.name}" />
            </a>
         </div>
         <div class="small-6 columns">
            <h3>
               <a href="{$product.url}" title="{$product.name}">{$product.name}</a> 
            </h3>
            
            {$product.description_short}
            
            {if $product.review_score}
            <!--
            <div>
               {for $i = 1; $i <= 5; $i++}
               {if $product.review_score >= $i}
               <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star.png" alt="" />
               {elseif $product.review_score > ($i - 1) && $product.review_score < $i}
               <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star_half.png" alt="" />
               {else}
               <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star_off.png" alt="" />
               {/if}
               {/for}
               </div>
            <p class="rating-info">{$product.review_info}</p>
            -->
            {/if}
            
         </div>
         <div class="small-3 columns">
            <h3>
            {if $product.ctrl_sale}<span class="old_price">{$product.price}</span> <span class="sale_price">{$product.sale_price}</span>
                  {else}
            {$product.price}
                  {/if}
            </h3>
            
            
            {if $product.ctrl_purchase && !$CATALOGUE_MODE}
            <div class="row collapse">
               <div class="small-4 columns">
                  <input type="text" name="add[{$product.product_id}][quantity]" value="1" class="quantity text-center" />
               </div>
               <div class="small-8 columns">
                  <input type="submit" value="{$LANG.catalogue.add_to_basket}" class="button tiny postfix" />
               </div>
            </div>
            {elseif $product.out}
            <input type="submit" value="{$LANG.catalogue.out_of_stock_short}" disabled class="button disabled expand tiny" />
            {/if}
         </div>
      </div>
   </form>
</li>
{foreachelse}
<p>{$LANG.category.no_products}</p>
{/foreach}
</ul>
<div class="row">
   <div class="small-12 columns">
      {$PAGINATION}
   </div>
</div>
