<?php

class Mkt_LiveOptim_Block_Adminhtml_Pattern extends Mage_Core_Block_Template
{
	function __construct(){
		
		//$this->setTemplate('liveoptim/listerMotCle.php');	
		require_once(dirname(__FILE__).'/../../lib/base/conteneurPattern.class.php');
		require_once(dirname(__FILE__).'/../../lib/lib/liber.php');	
		require_once(dirname(__FILE__).'/../../lib/lib/generiqueAction.php');		
		
		$listePattern=ConteneurMotCle::getInstance()->getAll();
		//echo "liste mot cle:";print_r($lMotCles);
		$this->assign('listePattern',$listePattern);
		
		
		
	}
	
	function colorisation($chaine)
	{
	
	$chaine=str_replace("{mc}","<span class=/"mc/">{mc}</span>",$chaine);
	$chaine=str_replace("{url}","<span class=/"url/">{url}</span>",$chaine);	
	return $chaine;
	}
}
?>