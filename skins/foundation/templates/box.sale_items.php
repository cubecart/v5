{if $PRODUCTS}
<div class="panel">
  <h3>{$LANG.catalogue.title_saleitems}</h3>
  <ul>
  {foreach from=$PRODUCTS item=product}
	<li>
	  <a href="{$product.url}" title="{$product.name}">{$product.name}</a><br />
	  {if {$product.saving}}<span class="saving">{$LANG.catalogue.saving} {$product.saving}</span>{/if}
	</li>
  {/foreach}
  </ul>
</div>
{/if}