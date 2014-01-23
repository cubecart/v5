<div class="large-2 columns">
  <form method="post">
  <select name="set_currency">
    <option value="" disabled>{$LANG.common.change_currency}:</option>
	{foreach from=$CURRENCIES item=currency}
		<option value="{$currency.code}" {$currency.selected}>{$currency.name} ({$currency.symbol_left})</option>
	{/foreach}
  </select>
  </form>
</div>