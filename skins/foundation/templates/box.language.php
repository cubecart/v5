<div class="large-2 columns">
  <form method="post">
  <select name="set_language">
    <option value="" disabled>{$LANG.common.change_language}:</option>
	{foreach from=$LANGUAGES item=language}
		<option value="{$language.code}" {$language.selected}>{$language.title}</option>
	{/foreach}
  </select>
  </form>
</div>