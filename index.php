<?php
require dirname(__FILE__).DIRECTORY_SEPARATOR.'ini.inc.php';
define('CC_IN_ADMIN', false);

header('X-Frame-Options: SAME-ORIGIN'); // do not allow iframes

global $config_default;

include 'controllers'.CC_DS.'controller.master.inc.php';