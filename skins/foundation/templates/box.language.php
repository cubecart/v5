<a href="#" id="language_switch">{$current_language.code}</a>
<div class="hide pad" id="language_menu">
<div>{$LANG.common.change_language}</div>
{foreach from=$LANGUAGES item=language}
<hr>
<div class="text-left"><a href="{$language.url}">{$language.title}</a></div>
{/foreach}
</div>