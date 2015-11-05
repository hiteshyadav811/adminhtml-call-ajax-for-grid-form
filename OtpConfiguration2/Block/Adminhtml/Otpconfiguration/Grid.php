<?php

class HitMyStyle_OtpConfiguration2_Block_Adminhtml_Otpconfiguration_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("otpconfigurationGrid");
				$this->setDefaultSort("otp_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
				//$this->setUseAjax(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("otpconfiguration2/otpconfiguration")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("otp_id", array(
				"header" => Mage::helper("otpconfiguration2")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "otp_id",
				));
                
				$this->addColumn("country_code", array(
				"header" => Mage::helper("otpconfiguration2")->__("Country Code"),
				"index" => "country_code",
				));
				$this->addColumn("otp_code", array(
				"header" => Mage::helper("otpconfiguration2")->__("Otp Code"),
				"index" => "otp_code",
				));
				$this->addColumn("created_time", array(
				"header" => Mage::helper("otpconfiguration2")->__("Created Time"),
				"index" => "created_time",
				));
				$this->addColumn("updated_time", array(
				"header" => Mage::helper("otpconfiguration2")->__("Updated Time"),
				"index" => "updated_time",
				));
				$this->addColumn("user_id", array(
				"header" => Mage::helper("otpconfiguration2")->__("User Name"),
				"index" => "user_id",
				'renderer'  => 'HitMyStyle_OtpConfiguration2_Block_Adminhtml_Otpconfiguration_Renderer_Customer',
				));
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('otp_id');
			$this->getMassactionBlock()->setFormFieldName('otp_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_otpconfiguration', array(
					 'label'=> Mage::helper('otpconfiguration2')->__('Remove Otpconfiguration'),
					 'url'  => $this->getUrl('*/adminhtml_otpconfiguration/massRemove'),
					 'confirm' => Mage::helper('otpconfiguration2')->__('Are you sure?')
				));
			return $this;
		}
			
		/*public function getGridUrl(){
		    return $this->getUrl('*//*//*grid', array('_current'=>true));
		}*/

}