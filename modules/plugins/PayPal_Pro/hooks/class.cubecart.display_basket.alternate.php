<?php
/*
$Date: 2010-06-08 17:11:38 +0100 (Tue, 08 Jun 2010) $
$Rev: 1169 $
*/

if ($module_config = $GLOBALS['config']->get('PayPal_Pro')) {
	
	$scope = (isset($module_config['scope']) && !empty($module_config['scope']) && ($module_config['scope']=='main' && $GLOBALS['gui']->mobile) || ($module_config['scope']=='mobile' && !$GLOBALS['gui']->mobile)) ? false : true;

	if ($module_config['status'] && $scope) {
		if ($GLOBALS['session']->get('stage', 'PayPal_Pro')=='DoExpressCheckoutPayment') {
			$load_checkouts = false;
			if ($_GET['_a']=='confirm' && (isset($this->_basket['shipping']) || isset($this->_basket['digital_only']))) {
				$GLOBALS['smarty']->assign('CHECKOUT_BUTTON', $GLOBALS['language']->gateway['make_payment']);
			} else {
				$GLOBALS['smarty']->assign('DISABLE_CHECKOUT_BUTTON', true);
			}
		} else {
			if (preg_match('#^([a-z]+)-([A-Z]+)#', $GLOBALS['language']->current(), $match)) {
				switch (strtoupper($match[2])) {
					case 'AU':
					case 'DE':
					case 'ES':
					case 'FR':
					case 'GB':
					case 'IT':
					case 'JP':
					case 'NL':
					case 'PL':
						$locale = str_replace('-', '_', $GLOBALS['language']->current());
						break;
					default:
						$locale = 'en_US';
				}
			} else {
				$locale	= 'en_US';
			}
			## Generate the PayPal Pro button
			$button_image = $GLOBALS['storeURL'].'/modules/plugins/PayPal_Pro/images/PP_Buttons_CheckOut_146x30_v3.png';
			
			
			$button = '<script>
    (function(d, s, id){
      var js, ref = d.getElementsByTagName(s)[0];
      if (!d.getElementById(id)){
        js = d.createElement(s); js.id = id; js.async = true;
        js.src = "//www.paypalobjects.com/js/external/paypal.js";
        ref.parentNode.insertBefore(js, ref);
      }
    }(document, "script", "paypal-js"));
  </script>';
			$button .= '<form action="doPayment” method="POST">';
			
			$wpp	= new Website_Payments_Pro($GLOBALS['config']->get('PayPal_Pro'));
			$button_link = $wpp->SetExpressCheckout(false, true);
			
			$button	.= '<a href="'.$button_link.'" target="_self" title="" data-paypal-button="true" data-merchant-id="" /><img src="'.$button_image.'" alt="" /></a>';
			
			if($module_config['billmelater']==1) {
				$button	= $button.'<br />
				<a href="'.$GLOBALS['storeURL'].'/index.php?_a=gateway&amp;module=PayPal_Pro&amp;bml=1" target="_self" title="" /><img src="https://www.paypalobjects.com/webstatic/en_US/btn/btn_bml_SM.png" alt="" /></a><div align="right"><a href="https://www.securecheckout.billmelater.com/paycapture-content/fetch?hash=AU826TU8&content=/bmlweb/ppwpsiw.html" class="colorbox_iframe"><img src="https://www.paypalobjects.com/webstatic/en_US/btn/btn_bml_text.png" /></a></div>';	
				
			}
			$button .="</form>";
			if(is_numeric($module_config['position']) && !isset($list_checkouts[$module_config['position']])) {
				$position = $module_config['position'];
			} else {
				$position = '';
			}
			
			$list_checkouts[$position]	= (isset($basket['PayPal_Pro'])) ? null : $button;
			$GLOBALS['session']->set('stage', 'SetExpressCheckout', 'PayPal_Pro');
		}
 	}
}