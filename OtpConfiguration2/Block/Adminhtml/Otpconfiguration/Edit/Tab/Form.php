<?php
class HitMyStyle_OtpConfiguration2_Block_Adminhtml_Otpconfiguration_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("otpconfiguration2_form", array("legend"=>Mage::helper("otpconfiguration2")->__("Item information")));

				
						$fieldset->addField("otp_id", "text", array(
						"label" => Mage::helper("otpconfiguration2")->__("Id"),
						"name" => "otp_id",
						));
					
						$event = $fieldset->addField("country_code", "text", array(
						"label" => Mage::helper("otpconfiguration2")->__("Country Code"),
						"name" => "country_code",
						'onchange'  => 'checkSelectedItem(this)',
						));
					
						$fieldset->addField("otp_code", "text", array(
						"label" => Mage::helper("otpconfiguration2")->__("Otp Code"),
						"name" => "otp_code",
						));
					
						$fieldset->addField("created_time", "text", array(
						"label" => Mage::helper("otpconfiguration2")->__("Created Time"),
						"name" => "created_time",
						));
						
						$fieldset->addField("updated_time", "text", array(
						"label" => Mage::helper("otpconfiguration2")->__("Updated Time"),
						"name" => "updated_time",
						));
					
						$fieldset->addField("user_id", "text", array(
						"label" => Mage::helper("otpconfiguration2")->__("User Name"),
						"name" => "user_id",
						"values" => 'testing',
						));
					$event->setAfterElementHtml("<script type=\"text/javascript\">
				    function checkSelectedItem(selectElement){
				        var reloadurl = '". Mage::helper("adminhtml")->getUrl("admin_otpconfiguration2/adminhtml_otpconfiguration/grid")."?parent_id=' + selectElement.value;
				        new Ajax.Request(reloadurl, {
				            method: 'post',
				            onLoading: function (transport) {
				                $('parent_id').update('Searching...');
				            },
				            onComplete: function(transport) {
				                    $('parent_id').update('Searching...');
				            }
				        });
				    }
				</script>");

				if (Mage::getSingleton("adminhtml/session")->getOtpconfigurationData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getOtpconfigurationData());
					Mage::getSingleton("adminhtml/session")->setOtpconfigurationData(null);
				} 
				elseif(Mage::registry("otpconfiguration_data")) {
				    $form->setValues(Mage::registry("otpconfiguration_data")->getData());
				}
				mage::log(Mage::helper("adminhtml")->getUrl("hitmystyle_otpconfiguration2/otpconfiguration/grid"),null,'log.log');
				return parent::_prepareForm();
		}
}