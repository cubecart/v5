<i class="fa fa-dollar"></i>
<!--






fa-bitcoin 
fa-btc
fa-cny 
fa-dollar 
fa-eur
fa-euro 
fa-gbp
fa-inr
fa-jpy
fa-krw
fa-rmb 
fa-rouble 
fa-rub
fa-ruble 
fa-rupee 
fa-try
fa-turkish-lira 
fa-usd
fa-won 
fa-yen 








<form action="{$VAL_SELF}" class="autosubmit" method="post">
  <h2 class="hide">{$LANG.common.currency}</h2>
  <select name="set_currency">
  <option value="" disabled>{$LANG.common.change_currency}</option>
  {foreach from=$CURRENCIES item=currency}
  <option value="{$currency.code}" {$currency.selected} title="{$currency.name}">{$currency.symbol_left} {$currency.name} {$currency.symbol_right}</option>
  {/foreach}
  </select> <input type="submit" value="{$LANG.common.submit}" class="hide">
</form>
-->