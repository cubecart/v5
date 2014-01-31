<form action="{$VAL_SELF}" class="autosubmit" method="post">
  <h2 class="hide">{$LANG.common.language}</h2>
  <select name="set_language">
   <option value="" disabled>{$LANG.common.change_language}</option>
  {foreach from=$LANGUAGES item=language}
  <option value="{$language.code}" {$language.selected}>{$language.title}</option>
  {/foreach}
  </select> <input type="submit" value="{$LANG.common.submit}" class="hide" />
  </form>