<?php
if(!Mage::helper('liveoptim')->liveoptim_isInscrit()){
	$this->_redirect('*/*/inscription');
}else{
$this->lang();
$this->loadLayout();
//print_r($this->_request);
//echo "id motcle CONTROLLER".$this->_request->getParam('idModifier');
$this->getLayout()->getBlock('head')->setTitle('LiveOptim  - '.$this->__('listerMotCle_titre'));
$this->getLayout()->getBlock('motcle')->assign('idModifier', $this->_request->getParam('idModifier'));
$this->renderLayout();
}
?>
