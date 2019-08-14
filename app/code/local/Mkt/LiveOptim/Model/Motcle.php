<?php

class Mkt_LiveOptim_Model_MotCle extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('liveoptim/motcle');
    }
	
}