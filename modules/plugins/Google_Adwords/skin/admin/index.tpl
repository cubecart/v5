<form action="{$VAL_SELF}" method="post" enctype="multipart/form-data">
  <div id="Google_Adwords" class="tab_content">
	<h3>{$TITLE}</h3>
  <fieldset>
	  <legend>{$LANG.module.config_settings}</legend>
	  <div><label for="status">{$LANG.common.status}</label><span><input type="hidden" name="module[status]" id="status" class="toggle" value="{$MODULE.status}" /></span></div>
	  <div><label for="conversion">{$LANG.google_adwords.conversion}</label><span><input type="hidden" name="module[conversion]" id="conversion" class="toggle" value="{$MODULE.conversion}" /></span></div>
	  <div><label for="remarketing">{$LANG.google_adwords.remarketing}</label><span><input type="hidden" name="module[remarketing]" id="remarketing" class="toggle" value="{$MODULE.remarketing}" /></span></div>
	<div><label for="id">{$LANG.google_adwords.id}</label><span><input type="text" name="module[id]" id="id" value="{$MODULE.id}" class="textbox required" /></span></div>
	<div><label for="label">{$LANG.google_adwords.label}</label><span><input type="text" name="module[label]" id="label" value="{$MODULE.label}" class="textbox" /></span></div>
  </fieldset>
  </div>
  <div class="form_control">
	<input type="submit" value="{$LANG.common.save}" />
  </div>
  <input type="hidden" name="token" value="{$SESSION_TOKEN}" />
</form>