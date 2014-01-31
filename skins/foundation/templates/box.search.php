<div class="row">
	<div class="large-12 columns text-right">
		<small><a href="{$SEARCH_URL}">{$LANG.search.advanced}</a></small>
	</div>
</div>
<form action="{$ROOT_PATH}index.php" id="search_form" method="get">
	<div class="row collapse">
		<div class="large-8 large-push-2 columns">
			<input name="search[keywords]" type="text" placeholder="{$LANG.search.input_default}" required />
		</div>
		<div class="large-2 columns">
			<input class="button postfix" type="submit" value="{$LANG.common.search}" />
		</div>
	</div>
	<input type="hidden" name="_a" value="category" />
</form>
