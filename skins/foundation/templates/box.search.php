<!--
<div class="row">
	<div class="large-12 columns text-right">
		<small><a href="{$SEARCH_URL}">{$LANG.search.advanced}</a></small>
	</div>
</div>
-->
<form action="{$ROOT_PATH}index.php" id="search_form" method="get">
	<div class="row collapse">
		<div class="large-10 columns">
			<input name="search[keywords]" type="text" placeholder="{$LANG.search.input_default}" x-webkit-speech required />
		</div>
		<div class="large-2 columns">
			<input class="button postfix" type="submit" value="{$LANG.common.search}" />
		</div>
	</div>
	<input type="hidden" name="_a" value="category" />
</form>
<div class="hide" id="validate_search">{$LANG.search.enter_search_term}</div>