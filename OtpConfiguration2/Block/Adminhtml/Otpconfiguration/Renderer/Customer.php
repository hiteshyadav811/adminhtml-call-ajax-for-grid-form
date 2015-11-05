<?php
class HitMyStyle_OtpConfiguration2_Block_Adminhtml_Otpconfiguration_Renderer_Customer extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
 
public function render(Varien_Object $row)
{
mage::log($row->getUserId(),null,'row.log');
		/*$value =  $row->getData($this->getColumn()->getIndex());
		return '<span style="color:red;">'.$value.'</span>';*/
		$customer = Mage::getModel('customer/customer')->load($row->getUserId());
 		return $customer->getName();
}
 
}
?>