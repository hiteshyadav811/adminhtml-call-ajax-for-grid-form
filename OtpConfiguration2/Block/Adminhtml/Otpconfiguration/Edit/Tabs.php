<?php
class HitMyStyle_OtpConfiguration2_Block_Adminhtml_Otpconfiguration_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("otpconfiguration_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("otpconfiguration2")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("otpconfiguration2")->__("Item Information"),
				"title" => Mage::helper("otpconfiguration2")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("otpconfiguration2/adminhtml_otpconfiguration_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
