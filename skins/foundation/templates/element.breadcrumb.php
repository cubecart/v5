{if $CRUMBS}
<ul class="breadcrumbs">
  <li><a href="{$STORE_URL}">{$LANG.common.home}</a></li>
  {foreach from=$CRUMBS item=crumb}
  <li><a href="{$crumb.url}">{$crumb.title}</a></li>
  {/foreach}
</ul>
{else}
<div class="thickpad-top"></div>
{/if}