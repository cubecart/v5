{if isset($GUI_MESSAGE.error)}
<div data-alert class="alert-box alert">
   {$LANG.gui_message.errors_detected}
   <ul>
      {foreach from=$GUI_MESSAGE.error item=error}
      <li>{$error}</li>
      {/foreach}
   </ul>
   <a href="#" class="close">&times;</a>
</div>
{/if}
{if isset($GUI_MESSAGE.notice)}
<div data-alert class="alert-box success">
   {foreach from=$GUI_MESSAGE.notice item=notice}
   <div>{$notice}</div>
   {/foreach}
   <a href="#" class="close">&times;</a>
</div>
{/if}