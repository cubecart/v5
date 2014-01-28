<h2>{$category.cat_name}</h2>
{if isset($category.image)}
<div class="row">
   <div class="large-12 columns"><img src="{$category.image}" alt="{$category.cat_name}" /></div>
</div>
{/if}
{if !empty($category.cat_desc)}
<div class="row">
   <div class="large-12 columns">{$category.cat_desc}</div>
</div>
{/if}
{if isset($SUBCATS) && $SUBCATS}
<ul class="large-block-grid-6 equalheight">
   {foreach from=$SUBCATS item=subcat}
   <li>
      <a href="{$subcat.url}" title="{$subcat.cat_name}">
      <img class="th" src="{$subcat.cat_image}" alt="{$subcat.cat_name}" />
      </a>
      <a href="{$subcat.url}" title="{$subcat.cat_name}">{$subcat.cat_name}</a>
   </li>
   {/foreach}
</ul>
{/if}
{if isset($PRODUCTS) && count($PRODUCTS) >= 1}

{include file='templates/element.sort_category.php'}

{/if}
{if isset($PRODUCTS)}

<ul class="large-block-grid-1 equalheight">
{foreach from=$PRODUCTS item=product}
<li>
<form action="{$VAL_SELF}" method="post" enctype="application/x-www-form-urlencoded">
   
      <h3><a href="{$product.url}" title="{$product.name}">{$product.name}</a></h3>
      <a href="{$product.url}" title="{$product.name}" class="image">
      <img class="th" src="{$product.thumbnail}" alt="{$product.name}" />
      </a>
      
         {if $product.ctrl_sale}
         <span class="old_price">{$product.price}</span> {$product.sale_price}
         {else}
         {$product.price}
         {/if}
         {if $product.review_score}
         <p class="rating">
            {for $i = 1; $i <= 5; $i++}
            {if $product.review_score >= $i}
            <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star.png" alt="" />
            {elseif $product.review_score > ($i - 1) && $product.review_score < $i}
            <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star_half.png" alt="" />
            {else}
            <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star_off.png" alt="" />
            {/if}
            {/for}
         </p>
         <p class="rating-info">{$product.review_info}</p>
         {/if}
         {if $product.ctrl_purchase && !$CATALOGUE_MODE}
         <input type="text" name="add[{$product.product_id}][quantity]" value="1" class="quantity" /> <input type="submit" value="{$LANG.catalogue.add_to_basket}" class="button_white" />
         {elseif $product.out}
         {$LANG.catalogue.out_of_stock_short}
         {/if}
      
      {$product.description_short}
  
</form>
</li>
{/foreach}
</ul>
{else}
<p>{$LANG.category.no_products}</p>
{/if}

<div class="row">
   <div class="large-12 columns">
   {$PAGINATION}
   </div>
</div>
