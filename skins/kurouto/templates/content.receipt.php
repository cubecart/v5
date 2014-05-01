<div id="receipt">
  <h2>{$LANG.account.your_order}: #{$SUM.cart_order_id} - {$SUM.order_status}</h2>

  
  <p style="text-align: center;">{if $CTRL_PAYMENT}<a href="{$STORE_URL}/index.php?_a=gateway&amp;cart_order_id={$SUM.cart_order_id}">{$LANG.basket.complete_payment}</a> |{/if} <a href="{$STORE_URL}/index.php?_a=vieworder">{$LANG.account.your_orders}</a></p>
  
  <h2>{$LANG.basket.customer_info}</h2>
  <div class="address">
	<p><strong>{$LANG.address.billing_address}</strong><br />
	{$SUM.title} {$SUM.first_name} {$SUM.last_name}<br />
	{if $SUM.company_name}{$SUM.company_name}<br />{/if}
	{$SUM.line1}<br />
	{if $SUM.line2}{$SUM.line2}<br />{/if}
	{$SUM.town}<br />
	{$SUM.state}, {$SUM.postcode}<br />
	{$SUM.country}
	</p>
	<p><strong>{$LANG.address.delivery_address}</strong><br />
	{$SUM.title_d} {$SUM.first_name_d} {$SUM.last_name_d}<br />
	{if $SUM.company_name_d}{$SUM.company_name_d}<br />{/if}
	{$SUM.line1_d}<br />
	{if $SUM.line2_d}{$SUM.line2_d}<br />{/if}
	{$SUM.town_d}<br />
	{$SUM.state_d}, {$SUM.postcode_d}<br />
	{$SUM.country_d}
	</p>
  </div>
  {if !empty($SUM.customer_comments)}
  <h2>{$LANG.common.comments}</h2>
  <p>&quot;{$SUM.customer_comments}&quot;</p>
  {/if}

  	{if $DELIVERY}
	  	<h2>{$LANG.common.delivery}</h2>
	  	{if !empty($DELIVERY.date)}<p>{$LANG.orders.shipping_date}: {$DELIVERY.date}</p>{/if}
		{if isset($DELIVERY.url)}
			<p>{$LANG.basket.track}: <a href="{$DELIVERY.url}" target="_blank">{$DELIVERY.method}</a></p>
		{else}
			<p>{$DELIVERY.method} - {$LANG.orders.shipping_tracking}: {$DELIVERY.tracking}
		{/if}
	{/if}

  <h2>{$LANG.basket.order_summary}</h2>
  <div class="basket_header">
	<span class="basket_price">{$LANG.common.price}</span>
	<span class="basket_price">{$LANG.common.quantity}</span>
	{$LANG.common.product}
  </div>

  {foreach from=$ITEMS item=item}
  <div class="basket_product">
	<p>
	  <span class="price">{$item.price_total}</span>
	  <span class="price">{$item.quantity}</span>
	  <strong>{$item.name}</strong> {if isset($item.product_code) && !empty($item.product_code)} - {$item.product_code}{/if} ({$item.price})
	</p>
	{if isset($item.options)}
	<p>{foreach from=$item.options item=option}{$option}<br />{/foreach}</p>
	{/if}
  </div>
  {/foreach}

  <div class="subtotals">
	<p><span class="price">{$SUM.subtotal}</span> {$LANG.basket.total_sub}</p>
	<p><span class="price">{$SUM.shipping}</span> {$LANG.basket.shipping}</p>
	{foreach from=$TAXES item=tax}
	<p><span class="price">{$tax.value}</span>{$tax.name}</p>
	{/foreach}
  </div>
  {if $DISCOUNT}
  <div class="discounts">
	<p><span class="price">{$SUM.discount}</span> {$LANG.basket.total_discount}</p>
  </div>
  {/if}
  <div class="total"><span class="price">{$SUM.total}</span> {$LANG.basket.total_grand}</div>

  <p><a href="{$STORE_URL}/index.php?_a=receipt&amp;cart_order_id={$SUM.cart_order_id}" target="_blank">{$LANG.confirm.print}</a></p>

  {foreach from=$AFFILIATES item=affiliate}{$affiliate}{/foreach}

  {if $ANALYTICS}
  <script>
	{literal}
	ga('require', 'ecommerce', 'ecommerce.js'); 
	ga('ecommerce:addTransaction', {
	  'id': '{/literal}{$GA_SUM.cart_order_id}{literal}',
	  'affiliation': '{/literal}{$GA_SUM.store_name}{literal}',
	  'revenue': '{/literal}{$GA_SUM.total}{literal}',
	  'shipping': '{/literal}{$GA_SUM.shipping}{literal}',
	  'tax': '{/literal}{$GA_SUM.total_tax}{literal}'
	});
	{/literal}
	
	{foreach from=$GA_ITEMS item=item}
	  {literal}
	  ga('ecommerce:addItem', {
		  'id': '{/literal}{$GA_SUM.cart_order_id}{literal}',
		  'name': '{/literal}{$item.name}{literal}',
		  'sku': '{/literal}{$item.product_code}{literal}',
		  'category': '{/literal}{if isset($item.options)}{foreach from=$item.options item=option}{$option} {/foreach}{/if}{literal}',
		  'price': '{/literal}{$item.price}{literal}',
		  'quantity': '{/literal}{$item.quantity}{literal}'
		});
	  {/literal}
	{/foreach}
	ga('ecommerce:send');
	</script>
  {/if}
</div>