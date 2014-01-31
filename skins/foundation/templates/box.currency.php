<form id="currency_select" action="{$VAL_SELF}" class="autosubmit" method="post">
  <h2 class="hide">{$LANG.common.currency}</h2>
  <select name="set_currency">
  <option value="" disabled>{$LANG.common.change_currency}</option>
  {foreach from=$CURRENCIES item=currency}
  <option value="{$currency.code}" {$currency.selected} title="{$currency.name}">{$currency.symbol_left} {$currency.name} {$currency.symbol_right}</option>
  {/foreach}
  </select> <input type="submit" value="{$LANG.common.submit}" class="hide" />
</form>