<?php

/**
 * L'objet Conteuneur Mot Clé
 *
 * @author Erwan Milbéo
 */
class ConteneurMotCle {
	
	private static $instance;
		
	private $conteneur;
	
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
	private function ConteneurMotCle() {
		$this->conteneur = array();
		
		
		
		$rep= Mage::getModel('liveoptim/motcle');
		//print_r($rep);
		$rep=$rep->getCollection()->setPageSize(10)->setCurPage(1);
		//echo "collection : <br />";
		//print_r($rep);
		$i=0;
		foreach ($rep as $ligneDB) {
			if($i>9)break;
			$lId = $ligneDB->id;
			$lRequete = $ligneDB->requete;
			$lDestination = $ligneDB->destination;
			$lPosition = $ligneDB->position;
		
			$ligne = array( 'id' => $lId, 'requete' => $lRequete, 'destination' => $lDestination, 'position' => $lPosition );
		
			$this->conteneur[$lId] = $ligne;
			$i++;
		}
	}
	
	/**
	 * getAllBrut
	 * @return array
	 */
	public function getAllBrut() {
		return $this->conteneur;
	}
		
	/**
	 * getAll
	 * @param boolean $isTriByLengthRequete
	 * @return array
	 */
	public function getAll($isTriByLengthRequete = false) {

		if ( count($this->conteneur) > 0 ) {
			$i=0;
			if ($isTriByLengthRequete == true ) {
				
				// on tri par la longeur de requete, puis par requete et enfin par position
				foreach ($this->conteneur as $key => $row) {
					if($i>9)break;
					$tailleRequete[$key]  = strlen( $row['requete'] );
					$requete[$key]  = $row['requete'];
					$position[$key] = $row['position'];
					$i++;
				}
				
				array_multisort($tailleRequete, SORT_DESC, $requete, SORT_ASC, $position, SORT_ASC, $this->conteneur);
				
			} else {
				
				// on tri par requete puis par position
				foreach ($this->conteneur as $key => $row) {
					if($i>9)break;
					$requete[$key]  = $row['requete'];
					$position[$key] = $row['position'];
					$i++;
				}
				
				array_multisort($requete, SORT_ASC, $position, SORT_ASC, $this->conteneur);
					
			} 
		}
		
		return $this->conteneur;
	}
	
	
	/**
	 * add
	 * @param String $requete
	 * @param String $destination
	 * @param int $position
	 * @return int l'id
	 */
	public function add( $requete, $destination, $position = null ) {
		$requete = stripslashes($requete);
		$destination = stripslashes($destination);
		
		if ( count($this->conteneur) < 10) {
			$futurPositionDefaut = $this->getLastPosition( $requete );
				
			$motCle = Mage::getModel('liveoptim/motcle')->setData(array('requete'=>$requete,'destination'=>$destination,'position'=>$futurPositionDefaut))->save();
			$id = $motCle->getId();
		
			$ligne = array( 'id' => $id, 'requete' => $requete, 'destination' => $destination, 'position' => $futurPositionDefaut );
		
			$this->conteneur[$id] = $ligne;
		
			if ( !is_null($position) ) {
				$this->setPosition( $id, $position );
			}
			
			return $id;
		}
		
		return false;
	}

	/**
	 * remove
	 * @param int $id
	 */
	public function remove($id) {
		$requete = $this->conteneur[$id]['requete'];
		$positionLigneSupprime = $this->conteneur[$id]['position'];
		
		// on récupère toutes les lignes pour ce mot clé
		$tempTableau = $this->getByRequete( $requete );
		
		// on réorganise les autres position
		foreach ( $tempTableau as $ligne ) {
			if ( $ligne['position'] > $positionLigneSupprime ) {
				$this->conteneur[ $ligne['id'] ]['position'] -= 1; 
				
				Mage::getModel('liveoptim/motcle')->load(intval( $ligne['id'] ))
													->setPosition(intval( $this->conteneur[ $ligne['id'] ]['position'] ))
													->save();
			}
		}		
		
		unset( $this->conteneur[$id] );
		
		Mage::getModel('liveoptim/motcle')->load($id)->delete();
		
	}
	
