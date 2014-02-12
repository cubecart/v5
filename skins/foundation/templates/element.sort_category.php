{if isset($SORTING)}
<form action="{$VAL_SELF}" class="autosubmit" method="post">
   <div class="row">
   <div class="large-2 columns">
   <label for="product_sort">{$LANG.form.sort_by}</label>
   </div>
   <div class="large-5 columns left">
   <select name="sort" id="product_sort">
      <option value="" disabled>{$LANG.form.please_select}</option>
      {foreach from=$SORTING item=sort}
      <option value="{$sort.field}|{$sort.order}" {$sort.selected}>{$sort.name} ({$sort.direction})</option>
      {/foreach}
   </select>
   <input type="submit" value="{$LANG.form.sort}" class="hide" />
   </div>
</div>
</form>
{/if}