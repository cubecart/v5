<?php
$inline_js = CC_ROOT_DIR.CC_DS.'includes'.CC_DS.'extra'.CC_DS.'google_conversion.html';
if($_GET['_a']=='complete' && file_exists($inline_js)) {
	$js_code = file_get_contents($inline_js);
	define('GA_CONVERSION_JS', $js_code);
	// register the prefilter with inline function
	$GLOBALS['smarty']->registerFilter('output',create_function('$tpl_output, &$smarty', 'return preg_replace(
			"/(\<\/body\>)/i",
			GA_CONVERSION_JS."$1",
			$tpl_output
		);'));
}
$inline_js = CC_ROOT_DIR.CC_DS.'includes'.CC_DS.'extra'.CC_DS.'google_remarketing.html';
if(file_exists($inline_js)) {
	$js_code = file_get_contents($inline_js);
	define('GA_REMARKET_JS', $js_code);
	// register the prefilter with inline function
	$GLOBALS['smarty']->registerFilter('output',create_function('$tpl_output, &$smarty', 'return preg_replace(
			"/(\<\/body\>)/i",
			GA_REMARKET_JS."$1",
			$tpl_output
		);'));
}
?>