<?php
class Mkt_LiveOptim_Block_LiveOptim extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getLiveOptim()     
     { 
        if (!$this->hasData('liveoptim')) {
            $this->setData('liveoptim', Mage::registry('liveoptim'));
        }
        return $this->getData('liveoptim');
        
    }
}