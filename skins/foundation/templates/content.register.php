<h2>{$LANG.account.create_account}</h2>
<p>{$LANG.account.register_text}</p>
<form action="{$VAL_SELF}" method="post" name="registration">
   {foreach from=$LOGIN_HTML item=html}
   {$html}
   {/foreach}
   <div class="row">
      <div class="large-4 columns"><label for="register-title">{$LANG.user.title}</label><input type="text" name="title" id="register-title" value="{$DATA.title}" placeholder="{$LANG.user.title}" /></div>
   </div>
   <div class="row">
      <div class="large-8 columns"><label for="register-firstname">{$LANG.user.name_first}</label><input type="text" name="first_name" id="register-firstname" value="{$DATA.first_name}" placeholder="{$LANG.user.name_first} {$LANG.form.required}"  /></div>
   </div>
   <div class="row">
      <div class="large-8 columns"><label for="register-lastname">{$LANG.user.name_last}</label><input type="text" name="last_name" id="register-lastname" value="{$DATA.last_name}"  placeholder="{$LANG.user.name_last} {$LANG.form.required}" /></div>
   </div>
   <div class="row">
      <div class="large-8 columns"><label for="register-email">{$LANG.common.email}</label><input type="text" name="email" id="register-email" value="{$DATA.email}" placeholder="{$LANG.common.email}  {$LANG.form.required}"  /></div>
   </div>
   <div class="row">
      <div class="large-8 columns"><label for="register-phone">{$LANG.address.phone}</label><input type="text" name="phone" id="register-phone"  value="{$DATA.phone}" placeholder="{$LANG.address.phone} {$LANG.form.required}" /></div>
   </div>
   <div class="row">
      <div class="large-8 columns"><label for="register-mobile">{$LANG.address.mobile}</label><input type="text" name="mobile" id="register-mobile"  value="{$DATA.mobile}" placeholder="{$LANG.address.mobile}" /></div>
   </div>
   <div class="row">
      <div class="large-8 columns"><label for="register-password">{$LANG.account.password}</label><input type="password" autocomplete="off" name="password" id="register-password" placeholder="{$LANG.account.password} {$LANG.form.required}"  /></div>
   </div>
   <div class="row">
      <div class="large-8 columns"><label for="register-passconf">{$LANG.account.password_confirm}</label><input type="password" autocomplete="off" name="passconf" id="register-passconf" placeholder="{$LANG.account.password_confirm}  {$LANG.form.required}"  /></div>
   </div>
   {include file='templates/content.recaptcha.php'}
   {if $TERMS_CONDITIONS}
   <div class="row">
      <div class="large-8 columns"><input type="checkbox" id="register-terms" name="terms_agree" value="1" {$TERMS_CONDITIONS_CHECKED} /><label for="register-terms">{$LANG.account.register_terms_agree_link|replace:'%s':{$TERMS_CONDITIONS}}</label></div>
   </div>
   {/if}
   <div class="row">
      <div class="large-8 columns">
         <input type="checkbox" id="register-mailing" name="mailing_list" value="1" {if isset($DATA.mailing_list) && $DATA.mailing_list == 1}checked="checked"{/if} /><label for="register-mailing">{$LANG.account.register_mailing}</label>
      </div>
   </div>
   <div class="row">
      <div class="large-8 columns text-right"><input type="submit" name="register" value="{$LANG.account.register}" class="button" /></div>
   </div>
</form>