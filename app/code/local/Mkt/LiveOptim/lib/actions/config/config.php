<?

if(!Mage::helper('liveoptim')->liveoptim_isInscrit()){
	$this->_redirect('*/*/inscription');
}else{
$this->lang();

$this->loadLayout();

$this->getLayout()->getBlock('head')->setTitle('LiveOptim  - '.$this->__('menu_config'));

require_once dirname(__FILE__).'/../../lib/CleMKT.class.php';
$cleMKT = new CleMKT();
		
		
$this->getLayout()->getBlock('config')->assign('isON', $cleMKT->isOnOff());
if($cleMKT->isOnOff()){$this->getLayout()->getBlock('config')->assign('capping',$cleMKT->getCapping());}
$this->getLayout()->getBlock('config')->assign('zip', $this->_request->getParam('zip'));
$this->getLayout()->getBlock('config')->assign('res', str_replace('|','/',$this->_request->getParam('res')));

$this->renderLayout();
}