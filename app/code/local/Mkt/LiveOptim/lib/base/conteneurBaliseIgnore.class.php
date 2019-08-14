<?php

/**
 * L'objet Conteuneur BaliseIgnore
 *
 * @author MKT
 */
class ConteneurBaliseIgnore {
	
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
	private function ConteneurBaliseIgnore() {
		$this->conteneur = array();
		
		/*$db = JFactory::getDbo();
		$query	= $db->getQuery(true);
		$query = '
				SELECT 
					* 
				FROM 
					#__liveoptim_balise_ignore;';
		$db->setQuery($query);
		$rep = $db->loadObjectList();*/
		$collection=Mage::getModel('liveoptim/baliseignore')->getCollection();
		//echo"colection balise ignore";print_r($collection);
		foreach ($collection as $ligneDB) {
			$lId = $ligneDB['id'];
			$lNom = $ligneDB['nom'];
		
			$ligne = array( 'id' => $lId, 'nom' => $lNom );
		
			$this->conteneur[$lId] = $ligne;
		}
	}
	
	/**
	 * getAll
	 */
	public function getAll() {

		if ( count($this->conteneur) > 0 ) {
			// on tri par nom de balise
			foreach ($this->conteneur as $key => $row) {
				$nom[$key]  = $row['nom'];
			}
				
			array_multisort($nom, SORT_ASC, $this->conteneur);
		}
		
		return $this->conteneur;
	}
	
	/**
	 * add
	 * @param String $nom
	 * @return int l'id
	 */
	public function add( $nom ) {
		$nom = stripslashes($nom);
		
		/*$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query = '
				INSERT INTO #__liveoptim_balise_ignore (
					nom
				) VALUES (
					/''.$nom.'/'
				);';
		$db->setQuery($query);
		$ligneBaliseIgnore = $db->execute();
		*/
		$baliseIgnore=Mage::getModel('liveoptim/baliseignore')->setData(array('nom'=>$nom))->save();
		
		$id = $baliseIgnore->getId();
		
		$ligne = array( 'id' => $id, 'nom' => $nom );
		
		$this->conteneur[$id] = $ligne;
		
		return $id;
	}

	/**
	 * remove
	 * @param int $id
	 */
	public function remove($id) {
		unset( $this->conteneur[$id] );
		
		/*$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query = '
				DELETE FROM 
					#__liveoptim_balise_ignore 
				WHERE 
					id = '.intval( $id ).';';
		$db->setQuery($query);
		$db->execute();*/
		$collection=Mage::getModel('liveoptim/baliseignore');
		$collection->load($id)->delete();
		$collection->save();
	}
	
	/**
	 * set
	 * @param int $id
	 * @param String $nom
	 * @return String null ou le message d'erreur
	 */
	public function set($id, $nom) {
		$nom = stripslashes($nom);
		
		if ( $this->conteneur[$id]['nom'] != $nom ) {
			// si il y a une modification a faire sur le nom
			$this->conteneur[$id]['nom'] = $nom;
			
			/*$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query = '
					UPDATE 
						#__liveoptim_balise_ignore 
					SET 
						nom = /''.$this->conteneur[$id]['nom'].'/' 
					WHERE 
						id = '.intval( $id ).';';
			$db->setQuery($query);
			$db->execute();*/
			$collection=Mage::getModel('liveoptim/baliseignore');
			$collection->load($id)->setNom($this->conteneur[$id]['nom']);
			$collection->save();
		}

		return null;
	}
	
}
