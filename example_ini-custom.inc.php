<?php

// Example ini-custom.inc.php file.
// Rename this if needed to add in configuration settings other
// than what's in the stock ini.inc.php file.

// For servers that are setup stupidly  :)
//ini_set('register_globals','Off');

// Uncomment the following to make sure we know what's going wrong.
//ini_set('error_log','error_log');
//ini_set('log_errors','On');

// Options to make sure large imports or image processes don't timeout
//ini_set('max_execution_time', '180'); # three minutes
//ini_set('memory_limit','512M'); # should be plenty

// Feel free to add in any other settings/values necessary to make your store work properly.
// The advantage is that this file will not be overwritten during an upgrade.
// This makes sure any tweaks applied be lost when you update the store software.
