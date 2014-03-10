<a href="#" id="currency_switch">{$CURRENT_CURRENCY.symbol_left} {$CURRENT_CURRENCY.code} {$CURRENT_CURRENCY.symbol_right}</a>
<div class="hide pad" id="currency_menu">
<h5>{$LANG.common.change_currency}</h5>
{foreach from=$CURRENCIES item=currency}
{if $currency.code!==$CURRENT_CURRENCY.code}<hr>
<div class="text-left"><a href="{$currency.url}">{$currency.symbol_left} {$currency.code} {$currency.symbol_right}<br>{$currency.name}</a></div>
{/if}
{/foreach}
</div>