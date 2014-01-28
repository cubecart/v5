{if isset($SORTING)}
<form action="{$VAL_SELF}" class="autosubmit" method="post">
   <div class="row">
   <div class="large-2 columns">
   <form action="{$VAL_SELF}" class="autosubmit" method="post">
   {$LANG.form.sort_by}
   </div>
   <div class="large-5 columns left">
   <select name="sort">
      <option value="" disabled>{$LANG.form.please_select}</option>
      {foreach from=$SORTING item=sort}
      <option value="{$sort.field}|{$sort.order}" {$sort.selected}>{$sort.name} ({$sort.direction})</option>
      {/foreach}
   </select>
   <input type="submit" value="{$LANG.form.sort}" class="hide" />
   </form>
   </div>
</div>
{/if}