<?php
/**
 * CubeCart v5
 * ========================================
 * CubeCart is a registered trade mark of CubeCart Limited
 * Copyright CubeCart Limited 2014. All rights reserved.
 * UK Private Limited Company No. 5323904
 * ========================================
 * Web:   http://www.cubecart.com
 * Email:  sales@cubecart.com
 * License:  GPL-2.0 http://opensource.org/licenses/GPL-2.0
 */
 
require dirname(__FILE__).DIRECTORY_SEPARATOR.'ini.inc.php';
define('CC_IN_ADMIN', false);

global $config_default;

include CC_ROOT_DIR.CC_DS.'controllers'.CC_DS.'controller.index.inc.php';
	
$htmlout = $GLOBALS['smarty']->fetch('templates/'.$global_template_file);
$htmlout = ($GLOBALS['gui']->disableJS) ? preg_replace('~<\s*\bscript\b[^>]*>(.*?)<\s*\/\s*script\s*>~is', '', $htmlout) : $htmlout;

$googleAnalytics = isset($googleAnalytics) ? $googleAnalytics : '';
$htmlout = preg_replace('/(\<\/head\>)/i',$googleAnalytics.'$1', $htmlout);
die($htmlout);