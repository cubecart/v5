<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>{$PAGE_TITLE}</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="{$STORE_URL}/skins/{$SKIN_FOLDER}/css/foundation.css" />
  <link rel="stylesheet" href="{$STORE_URL}/skins/{$SKIN_FOLDER}/css/cubecart.print.css" media="screen,print" />
</head>
<body onload="window.print();">
  {foreach from=$LIST_ORDERS item=order}
  <div class="page-break">
	  <div class="row">
		<div class="small-6 columns">
		  
		    {$order.title_d} {$order.first_name_d} {$order.last_name_d}<br />
	  		{if !empty($order.company_name_d)}{$order.company_name_d}<br />{/if}
	  		{$order.line1_d} <br />
	  		{if !empty($order.line2_d)}{$order.line2_d}<br />{/if}
	  		{$order.town_d}<br />
	  		{$order.state_d}, {$order.postcode_d}<br />
	  		{$order.country_d}
		  
		</div>
		<div class="small-6 columns">
		  <img src="{$STORE_LOGO}" alt="" />
		</div>
	  </div>
	  <div class="row">
		<div class="small-12 columns">{$LANG.address.return_address}<br />{$STORE.address}, {$STORE.county}, {$STORE.postcode} {$STORE.country}</div></div>

	  <div>
		<span><strong>{$LANG.common.order_id}</strong> &nbsp; {$order.cart_order_id}</span>
		<strong>{$LANG.orders.title_receipt_for}</strong> {$order.order_date}
	  </div>

	  <div>
		<span>{$LANG.common.price}</span>
		<strong>{$LANG.common.product}</strong>
	  </div>
	  {foreach from=$order.items item=item}
	  <div>
		<span>{$item.price_total}</span>{$item.quantity} &times; {$item.name} {if !empty($item.product_code)} - {$item.product_code}{/if} ({$item.price})
		{if isset($item.options)}
		<br />{$LANG.catalogue.title_options} {foreach from=$item.options item=option}&raquo; {$option}{/foreach}
		{/if}
	  </div>
	  {/foreach}
	  <div>
		<div>{$LANG.basket.total_sub} <strong>{$order.subtotal}</strong></div>
		<div>{$LANG.basket.total_discount} <strong>{$order.discount}</strong></div>
		<div>{$LANG.basket.shipping} <strong>{$order.shipping}</strong></div>
		{if isset($order.taxes)}{foreach from=$order.taxes item=tax}
		<div>{$tax.name} <strong>{$tax.value}</strong></div>
		{/foreach}
		{/if}
		<br />
		<div><strong>{$LANG.basket.total_grand} {$order.total}</strong></div>
	  </div>
	  {if isset($order.customer_comments)}
	  <div><strong>{$LANG.orders.title_notes_extra}</strong> - {$order.customer_comments}</div>
	  {/if}
	  <div>{$LANG.orders.title_thanks}</div>
	  <div>
		<p>{$STORE.address}, {$STORE.county}, {$STORE.postcode} {$STORE.country}</p>
	  </div>
  </div>
  {/foreach}
</body>
</html>