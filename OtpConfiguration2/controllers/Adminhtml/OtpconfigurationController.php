<?php

class HitMyStyle_OtpConfiguration2_Adminhtml_OtpconfigurationController extends Mage_Adminhtml_Controller_Action
{
		protected function _initAction()
		{
				mage::log('initi',null,'grid.log');
				$this->loadLayout()->_setActiveMenu("otpconfiguration2/otpconfiguration")->_addBreadcrumb(Mage::helper("adminhtml")->__("Otpconfiguration  Manager"),Mage::helper("adminhtml")->__("Otpconfiguration Manager"));
				return $this;
		}
		public function indexAction() 
		{
			    $this->_title($this->__("OtpConfiguration2"));
			    $this->_title($this->__("Manager Otpconfiguration"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{			    
			    $this->_title($this->__("OtpConfiguration2"));
				$this->_title($this->__("Otpconfiguration"));
			    $this->_title($this->__("Edit Item"));
				
				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("otpconfiguration2/otpconfiguration")->load($id);
				if ($model->getId()) {
					Mage::register("otpconfiguration_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("otpconfiguration2/otpconfiguration");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Otpconfiguration Manager"), Mage::helper("adminhtml")->__("Otpconfiguration Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Otpconfiguration Description"), Mage::helper("adminhtml")->__("Otpconfiguration Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("otpconfiguration2/adminhtml_otpconfiguration_edit"))->_addLeft($this->getLayout()->createBlock("otpconfiguration2/adminhtml_otpconfiguration_edit_tabs"));
					$this->renderLayout();
				} 
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("otpconfiguration2")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

		$this->_title($this->__("OtpConfiguration2"));
		$this->_title($this->__("Otpconfiguration"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("otpconfiguration2/otpconfiguration")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("otpconfiguration_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("otpconfiguration2/otpconfiguration");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Otpconfiguration Manager"), Mage::helper("adminhtml")->__("Otpconfiguration Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Otpconfiguration Description"), Mage::helper("adminhtml")->__("Otpconfiguration Description"));


		$this->_addContent($this->getLayout()->createBlock("otpconfiguration2/adminhtml_otpconfiguration_edit"))->_addLeft($this->getLayout()->createBlock("otpconfiguration2/adminhtml_otpconfiguration_edit_tabs"));

		$this->renderLayout();

		}
		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();


				if ($post_data) {

					try {

						

						$model = Mage::getModel("otpconfiguration2/otpconfiguration")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Otpconfiguration was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setOtpconfigurationData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setOtpconfigurationData($this->getRequest()->getPost());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					return;
					}

				}
				$this->_redirect("*/*/");
		}



		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$model = Mage::getModel("otpconfiguration2/otpconfiguration");
						$model->setId($this->getRequest()->getParam("id"))->delete();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
						$this->_redirect("*/*/");
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					}
				}
				$this->_redirect("*/*/");
		}

		
		public function massRemoveAction()
		{
			try {
				$ids = $this->getRequest()->getPost('otp_ids', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("otpconfiguration2/otpconfiguration");
					  $model->setId($id)->delete();
				}
				Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
			}
			catch (Exception $e) {
				Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
			}
			$this->_redirect('*/*/');
		}
			
		/**
		 * Export order grid to CSV format
		 */
		public function exportCsvAction()
		{
			$fileName   = 'otpconfiguration.csv';
			$grid       = $this->getLayout()->createBlock('otpconfiguration2/adminhtml_otpconfiguration_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
		} 
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'otpconfiguration.xml';
			$grid       = $this->getLayout()->createBlock('otpconfiguration2/adminhtml_otpconfiguration_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}

		public function gridAction()
		{
		    $parentId = $this->getRequest()->getParam('parent_id');
		    $getModel = Mage::getModel('otpconfiguration2/otpconfiguration')->getCollection();
		    $getModel->addFieldToFilter('country_code',$parentId)->load()->getData();
		    if(count($getModel)>0){
		    	echo 'found';
		    }
		    else{
		    	echo 'not found';
		    }
		    /*$this->loadLayout();
		    $this->getResponse()->setBody(
		        $this->getLayout()->createBlock('otpconfiguration2/adminhtml_otpconfiguration_grid')->toHtml()
		    );*/
		}
}
