<?php

class Mkt_LiveOptim_Model_Mysql4_Parametres_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('liveoptim/parametres');
    }
}