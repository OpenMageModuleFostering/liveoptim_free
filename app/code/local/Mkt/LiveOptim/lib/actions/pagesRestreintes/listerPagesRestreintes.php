<?php

if(!Mage::helper('liveoptim')->liveoptim_isInscrit()){
	$this->_redirect('*/*/inscription');
}else{
$this->lang();
$this->loadLayout();
$this->getLayout()->getBlock('head')->setTitle('LiveOptim  - '.$this->__('menu_pages_restreintes'));
$this->renderLayout();
}