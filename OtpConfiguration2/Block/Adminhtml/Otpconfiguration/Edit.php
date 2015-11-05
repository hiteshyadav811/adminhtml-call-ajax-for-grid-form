<?php
	
class HitMyStyle_OtpConfiguration2_Block_Adminhtml_Otpconfiguration_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "otp_id";
				$this->_blockGroup = "otpconfiguration2";
				$this->_controller = "adminhtml_otpconfiguration";
				$this->_updateButton("save", "label", Mage::helper("otpconfiguration2")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("otpconfiguration2")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("otpconfiguration2")->__("Save And Continue Edit"),
					"onclick"   => "saveAndContinueEdit()",
					"class"     => "save",
				), -100);



				$this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
		}

		public function getHeaderText()
		{
				if( Mage::registry("otpconfiguration_data") && Mage::registry("otpconfiguration_data")->getId() ){

				    return Mage::helper("otpconfiguration2")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("otpconfiguration_data")->getId()));

				} 
				else{

				     return Mage::helper("otpconfiguration2")->__("Add Item");

				}
		}
}