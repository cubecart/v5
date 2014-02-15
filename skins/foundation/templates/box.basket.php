<div id="mini-basket">
<a href="#" id="basket-summary"><i class="fa fa-shopping-cart"></i> {$CART_TOTAL}</a> 
<div class="hide pad-side" id="basket-detail">
   {if isset($CONTENTS) && count($CONTENTS) > 0}
   {foreach from=$CONTENTS item=item}
   <p class="clearfix">
      <div class="left"><a href="{$item.link}" title="{$item.name}">{$item.quantity} &times; {$item.name_abbrev}</a></div>
      <div class="right">{$item.total}</div>
   </p>
   {/foreach}
   <p class="clearfix">
      <div class="left">{$LANG.common.items}</div>
      <div class="right">{$CART_ITEMS}</div>
   </p>
   <p class="clearfix">
      <div class="left">{$LANG.basket.total}:</strong></div>
      <div class="right">{$CART_TOTAL}</div>
   </p>
   <p class="clearfix">
      <div class="left"><a href="?_a=basket" class="button tiny secondary">{$LANG.basket.basket}</a></div>
      <div class="right"><a href="?_a=checkout" class="button tiny">{$LANG.basket.basket_checkout}</a></div>
   </p>
   {else}
   <p class="pad-top text-center">{$LANG.basket.basket_is_empty}</p>
   {/if}
</div>
</div>