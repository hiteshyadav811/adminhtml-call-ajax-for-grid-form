<?php
class HitMyStyle_OtpConfiguration2_Model_Mysql4_Otpconfiguration extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("otpconfiguration2/otpconfiguration", "otp_id");
    }
}