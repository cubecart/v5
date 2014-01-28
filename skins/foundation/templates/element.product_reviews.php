{if $CTRL_REVIEW}
<h2>{$LANG.catalogue.customer_reviews}</h2>
<div id="review_read">
   {if $REVIEWS}
   <p class="pagination_top"><span class="pagination">{if isset($PAGINATION)}{$PAGINATION}{/if}</span>{$LANG.catalogue.average_rating}: <strong>{$REVIEW_AVERAGE}</strong></p>
   {foreach from=$REVIEWS item=review}
   <div class="panel">
      <div class="row">
         <div class="large-9 columns">
            <h3>{$review.title}</h3>
         </div>
         <div class="large-3 columns text-right">
            {for $i = 1; $i <= 5; $i++}
            {if $i <= $review.rating}
            <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star.png" alt="{$i}" />
            {else}
            <img src="{$STORE_URL}/skins/{$SKIN_FOLDER}/images/star_off.png" alt="{$i}" />
            {/if}
            {/for}
         </div>
      </div>
      <blockquote><a href="http://gravatar.com/emails/"><img class="th marg-right" src="http://www.gravatar.com/avatar/{$review.gravatar}?s=90" align="left" /></a>{$review.review}<cite>{$review.name} ({$review.date})</cite></blockquote>
   </div>
   {/foreach}
   {if isset($PAGINATION)}{$PAGINATION}{/if}
   <a href="#" class="button review_toggle">{$LANG.catalogue.write_a_review}</a>
   {else}
   <div>{$LANG.catalogue.product_not_reviewed} <a href="#" class="review_toggle" class="button">{$LANG.catalogue.write_a_review}</a></div>
   {/if}
</div>
<div id="review_write" style="display: none;">
   <h3>{$LANG.catalogue.write_review}</h3>
   <form action="{$VAL_SELF}#reviews_write" method="post">
      <div class="panel">
         {if $IS_USER}
         <div class="row">
            <div class="large-12 columns"><input type="checkbox" id="rev_anon" name="review[anon]" value="1" /> <label for="rev_anon">{$LANG.catalogue.post_anonymously}</label></div>
         </div>
         {else}
         <div class="row">
            <div class="large-12 columns"><label for="rev_name">{$LANG.common.name}</label><input id="rev_name" type="text" name="review[name]" value="{$WRITE.name}" class="textbox required" /></div>
         </div>
         <div class="row">
            <div class="large-12 columns"><label for="rev_email">{$LANG.common.email}</label><input id="rev_email" type="text" name="review[email]" value="{$WRITE.email}" class="textbox required" /></div>
         </div>
         {/if}
         <div class="row">
            <div class="large-12 columns" id="review_stars">
               <label for="rating">{$LANG.documents.rating}</label>
               {foreach from=$RATING_STARS item=star}
               <input type="radio" id="rating_{$star.value}" name="rating" value="{$star.value}" class="rating" {$star.checked} />
               {/foreach}
            </div>
         </div>
         <div class="row">
            <div class="large-12 columns"><label for="rev_title" class="inline">{$LANG.catalogue.review_title}</label><input id="rev_title" type="text" name="review[title]" value="{$WRITE.title}" class="textbox required" /></div>
         </div>
         <div class="row">
            <div class="large-12 columns"><label for="rev_review" class="return">{$LANG.catalogue.review}</label><textarea id="rev_review" name="review[review]" class="textbox required" style="height: 70px; width:400px;" rows="10" cols="40">{$WRITE.review}</textarea></div>
         </div>
         {include file='templates/content.recaptcha.php'}
      </div>
      <div class="clearfix">
         <input type="submit" value="{$LANG.catalogue.submit_review}" class="button" />
         <input type="button" value="{$LANG.common.cancel}" class="button secondary right review_toggle" />
      </div>
   </form>
</div>
{/if}