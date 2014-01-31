<div class="row">
   <div class="large-12 columns">
      <h2>{$DOCUMENT.doc_name}</h2>
   </div>
</div>
<div class="row">
   <div class="large-12 columns">{$DOCUMENT.doc_content}</div>
</div>
{if $SHARE}
<div class="row">
   <div class="large-12 columns">
      <h2>{$LANG.account.share}</h2>
      {foreach from=$SHARE item=html}
      {$html}
      {/foreach}
   </div>
</div>
{/if}
{foreach from=$COMMENTS item=html}
{$html}
{/foreach}