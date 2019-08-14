<?php

/**
 * L'objet Conteneur de Parametres
 *
 * @author MKT
 */
class ConteneurParametres {
	
	private static $instance;
	
	private $IsPatternBoucler;
	private $idPatternBoucler;
	
	private $isPatternCibleBoucler;
	private $idPatternCibleBoucler;
	
	private $version;
	private $idVersion;
	
	private $rank;
	private $idRank;
	
	private $idInscription;
	private $inInscrition;
	/**
	 * Renvoi l'instance
	 */
	public static function getInstance () {
		if (!(self::$instance instanceof self)) {
			self::$instance = new self();
		}
	
		return self::$instance;
	}
	
	/**
	 * Constructeur
	 */
	private function ConteneurParametres() {
		$this->MKT_balise_mot_cle_on_off = true;
		$this->isPatternCibleBoucler = true;

		
		$rep=Mage::getModel('liveoptim/parametres')->getCollection();
		foreach ($rep as $ligneDB) {
			$lId = $ligneDB->id;
			$lCle = $ligneDB->cle;
			$lValeur = $ligneDB->valeur;
		
			switch ($lCle) {
									
				case 'version':
					$this->version = $lValeur;
					$this->idVersion = $lId;
					break;
				
				case 'inscription':
					$this->inscription = $lValeur;
					$this->idInscription = $lId;
					break;
			}
		}
	}
	
	
	
	
	public function setRank($rank) {
		$this->rank = $rank;

		Mage::getModel('liveoptim/parametres')->load(intval( $this->idRank ))
										  ->setValeur(( ($rank == true)? '1' : '0' ))
										  ->save();
	}

	public function setInscription($inscrip){
		$this->inscription = $inscrip;
		
		Mage::getModel('liveoptim/parametres')->load(intval( $this->idInscription ))
										  ->setValeur(( ($inscrip == true)? '1' : '0' ))
										  ->save();
	}
	
	
	public function getVersion(){
		return $this->version;
	}
	
	public function getRank(){
		return $this->rank;
	}
	
	public function getInscription(){
		return $this->inscription;
	}
	
}
