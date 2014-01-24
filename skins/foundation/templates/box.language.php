<ul class="right">
  <li class="has-dropdown">
    <a href="#">{$LANG.common.change_language}:</a>
    <ul class="dropdown">
      {foreach from=$LANGUAGES item=language}
      <li><a href="{$language.url}">{$language.title}</a></li>
      {/foreach}
    </ul>
  </li>
</ul>