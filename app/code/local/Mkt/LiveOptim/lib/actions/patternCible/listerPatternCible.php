<?php
/*
 * Fichier listerPatternCibleAction.class.php
 */
if(!Mage::helper('liveoptim')->liveoptim_isInscrit()){
	$this->_redirect('*/*/inscription');
}else{
$this->lang();
$this->loadLayout();
$this->getLayout()->getBlock('head')->setTitle('LiveOptim  - '.$this->__('listerPatternCible_titre'));
$this->getLayout()->getBlock('cible')->assign('idModifier', $this->_request->getParam('idModifier'));
$this->renderLayout();
}