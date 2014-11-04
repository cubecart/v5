<?php
if(!defined('CC_DS')) die('Access Denied');
$module	= new Module(__FILE__, $_GET['module'], 'admin/index.tpl', true, false);

$script_file = CC_ROOT_DIR.CC_DS.'includes'.CC_DS.'extra'.CC_DS.'clickmeter.html';

if($module->_settings['status']=='1') {
	if(empty(trim($module->_settings['js']))) {

		$conversion_id = $module->_settings['id'];
		$conversion_value = ($module->_settings['value']>0) ? sprintf("%0.2F", $module->_settings['value']) : '0.00';
		$conversion_commission = ($module->_settings['commission']>0) ? sprintf("%0.2F", $module->_settings['commission']) : '0.00';
		$conversion_parameter = empty($module->_settings['parameter']) ? 'empty' : $module->_settings['parameter'];
	
		$script_data = <<<END
<!--ClickMeter.com code for conversion -->
<script type='text/javascript'>
    var ClickMeter_conversion_id = '$conversion_id';
    var ClickMeter_conversion_value = '$conversion_value';
    var ClickMeter_conversion_commission = '$conversion_commission';
    var ClickMeter_conversion_parameter = '$conversion_parameter';
</script>
<script type='text/javascript' id='cmconvscript' src='//www.clickmeter.com/js/conversion.js'></script>
<noscript>
<img height='0' width='0' alt='' src='//www.clickmeter.com/conversion.aspx?id=$conversion_id&val=$conversion_value&param=$conversion_parameter&com=$conversion_commission' />
</noscript>
END;
	} else {
		$script_data = $module->_settings['js'];
	}

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