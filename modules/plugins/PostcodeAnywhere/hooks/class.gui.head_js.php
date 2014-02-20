<?php
$capture_key =  $GLOBALS['config']->get('PostcodeAnywhere','capture_key');
$head_js[] = '<link rel="stylesheet" type="text/css" href="http://services.postcodeanywhere.co.uk/css/captureplus-2.10.min.css?key='.$capture_key.'" /><script type="text/javascript" src="http://services.postcodeanywhere.co.uk/js/captureplus-2.10.min.js?key='.$capture_key.'"></script>';
$GLOBALS['smarty']->assign('ADDRESS_LOOKUP', true);