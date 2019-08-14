<?php

class Mkt_LiveOptim_Block_Adminhtml_MotCle extends Mage_Core_Block_Template
{
	function __construct(){
		
		$this->setTemplate('liveoptim/listerMotCle.php');	
		require_once(dirname(__FILE__).'/../../lib/base/conteneurMotCle.class.php');
		/*require_once(dirname(__FILE__).'/../../lib/lib/generiqueAction.php');*/
		//echo "id motcle ".$_GET['idModifier'];
		//$pIdModifier = $this->_request->getParam('idModifier');
		$idModifier = ( isset( $pIdModifier ) && !is_null( $pIdModifier ) && strlen( $pIdModifier ) > 0 && intval( $pIdModifier ) )? $pIdModifier : null;
		
		$this->assign('idModifier',$idModifier);
		
		$lMotCles=ConteneurMotCle::getInstance()->getAll();
		//echo "liste mot cle:";print_r($lMotCles);
		$this->assign('lMotCles',$lMotCles);
		
		
		
	}
}
?>
