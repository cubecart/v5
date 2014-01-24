<div class="row">
	<div class="large-12 columns">
		<a href="{$SEARCH_URL}">{$LANG.search.advanced}</a>
	</div>
</div>
<div class="row">
	<form action="{$ROOT_PATH}index.php" method="get">
		<div class="large-10 columns">
			<input name="search[keywords]" type="text" title="{$LANG.search.input_default}" />
			
		</div>
		<div class="large-2 columns">
			<input class="button small" type="submit" value="{$LANG.common.search}" />
		</div>
	<input type="hidden" name="_a" value="category" />
	</form>
</div>