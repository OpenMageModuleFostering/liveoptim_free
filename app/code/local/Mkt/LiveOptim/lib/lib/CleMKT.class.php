<?php

/**
 * Class CleMKT
 * 
 * @author MKT
 *
 */
class CleMKT {

	const NB_TENTATIVES_MAX_PAR_HEURE = 500;
	
	private $nom = null;
	private $ip = null;
	/**
	 * Constructeur
	 *
	 * @param String $nom
	 */
	public function CleMKT() {
		$this->nom = $_SERVER['SERVER_NAME'];
		$this->ip = $_SERVER['SERVER_ADDR'];
	}
	
	
	public function isOnOff(){
		
		
		$capping =Mage::getModel('liveoptim/capping')->getCollection();
		
		$rep = $capping->getFirstItem();
		$rep=$rep['marche'];
		
		if($rep==0){return false;}else{return true;}
	}
	
	public function getCapping(){
		
		$rep =Mage::getModel('liveoptim/capping')->getCollection()->getFirstItem();
		$rep=$rep['capping'];
		return $rep;
	}
	
	
	
}