{if isset($DOCUMENT)}
<div id="announcement">
	<h1>{$DOCUMENT.title}</h1>
	 {$DOCUMENT.content}
</div>
 {/if} {if isset($LATEST_PRODUCTS)}
<h2>{$LANG.catalogue.latest_products}</h2>
<div id="productContainer">
	 {foreach from=$LATEST_PRODUCTS item=product}
	<div class="products">
		<form action="{$VAL_SELF}" method="post" class="addForm">
			<div class="productsImg">
				<a href="{$product.url}" title="{$product.name}">
				<img src="{$product.image}" alt="{$product.name}"/>
				</a>
			</div>
			<div class="productsTitle">
				<a href="{$product.url}" title="{$product.name}">{$product.name|truncate:38:"&hellip;"}</a>
			</div>
			{if $product.review_score && $CTRL_REVIEW}
			  <!-- Please uncomment to enable
			  <div class="rating">
			  {for $i = 1; $i <= 5; $i++}
			    {if $product.review_score >= $i}
				<img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/common/star.png" alt="" />
				{elseif $product.review_score > ($i - 1) && $product.review_score < $i}
				<img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/common/star_half.png" alt="" />
				{else}
				<img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/common/star_off.png" alt="" />
				{/if}
			  {/for}
			  </div>
			  -->
			 {/if}
			 {if $product.ctrl_sale}
			<div class="productsPrice">
				<span class="price_previous">{$product.price}</span><span class="price_sale">{$product.sale_price}</span>
			</div>
			 {else}
			<div class="productsPrice">
				{$product.price}
			</div>
			 {/if}
			<div class="productsActions">
				<input type="hidden" name="add" value="{$product.product_id}"/>
				{if $product.ctrl_stock && !$CATALOGUE_MODE} <input type="submit" value="{$LANG.catalogue.buy_now}" class="btn productsBuy"/>
				{elseif !$CATALOGUE_MODE} <input type="submit" value="{$LANG.catalogue.out_of_stock_short}" class="btn productsBuy disabled" disabled="disabled"/>
				{/if}
			</div>
		</form>
	</div>
	 {/foreach}
</div>
<div class="clear">
	&nbsp;
</div>
{/if}