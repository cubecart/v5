<?php
if($GLOBALS['session']->get('customer_id', 'PayPal_Pro')>0) {
	$GLOBALS['smarty']->assign('IS_USER',true);
	
	$customer_id = $GLOBALS['session']->get('customer_id', 'PayPal_Pro');

	$customer = $GLOBALS['db']->select('CubeCart_customer', array('first_name'), array('customer_id' => $customer_id));
	$GLOBALS['smarty']->assign('LANG_WELCOME_BACK', sprintf($GLOBALS['language']->account['welcome_back'], $customer[0]['first_name'], ''));
}