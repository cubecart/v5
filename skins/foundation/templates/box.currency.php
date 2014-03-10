<a href="#" id="currency_switch">{$CURRENT_CURRENCY.symbol_left} {$CURRENT_CURRENCY.code} {$CURRENT_CURRENCY.symbol_right}</a>
<div class="hide pad" id="currency_menu">
<div>{$LANG.common.change_currency}</div>
{foreach from=$CURRENCIES item=currency}
<hr>
<div class="text-left"><a href="{$currency.url}">{$currency.symbol_left} {$currency.code} {$currency.symbol_right}<br>{$currency.name}</a></div>
{/foreach}
</div>