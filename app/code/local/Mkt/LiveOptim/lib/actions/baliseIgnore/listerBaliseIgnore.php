<?php
/*
 * Fichier listerBaliseIgnoreAction.class.php
 */
if(!Mage::helper('liveoptim')->liveoptim_isInscrit()){
	$this->_redirect('*/*/inscription');
}else{
$this->lang();
$this->loadLayout();
$this->getLayout()->getBlock('head')->setTitle('LiveOptim  - '.$this->__('listerBaliseIgnore_titre'));
$this->getLayout()->getBlock('balise')->assign('idModifier', $this->_request->getParam('idModifier'));
$this->renderLayout();
}
