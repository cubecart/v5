<?php
if(!defined('CC_DS')) die('This file can not be accessed directly.');

if(CC_IN_ADMIN) {
	
	include CC_ROOT_DIR.CC_DS.'controllers'.CC_DS.'controller.admin.pre_session.inc.php';	
	
	$feed_access_key = $GLOBALS['config']->get('config','feed_access_key');
	$feed_access_key = (!$feed_access_key) ? '' : $feed_access_key;
	
	if (Admin::getInstance()->is() || ($_GET['_g']=='products' && $_GET['node']=='export' && !empty($_GET['format']) && $_GET['access']==$feed_access_key && !empty($feed_access_key))) {
		include CC_ROOT_DIR.CC_DS.'controllers'.CC_DS.'controller.admin.session.true.inc.php';
	} else {
		include CC_ROOT_DIR.CC_DS.'controllers'.CC_DS.'controller.admin.session.false.inc.php';
		$GLOBALS['smarty']->display('templates/'.$global_template_file['session_false']);
		exit;
	}
	// Render the completed page
	if (!isset($suppress_output) || !$suppress_output) {
		$GLOBALS['gui']->displayCommon(true);
		$GLOBALS['smarty']->display('templates/'.$global_template_file['session_true']);
	}

} else {

	include CC_ROOT_DIR.CC_DS.'controllers'.CC_DS.'controller.index.inc.php';
	
	$htmlout = $GLOBALS['smarty']->fetch('templates/'.$global_template_file);
	$htmlout = ($GLOBALS['gui']->disableJS) ? preg_replace('~<\s*\bscript\b[^>]*>(.*?)<\s*\/\s*script\s*>~is', '', $htmlout) : $htmlout;
	
	$googleAnalytics = isset($googleAnalytics) ? $googleAnalytics : '';
	$htmlout = preg_replace('/(\<\/head\>)/i',$googleAnalytics.'$1', $htmlout);
	die($htmlout);
}