<ul class="right">
  <li class="has-dropdown">
    <a href="#">{$LANG.common.change_currency}:</a>
    <ul class="dropdown">
    	{foreach from=$CURRENCIES item=currency}
			<li><a href="{$currency.url}">{$currency.name} ({$currency.symbol_left})</a></li>
       {/foreach}
    </ul>
  </li>
  <li class="divider"></li>
</ul>