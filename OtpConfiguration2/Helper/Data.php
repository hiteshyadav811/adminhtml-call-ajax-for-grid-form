<?php
class HitMyStyle_OtpConfiguration2_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function getCustomerName(){
		/*$id = Mage::app()->getRequest()->getParam();
		mage::log($id,null,'null.log');
		return 'getCustomerName';*/
		$customer = Mage::getModel('customer/customer')->load(101);
 		return $customer->getName();
	}
}
	 