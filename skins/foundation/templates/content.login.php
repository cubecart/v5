<form action="{$VAL_SELF}" method="post">
	<h2>{$LANG.account.login}</h2>
		{foreach from=$LOGIN_HTML item=html}
		{$html}
		{/foreach}
		<div class="row">
			<div class="large-12 columns">
				<label for="login-username">{$LANG.user.email_address}</label>
				<input type="text" name="username" id="login-username" placeholder="{$LANG.user.email_address}" value="{$USERNAME}" />
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label for="login-password">{$LANG.account.password}</label><input type="password" autocomplete="off" name="password" id="login-password" placeholder="{$LANG.account.password}" />
			</div>
		</div>
		<div class="row">
			<div class="large-3 columns"><label for="login-remember">{$LANG.account.remember_me}</label></div>
			<div class="large-1 columns"><input type="checkbox" name="remember" id="login-remember" value="1" class="" {if $REMEMBER}checked="checked" {/if} /></div>
			<div class="large-6 columns text-right"><a href="{$STORE_URL}/index.php?_a=recover">{$LANG.account.forgotten_password}</a></div>
		</div>
		<div class="row">
			<div class="large-12 columns"><input name="submit" type="submit" value="{$LANG.account.log_in}" class="button" /></div>
		</div>
	<input type="hidden" name="redir" value="{$REDIRECT_TO}" />
</form>