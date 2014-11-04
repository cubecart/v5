<?php
if(!defined('CC_DS')) die('Access Denied');
$module	= new Module(__FILE__, $_GET['module'], 'admin/index.tpl', true, false);

$script_file = CC_ROOT_DIR.CC_DS.'includes'.CC_DS.'extra'.CC_DS.'google_conversion.html';

if($module->_settings['conversion']=='1') {
		$conversion_id = $module->_settings['id'];
		$conversion_label = $module->_settings['label'];
	
		$script_data = <<<END
<!-- Google Code for Conversion Code Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = $conversion_id;
var google_conversion_language = "en";
var google_conversion_format = "2";
var google_conversion_color = "ffffff";
var google_conversion_label = "$conversion_label";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/$conversion_id/?label=$conversion_label&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

END;

	$fp = fopen($script_file, 'w');
	fwrite($fp, $script_data);
	fclose($fp);
} elseif(file_exists($script_file)) {
	unlink($script_file);
}

$script_file = CC_ROOT_DIR.CC_DS.'includes'.CC_DS.'extra'.CC_DS.'google_remarketing.html';

if($module->_settings['remarketing']=='1') {
		$conversion_id = $module->_settings['id'];
	
		$script_data = <<<END
<!-- Google Code for Remarketing Tag -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = $conversion_id;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/$conversion_id/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
END;

	$fp = fopen($script_file, 'w');
	fwrite($fp, $script_data);
	fclose($fp);
} elseif(file_exists($script_file)) {
	unlink($script_file);
}
$template_vars = array();
$module->assign_to_template($template_vars);
$module->fetch();
$page_content = $module->display();