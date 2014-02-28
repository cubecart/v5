<div class="show-for-medium-up">
<form action="{$STORE_URL}/search.html" id="search_form" method="get">
	<div class="row collapse">
		<div class="small-10 columns">
			<input name="search[keywords]" type="text" placeholder="{$LANG.search.input_default}" x-webkit-speech required>
		</div>
		<div class="small-2 columns">
			<input class="button postfix" type="submit" value="{$LANG.common.search}">
		</div>
	</div>
	<input type="hidden" name="_a" value="category">
</form>
<div class="hide" id="validate_search">{$LANG.search.enter_search_term}</div>
</div>
<div class="show-for-small-only"><a href="#" class="show-small-search hidden"><i class="fa fa-search"></i></a></div>