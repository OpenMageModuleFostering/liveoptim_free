<?php
class Mkt_LiveOptim_Block_Adminhtml_Config extends Mage_Core_Block_Template
{
	function __construct(){
		require_once dirname(__FILE__).'/../../lib/lib/CleMKT.class.php';
		$cleMKT = new CleMKT();

		/*$this->assign('isON', $cleMKT->isOnOff());
		if($cleMKT->isOnOff()){$this->assign('capping',$cleMKT->getCapping());}*/
		
	}
}
?>