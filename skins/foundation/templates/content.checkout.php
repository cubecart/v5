{if isset($ITEMS)}
<form action="{$VAL_SELF}" method="post" enctype="multipart/form-data" class="autosubmit" id="checkout_form">
   {if $INCLUDE_CHECKOUT}
   {include file='templates/content.checkout.confirm.php'}
   {/if}
   <h2>{$LANG.checkout.your_basket}</h2>
   <table class="expand">
      <thead>
         <tr>
            <td></td>
            <td>{$LANG.common.name}</td>
            <td>{$LANG.common.price_unit}</td>
            <td>{$LANG.common.quantity}</td>
            <td>{$LANG.common.price}</td>
         </tr>
      </thead>
      <tbody>
         {foreach from=$ITEMS key=hash item=item}
         <tr>
            <td><a href="{$STORE_URL}/index.php?_a=basket&amp;remove-item={$hash}"><i class="fa fa-trash-o"></i></a></td>
            <td>
               <a href="{$item.link}" class="th" title="{$item.name}"><img src="{$item.image}" alt="{$item.name}"></a>
               <a href="{$item.link}" class="txtDefault"><strong>{$item.name}</strong></a>
               {if $item.options}
               <ul class="no-bullet">
               {foreach from=$item.options item=option}
               <li><strong>{$option.option_name}</strong>: {$option.value_name|truncate:45:"&hellip;":true}{if !empty($option.price_display)} ({$option.price_display}){/if}</li>
               {/foreach}
               </ul>
               {/if}
               <p>
            </td>
            <td>{$item.line_price_display}</td>
            <td align="center"><input name="quan[{$hash}]" type="text" value="{$item.quantity}" maxlength="3" class="quantity" {$QUAN_READ_ONLY}></td>
            <td>{$item.price_display}</td>
         </tr>
         {/foreach}
      </tbody>
      <tfoot>
         <tr>
            <td colspan="3">{if $BASKET_WEIGHT}
               {$LANG.basket.weight}: {$BASKET_WEIGHT}
               {/if}
            </td>
            <td>{$LANG.basket.total_sub}</td>
            <td>{$SUBTOTAL}</td>
         </tr>
         {if isset($SHIPPING)}
         <tr>
            <td colspan="3">
               {$LANG.basket.shipping_select}:
               <select name="shipping">
                  <option value="">{$LANG.form.please_select}</option>
                  {foreach from=$SHIPPING key=group item=methods}
                  {if $HIDE_OPTION_GROUPS ne '1'}
                  <optgroup label="{$group}">{/if}
                     {foreach from=$methods item=method}
                     <option value="{$method.value}" {$method.selected}>{$CUSTOMER_LOCALE.mark} {$method.display}</option>
                     {/foreach}
                     {if $HIDE_OPTION_GROUPS ne '1'}
                  </optgroup>
                  {/if}
                  {/foreach}
               </select>
            </td>
            <td>{$LANG.basket.shipping}{$CUSTOMER_LOCALE.mark}</td>
            <td>{$SHIPPING_VALUE}</td>
         </tr>
         {/if}
         {foreach from=$TAXES item=tax}
         <tr>
            <td colspan="3"></td>
            <td>{$tax.name}{$CUSTOMER_LOCALE.mark}</td>
            <td>{$tax.value}</td>
         </tr>
         {/foreach}
         {foreach from=$COUPONS item=coupon}
         <tr>
            <td colspan="3"></td>
            <td><a href="{$VAL_SELF}&amp;remove_code={$coupon.remove_code}" title="{$LANG.common.remove}">{$coupon.voucher}</a></td>
            <td>{$coupon.value}</td>
         </tr>
         {/foreach}
         {if isset($DISCOUNT)}
         <tr>
            <td colspan="3"></td>
            <td>{$LANG.basket.total_discount}</td>
            <td>{$DISCOUNT}</td>
         </tr>
         {/if}
         <tr>
            <td colspan="3"></td>
            <td>{$LANG.basket.total_grand}</td>
            <td>{$TOTAL}</td>
         </tr>
      </tfoot>
   </table>
   <div class="row">
      <div class="small-8 columns">
         {$LANG.basket.coupon_add}
      </div>
      <div class="small-4 columns">
         <input name="coupon" id="coupon" type="text" maxlength="25">
      </div>
   </div>
   <h3>Payment Method</h3>
   <div class="row">
	   <div class="small-6 columns">
	   <!-- Start Payment Options -->
	   <ul class="no-bullet">
	   {foreach from=$GATEWAYS item=gateway}
	   <li>
	      <input name="gateway" type="radio" value="{$gateway.folder}" id="{$gateway.folder}" required {$gateway.checked}>
	         {if !empty($gateway.help)}
	         <a href="{$gateway.help}" class="info" title="{$LANG.common.information}"><img src="images/icons/information.png" alt="{$LANG.common.information}"></a>
	         {/if}
	         <label for="{$gateway.folder}">{$gateway.description}</label>
	      </li>
	   {/foreach}
	   </ul>
	   <div class="hide" id="validate_gateway_required">{$LANG.gateway.choose_payment}</div>
	   <!-- End Payment Options -->
	   </div>
	    <div class="small-6 columns">
	    credit card form
	    </div>
   </div>

   
   <div class="clearfix">
      <a href="{$STORE_URL}/index.php?_a=basket&amp;empty-basket=true" class="button alert left">{$LANG.basket.basket_empty}</a>
      <input type="submit" name="update" class="button secondary left" value="{$LANG.basket.basket_update}">
      {if $DISABLE_CHECKOUT_BUTTON!==true}
      <button type="submit" name="proceed" class="button right">{$CHECKOUT_BUTTON} <i class="fa fa-chevron-right"></i></button>
      {/if}
   </div>
</form>
{if $CUSTOMER_LOCALE.description}
<small>{$CUSTOMER_LOCALE.mark} {$LANG.basket.unconfirmed_locale}</small>
{/if}
{if $CHECKOUTS}
<div class="row"><div class="small-12 columns text-right">-- {$LANG.common.or} --</div></div>
{foreach from=$CHECKOUTS item=checkout}
<div class="row"><div class="small-12 columns text-right pad-topbottom">{$checkout}</div></div>
{/foreach}
{/if}


{if $RELATED}
   <h2>{$LANG.catalogue.related_products}
   <ul class="small-block-grid-4 no-bullet">
   {foreach from=$RELATED item=product}
      <li>
      	<a href="{$product.url}" title="{$product.name}"><img src="{$product.img_src}" class="th" alt="{$product.name}"></a>
        <br>
        <a href="{$product.url}" title="{$product.name}">{$product.name}</a>
      </li>
   {/foreach}
   </ul>
{/if}
{else}
<h2>{$LANG.checkout.your_basket}</h2>
<p class="thickpad-top">{$LANG.basket.basket_is_empty}</p>
{/if}