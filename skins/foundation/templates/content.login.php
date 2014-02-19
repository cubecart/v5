<div class="row">
<div class="small-6 columns">
<form action="{$VAL_SELF}" id="login_form" method="post">
	<h2>{$LANG.account.login}</h2>
		{foreach from=$LOGIN_HTML item=html}
		{$html}
		{/foreach}
		<div class="row">
			<div class="small-12 columns">
				<label for="login-username">{$LANG.user.email_address}</label>
				<input type="text" name="username" id="login-username" placeholder="{$LANG.user.email_address} {$LANG.form.required}" value="{$USERNAME}" required />
			</div>
		</div>
		<div class="row">
			<div class="small-12 columns">
				<label for="login-password">{$LANG.account.password}</label><input type="password" autocomplete="off" name="password" id="login-password" placeholder="{$LANG.account.password} {$LANG.form.required}" required />
			</div>
		</div>
		<div class="row">
			<div class="small-12 columns"><p><a href="{$STORE_URL}/index.php?_a=recover">{$LANG.account.forgotten_password}</a></p></div>
		</div>
		<div class="row">
			<div class="small-12 columns"><input type="checkbox" name="remember" id="login-remember" value="1" class="" {if $REMEMBER}checked="checked" {/if} /><label for="login-remember">{$LANG.account.remember_me}</label></div>
		</div>
		<div class="row">
			<div class="small-12 columns clearfix">
				<input name="submit" type="submit" value="{$LANG.account.log_in}" class="button" />
			</div>
		</div>
	<input type="hidden" name="redir" value="{$REDIRECT_TO}" />
</form>
</div>
<div class="small-6 columns">
<h2>{$LANG.account.register}</h2>
<p>{$LANG.account.register_welcome}</p>
<a href="?_a=register" class="button">{$LANG.account.register}</a>
</div>
</div>