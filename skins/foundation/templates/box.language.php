<a href="#" id="language_switch"><img src="#" class="flag flag-{$current_language.code|substr:3:2}" alt="{$current_language.title}" /></a>
<div class="hide pad" id="language_menu">
<div>{$LANG.common.change_language}</div>
{foreach from=$LANGUAGES item=language}
<hr>
<div class="text-left"><a href="{$language.url}"><img src="#" class="flag flag-{$language.code|substr:3:2}" alt="{$language.title}" /> {$language.title}</a></div>
{/foreach}
</div>