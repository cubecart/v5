<form action="{$VAL_SELF}" method="post" enctype="multipart/form-data">
  <div id="ClickMeter" class="tab_content">
	<h3>{$TITLE}</h3>
	<fieldset>
	  <legend>{$LANG.module.config_settings}</legend>
	  <div><label for="status">{$LANG.common.status}</label><span><input type="hidden" name="module[status]" id="status" class="toggle" value="{$MODULE.status}" /></span></div>
  </fieldset>
<p>{$LANG.clickmeter.desc}</p>
  <fieldset>
	  <legend>{$LANG.clickmeter.opt1}</legend>
	<div><label for="id">{$LANG.clickmeter.id}</label><span><input type="text" name="module[id]" id="id" value="{$MODULE.id}" class="textbox required" /></span></div>
	<div><label for="value">{$LANG.clickmeter.value}</label><span><input type="text" name="module[value]" id="value" value="{$MODULE.value}" class="textbox" /></span></div>
	<div><label for="commission">{$LANG.clickmeter.commission}</label><span><input type="text" name="module[commission]" id="commission" value="{$MODULE.commission}" class="textbox" /></span></div>
	<div><label for="parameter">{$LANG.clickmeter.parameter}</label><span><input type="text" name="module[parameter]" id="parameter" value="{$MODULE.parameter}" class="textbox" /></span></div>
  </fieldset>
  <fieldset>
	  <legend>{$LANG.clickmeter.opt2}</legend>
	<div><label for="content_html">{$LANG.clickmeter.js}</label><span><textarea name="module[content_html]" id="content_html" class="textbox">{$MODULE.content_html|escape:'html'}</textarea></span></div>
  </fieldset>
  </div>
  <div class="form_control">
	<input type="submit" value="{$LANG.common.save}" />
  </div>
  <input type="hidden" name="token" value="{$SESSION_TOKEN}" />
</form>