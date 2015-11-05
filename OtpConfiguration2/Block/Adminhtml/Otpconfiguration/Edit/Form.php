<?php
class HitMyStyle_OtpConfiguration2_Block_Adminhtml_Otpconfiguration_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{
				$form = new Varien_Data_Form(array(
				"id" => "edit_form",
				"action" => $this->getUrl("*/*/save", array("id" => $this->getRequest()->getParam("id"))),
				"method" => "post",
				"enctype" =>"multipart/form-data",
				)
				);
				$registry = Mage::registry("otpconfiguration_data");
				mage::log($registry,null,'reg.log');
				$registry->setData('user_id', 'hitesh');
				$form->setValues($registry->getData());
				$form->setUseContainer(true);
				$this->setForm($form);
				return parent::_prepareForm();
		}
}