	/**
	 * set
	 * @param int $id
	 * @param String $requete
	 * @param String $destination
	 * @param int $position
	 * @return String null ou le message d'erreur
	 */
	public function set($id, $requete, $destination, $position = null) {
		$requete = stripslashes($requete);
		$destination = stripslashes($destination);
		
		
		if ( $this->conteneur[$id]['requete'] == $requete ) {
			// si aucun changement sur champ requete
			
			if ( $this->conteneur[$id]['destination'] != $destination ) {
				// si il y a une modification a faire sur la destination
				$this->conteneur[$id]['destination'] = $destination;
				
				Mage::getModel('liveoptim/motcle')->load($id)->setDestination($destination)->save();
				
				
			}
			
			if ( !is_null($position) && strlen($position) > 0 && intval($position) && $position != $this->conteneur[$id]['position'] ) {
				// si il y a une modification a faire sur la position
				$this->setPosition($id, $position);
			}	
			
			return null;
			
		} else {
			// si il y a une modification a faire sur le champ requete
			
			// on récupère toutes les lignes pour ce mot clé
			$tempTableau = $this->getByRequete( $this->conteneur[$id]['requete'] );
			
			// on réorganise les autres positions de son ancienne requete
			foreach ( $tempTableau as $ligne ) {
				if ( $ligne['position'] > $this->conteneur[$id]['position'] ) {
					$this->conteneur[ $ligne['id'] ]['position'] -= 1;
					
					Mage::getModel('liveoptim/motcle')->load($ligne['id'])
														->setPosition(intval( $this->conteneur[ $ligne['id'] ]['position']))
														->save();
				}
			}
			
			// on récupère la prochaine position de sa nouvelle requete
			$nouvellePositionParDefaut = $this->getLastPosition( $requete );
			
			// on modifie le tout
			$this->conteneur[$id]['requete'] = $requete;
			$this->conteneur[$id]['destination'] = $destination;
			$this->conteneur[$id]['position'] = $nouvellePositionParDefaut;
			
			Mage::getModel('liveoptim/motcle')->load($id)
												->setPosition($nouvellePositionParDefaut)
												->setDestination($destination)
												->setRequete($requete)
												->save();
			
			
			// on essaye d'affecter la position souhaité
			if ( !is_null($position) && strlen($position) > 0 && intval($position) ) {
				$this->setPosition( $id, $position );
			}
			
			return null;
		}
	}
	
	/**
	 * setPosition
	 * @param int $id
	 * @param int $positionDestination
	 */
	public function setPosition($id, $positionDestination) {
		$requete = $this->conteneur[$id]['requete'];
		$positionProvenance = $this->conteneur[$id]['position'];
		
		// on récupère toutes les lignes pour ce mot clé
		$tempTableau = $this->getByRequete( $requete );
		
		echo "toute les ocurence de $requete : ";print_r($tempTableau);
		
		if ( $positionDestination < 1 || $positionDestination > count($tempTableau) ) return false;
			
		if ( $positionDestination > $positionProvenance ) {
			echo "/n posDest > postPro";
			// on réorganise les autres position
			foreach ( $tempTableau as $ligne ) {
				if ( $ligne['position'] > $positionProvenance && $ligne['position'] <= $positionDestination ) {
					$this->conteneur[ $ligne['id'] ]['position'] -= 1;
					
					$motCle = Mage::getModel('liveoptim/motcle')->load(intval($ligne['id']));
					
					echo "<br /><br /> Avant modif ";print_r($motCle);
					$motCle->setPosition(intval($this->conteneur[ $ligne['id'] ]['position']));
					$motCle->save();
					echo "<br /> Apres modif ";print_r($motCle);									
				}
			}
			
			$this->conteneur[$id]['position'] = $positionDestination;
			
			Mage::getModel('liveoptim/motcle')->load(intval($id))
														->setPosition(intval($positionDestination))
														->save();
		
		} elseif ( $positionDestination < $positionProvenance ) {
			echo "/nposDest < posProv/n";
			// on réorganise les autres position
			foreach ( $tempTableau as $ligne ) {
				if ( $ligne['position'] >= $positionDestination && $ligne['position'] < $positionProvenance ) {
					$this->conteneur[ $ligne['id'] ]['position'] += 1;
					
					$motCle = Mage::getModel('liveoptim/motcle')->load(intval($ligne['id']));
					
					//echo "<br /> Avant modif ";print_r($motCle);
					$motCle->setPosition(intval($this->conteneur[ $ligne['id'] ]['position']));
					$motCle->save();
					//echo "<br /> Apres modif ";print_r($motCle); echo "<br />";
					
					
					
				}
			}
				
			$this->conteneur[$id]['position'] = $positionDestination;
			
			Mage::getModel('liveoptim/motcle')->load(intval($id))
														->setPosition(intval($positionDestination))
														->save();
		}

		return true;
	}
	
	/**
	 * getLastPosition
	 * @param String $requete
	 * @return int la futur position
	 */
	private function getLastPosition($requete) {
		return count( $this->getByRequete( $requete ) ) + 1;
	}
	
	/**
	 * getByRequete
	 * @param String $requete
	 * @return array un tableau avec uniquement le mot clé demandé
	 */
	private function getByRequete($requete) {
		// Incompatible PHP 5.2
		//return array_filter( 
		//		$this->conteneur, 
		//		function ($element) use ($requete) { 
		//			return ( $element['requete'] == $requete ); 
		//		} 
		//);

		// Version compatible 5.1.x et suppérieur
		$rep = array();
		foreach ($this->conteneur as $row) {
			if ( $row['requete'] == $requete ) {
				array_push( $rep, $row );
			}
		}
		return $rep;
	}

}
