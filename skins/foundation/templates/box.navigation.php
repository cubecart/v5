
  <h3>{$LANG.navigation.title}</h3>
  <ul class="side-nav">
	<li><a href="{$STORE_URL}/index.php" title="{$LANG.navigation.homepage}">{$LANG.navigation.homepage}</a></li>

	{$NAVIGATION_TREE}

	{if $CTRL_CERTIFICATES && !$CATALOGUE_MODE}
	<li><a href="{$URL.certificates}" title="{$LANG.navigation.giftcerts}">{$LANG.navigation.giftcerts}</a></li>
	{/if}
	{if $CTRL_SALE}
	<li><a href="{$URL.saleitems}" title="{$LANG.navigation.saleitems}">{$LANG.navigation.saleitems}</a></li>
	{/if}
  </ul>
 