<dl class="sub-nav">
{if $IS_USER}
<dt>{$LANG_WELCOME_BACK}</dt>
<dd><a href="{$STORE_URL}/index.php?_a=logout" title="{$LANG.account.logout}">{$LANG.account.logout}</a></dd>

<dd><a href="{$STORE_URL}/index.php?_a=account" title="{$LANG.account.your_account}">{$LANG.account.your_account}</a></dd>
</dl>
{else}

<dt>{$LANG.account.welcome_back_guest}</dt>
<dd><a href="{$URL.login}" title="{$LANG.account.log_in}">{$LANG.account.log_in}</a></dd>
<dd><a href="{$URL.register}" title="{$LANG.account.register}">{$LANG.account.register}</a></dd>

{/if}
</dl>