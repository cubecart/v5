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
|	transfer.inc.php
|   ========================================
|	Core functions for the AlliedWallet Gateway	
+--------------------------------------------------------------------------
*/

function repeatVars() {
	return false;
}

function fixedVars() {
	global $module, $orderSum, $config;
	
	$hiddenVars = "<input type='hidden' name='MerchantID' value='".$module['MerchantID']."' />
	<input type='hidden' name='siteID' value='".$module['siteID']."' />
	<input type='hidden' name='MerchantReference' value='".$orderSum['cart_order_id']."' />
	<input type='hidden' name='AmountTotal' value='".$orderSum['prod_total']."' />
	<input type='hidden' name='CurrencyID' value='".$config['defaultCurrency']."' />
	<input type='hidden' name='ItemName[0]' value='Payment for order #".$orderSum['cart_order_id']."' />
	<input type='hidden' name='ItemQuantity[0]' value='1' />
	<input type='hidden' name='ItemAmount[0]' value='".$orderSum['prod_total']."' />
	<input type='hidden' name='ItemDesc[0]' value='' />
	<input type='hidden' name='ReturnURL' value='".$GLOBALS['storeURL']."/index.php?_g=co&amp;_a=confirmed&amp;s=3' />
	<input type='hidden' name='ConfirmURL' value='".$GLOBALS['storeURL']."/index.php?_g=rm&amp;type=gateway&amp;cmd=call&amp;email=".urlencode($orderSum['email'])."&amp;module=Allied_Wallet' />
	<input type='hidden' name='AmountShipping' value='0.00' />";
	return $hiddenVars;
}

///////////////////////////
// Other Vars
///////////////////////////

$formAction = "https://sale.alliedwallet.com/index.aspx";
$formMethod = "post";
$formTarget = "_self";
$transfer = "auto";
?>