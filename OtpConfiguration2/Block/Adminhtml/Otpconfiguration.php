<?php


class HitMyStyle_OtpConfiguration2_Block_Adminhtml_Otpconfiguration extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_otpconfiguration";
	$this->_blockGroup = "otpconfiguration2";
	$this->_headerText = Mage::helper("otpconfiguration2")->__("Otpconfiguration Manager");
	$this->_addButtonLabel = Mage::helper("otpconfiguration2")->__("Add New Item");
	parent::__construct();
	
	}

}