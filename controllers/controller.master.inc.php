<?php
if(!isset($glob['encoder']) || $glob['encoder']=='ioncube') {
	switch(CC_PHP_ID) {
		case 54:
			require_once CC_ROOT_DIR.CC_DS.'controllers'.CC_DS.'ioncube'.CC_DS.'5.4.php';
		break;
		case 53:
			require_once CC_ROOT_DIR.CC_DS.'controllers'.CC_DS.'ioncube'.CC_DS.'5.3.php';
		break;
		case 52:
			require_once CC_ROOT_DIR.CC_DS.'controllers'.CC_DS.'ioncube'.CC_DS.'5.2.php';
	}
} elseif(isset($glob['encoder'])) {
	switch($glob['encoder']) {
		case 'obfuscated': // Load Obfuscated file
			require_once CC_ROOT_DIR.CC_DS.'CubeCart_obfuscated.php';
		break;
		default:
		case 'plain': // For internal development only
			require_once CC_ROOT_DIR.CC_DS.'CubeCart_plain.php';
	}	
}