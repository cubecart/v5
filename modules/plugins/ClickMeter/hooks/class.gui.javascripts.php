<?php
$inline_js = CC_ROOT_DIR.CC_DS.'includes'.CC_DS.'extra'.CC_DS.'clickmeter.html';
if($_GET['_a']=='complete' && file_exists($inline_js)) {
	$js_code = file_get_contents($inline_js);
	define('CLICK_METER_JS', $js_code);
	// register the prefilter with inline function
	$GLOBALS['smarty']->registerFilter('output',create_function('$tpl_output, &$smarty', 'return preg_replace(
			"/(\<\/body\>)/i",
			CLICK_METER_JS."$1",
			$tpl_output
		);'));
}
?>