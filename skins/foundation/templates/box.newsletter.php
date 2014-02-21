<h3>{$LANG.newsletter.mailing_list}</h3>
{if $IS_USER}
{if ($CTRL_SUBSCRIBED)}
<p>{$LANG.newsletter.customer_is_subscribed}<br /><a href="{$STORE_URL}/index.php?_a=newsletter&amp;action=unsubscribe">{$LANG.newsletter.click_to_unsubscribe}</a></p>
{else}
<p>{$LANG.newsletter.customer_not_subscribed}<br /><a href="{$STORE_URL}/index.php?_a=newsletter&amp;action=subscribe">{$LANG.newsletter.click_to_subscribe}</a></p>
{/if}
{else}
<form action="{$VAL_SELF}" method="post" id="newsletter_form_box">
   <div class="hide">{$LANG.newsletter.enter_email_signup}</div>
   <div class="row collapse">
      <div class="small-9 columns"><input name="subscribe" type="text" class="textbox required" size="18" maxlength="250" title="{$LANG.newsletter.subscribe}"/></div>
      <div class="small-3 columns"><input type="submit" class="button postfix" value="{$LANG.newsletter.subscribe}" /></div>
   </div>
</form>
<div class="hide" id="validate_email">{$LANG.common.error_email_invalid}</div>
{/if}
