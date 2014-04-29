<?php
/*
+--------------------------------------------------------------------------
|   CubeCart 4
|   ========================================
|	CubeCart is a registered trade mark of Devellion Limited
|   Copyright Devellion Limited 2006. All rights reserved.
|   Devellion Limited,
|   5 Bridge Street,
|   Bishops Stortford,
|   HERTFORDSHIRE.
|   CM23 2JU
|   UNITED KINGDOM
|   http://www.devellion.com
|	UK Private Limited Company No. 5323904
|   ========================================
|   Web: http://www.cubecart.com
|   Email: info (at) cubecart (dot) com
|	License Type: CubeCart is NOT Open Source Software and Limitations Apply 
|   Licence Info: http://www.cubecart.com/site/faq/license.php
+--------------------------------------------------------------------------
|	process.inc.php
|   ========================================
|	Process AlliedWallet Payment	
+--------------------------------------------------------------------------
*/
// read the post from PayPal system and add 'cmd'

# initialise the CURL library
$customer = $db->select("SELECT `customer_id` FROM ".$glob['dbprefix']."CubeCart_customer WHERE `email` = ".$db->MySQLSafe($_REQUEST['email'])." ");

if ($customer) {
	$transData['customer_id'] = $customer[0]["customer_id"];
	$transData['gateway'] = "AlliedWallet";
	$transData['trans_id'] = $_REQUEST['TransactionID'];
	$transData['order_id'] = $_REQUEST['MerchantReference'];
	$transData['amount'] = $_REQUEST['Amount'];
	
	if ($_REQUEST['PayReferenceID']) {
		$transData['status'] = "Success";
		$paymentResult = 2;
		$order->orderStatus(3,$_REQUEST['MerchantReference']);
		$transData['notes'] = "Payment was successful.";
	} else {
		$transData['status'] = "Fail";
		$paymentResult = 3;
		$order->orderStatus(2,$_REQUEST['MerchantReference']);
		$transData['notes'] = "Payment unsuccessful. More information may be available in the AlliedWallet control panel.";
	}
	$order->storeTrans($transData);
} else {
	die("<strong>Fatal Error:</strong> Customer not found from email address.");
}
?>