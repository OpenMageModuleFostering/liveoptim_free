<?php

class Mkt_LiveOptim_Model_Mysql4_Capping extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the liveoptim_id refers to the key field in your database table.
        $this->_init('liveoptim/capping', 'id');
    }
}