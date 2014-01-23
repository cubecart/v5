<div class="large-5 large-offset-3 columns text-right">
  {if $IS_USER}
	{$LANG_WELCOME_BACK}
	<a href="{$STORE_URL}/index.php?_a=logout" title="{$LANG.account.logout}">{$LANG.account.logout}</a>
	| <a href="{$STORE_URL}/index.php?_a=account" title="{$LANG.account.your_account}">{$LANG.account.your_account}</a>
  {else}
	<a href="{$URL.login}" title="{$LANG.account.log_in}">{$LANG.account.log_in}</a> {$LANG.common.or}
	<a href="{$URL.register}" title="{$LANG.account.register}">{$LANG.account.register}</a>
  {/if}
</div>