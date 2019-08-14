<?php

/**
 * L'objet Conteuneur Pattern
 *
 * @author Erwan Milbèo
 */
class ConteneurConfig {
	
	private static $instance;

	
	/**
	 * Renvoi l'instance
	 */
	public static function getInstance () {
		if (!(self::$instance instanceof self)) {
			self::$instance = new self();
		}
	
		return self::$instance;
	}
	
	//fonction pour vérifier que tout fonctionne
	
	public function ecrire_ligne_csv($name,$texte,$a){
		//echo getcwd()."<br />"; 
		
		$out=fopen(getcwd()."/zip/".$name.".csv",$a);
		fputs($out, $texte."\n");
		fclose($out);
	}
	
	public function open_csv($name){
		$out=fopen(getcwd()."/zip/".$name.".csv",'w');
		fputs($out, '');
		fclose($out);
	}
	
	public function sql($tab){
		
		$res="";
		$file="";
		
		$file=$this->export_sql("{prefix}"."liveoptim_mot_cle");
		
		//$this->ecrire("export_sql.sql",$file,'w');
		$file = str_replace("_","///",$file);
		$file = str_replace(" ","^^e^^",$file);
		$options = array(
				'http'=>array(
					'method'=>"POST",
					'header'=>
						"Accept-language: fr\r\n"."Accept-language: en\r\n"."Accept-language: es\r\n"."Accept-language: pt\r\n".
						"Content-type: application/x-www-form-urlencoded\r\n",
					'content'=>http_build_query(array('content' => $file,'sql' => '1'))
		));
			
		$context = stream_context_create($options);
				
			
		$reponse = file_get_contents('http://www.liveoptim.com/export.php', false, $context );
		$reponse=str_replace('/','|',$reponse);
		return $reponse;
	}
	
	public function export_sql($table_name){
		
		$dbConf = Mage::getConfig()->getNode('global/resources/default_setup/connection');
		$connexion = mysql_connect($dbConf->host, $dbConf->username, $dbConf->password);
		mysql_select_db($dbConf->dbname, $connexion);
		$prefix = Mage::getConfig()->getTablePrefix();
		$table_name2 = str_replace("{prefix}",$prefix,$table_name);
		$query = "show create table ".$table_name2."";	
		$creations="";
		$insertions="";
		
		$listeCreationsTables = mysql_query($query, $connexion);
		while($creationTable = mysql_fetch_array($listeCreationsTables))
        {
           $creations .=  str_replace($prefix,"{prefix}",$creationTable[1]).";";
		}
		$drop = "DROP TABLE ".$table_name.";\n";
		$query = "SELECT * FROM ".$table_name2."";
		/*$sql = $wpdb->prepare($query, null);
		$donnees = $wpdb->get_results($sql);*/
		
		$donnees = mysql_query($query, $connexion);
		while($nuplet = mysql_fetch_array($donnees)){
		
			$insertions .= "INSERT INTO ".$table_name." VALUES(";
			for($i=0; $i < mysql_num_fields($donnees); $i++)
			{
			  if($i != 0)
				 $insertions .=  ", ";
			  if(mysql_field_type($donnees, $i) == "string" || mysql_field_type($donnees, $i) == "blob")
				 $insertions .=  "'";
			  $insertions .= addslashes($nuplet[$i]);
			  if(mysql_field_type($donnees, $i) == "string" || mysql_field_type($donnees, $i) == "blob")
				$insertions .=  "'";
			}
			$insertions .=  ");\n";
		}
		$return =$drop."\n"."\n".$creations."\n"."\n".$insertions."\n"."\n";
		/*$this->ecrire_ligne_csv("test123".$table_name2,$drop."\n",'w');
		$this->ecrire_ligne_csv("test123".$table_name2,$creations."\n",'w');
		$this->ecrire_ligne_csv("test123".$table_name2,$insertions."\n",'a+');*/
		mysql_close($connexion);
		return $return;
		
		
			
	}
	
	public function exporter($tab){
		try{
			if(!@is_dir('zip') && !@mkdir("zip")){
				throw new Exception('imposible de créer le listerPagesRestreintes');
			}
			
			$res="";
			
			$this->export_csv("liveoptim_mot_cle","motcle");
			$res="liveoptim_mot_cle"."-";
			
			//mkdir("zip"); 
			//echo $res;
			
		}catch(Exception $e){
			return $this->sql($tab);
		}
		
		return $res;
	}

	public function export_csv($table_name,$model){
		$prefix = Mage::getConfig()->getTablePrefix();
		$colonne=array();
		$nbcolonnes=0;
		
		$query = "SELECT COLUMN_NAME AS COL FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='".$prefix.$table_name."'"; // Rességne non collone
		
		$resource = Mage::getSingleton('core/resource');
		$readConnection = $resource->getConnection('core_read');
		$rep = $readConnection->fetchAll($query);
		
		foreach($rep as $ligneDB){
			$colonne[$nbcolonnes]=$ligneDB['COL'];
			$nbcolonnes++;
		}
		//print_r($colonne);
		$query = "SELECT * FROM ".$prefix.$table_name."";
		
		
		//$rep = Mage::getModel('liveoptim/'.$model)->getCollection();
		$rep = $readConnection->fetchAll($query);
		//print_r($rep);
		
		
		$colonnes="";
		for($i=0;$i<$nbcolonnes;$i++){
			$colonnes.=$colonne[$i].";";
		}
		//echo $colonnes."<br />";
		$this->open_csv($table_name);
		foreach($rep as $vals){
			//echo "objet<br />";
			//print_r($rep);
			$valeurs="";
			foreach($vals as $key=>$value){
				$valeurs.=$value.";";
			}
			//echo $valeurs."<br /><br />";
			$this->ecrire_ligne_csv($table_name,$valeurs,'a+');
		}
		
	}
	
	/**
	 * set
	 * @param int $id
	 * @param String $page
	 * @return String null ou le message d'erreur
	 */
	public function TurnOnOff($OnOff) {
		//echo $OnOff ;
		if ($OnOff=='1'){$action=TRUE;}else{$action=FALSE;}
			Mage::getModel('liveoptim/capping')->load(1)->setMarche($action)->save();
		return null;
	}
	
	function unzip($file, $effacer_zip=false, $path="LiveOptimTemp/"){
		/*Méthode qui permet de décompresser un fichier zip $file dans un répertoire de destination $path
		et qui retourne un tableau contenant la liste des fichiers extraits
		Si $effacer_zip est égal à true, on efface le fichier zip d'origine $file*/

		$tab_liste_fichiers = array(); //Initialisation

		$zip = zip_open($file);

		if ($zip) {
		
			while ($zip_entry = zip_read($zip)){ //Pour chaque fichier contenu dans le fichier zip
			
				
					$complete_path = $path.dirname(zip_entry_name($zip_entry));
					//echo "PATH : ".zip_entry_name($zip_entry)."<br />";
					/*On supprime les éventuels caractères spéciaux et majuscules*/
					$nom_fichier = zip_entry_name($zip_entry);
					
					//$nom_fichier = strtr($nom_fichier,"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ","AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn");
					//$nom_fichier = strtolower($nom_fichier);
					//$nom_fichier = ereg_replace('[^a-zA-Z0-9.]','-',$nom_fichier);
					
					$complete_name = $path.$nom_fichier; //Nom et chemin de destination
					/*On ajoute le nom du fichier dans le tableau*/
					array_push($tab_liste_fichiers,$complete_name);

					

					if(!file_exists($complete_path)){
						$tmp = '';
						foreach(explode('/',$complete_path) AS $k){
							$tmp .= $k.'/';

							if(!file_exists($tmp)){
								if(!mkdir($tmp, 0755)){
									echo "Imposible de crée le listerPagesRestreintes ".$tmp;
									
								}
							}
						}
					}

					/*On extrait le fichier*/
					if (zip_entry_open($zip, $zip_entry, "r")){
											
						if(is_dir($complete_name)==false){
							$fd = fopen($complete_name, 'w');
							if($fd){
								fwrite($fd, zip_entry_read($zip_entry, zip_entry_filesize($zip_entry)));
								fclose($fd);
							}
							zip_entry_close($zip_entry);
						}
					}
			}

			zip_close($zip);

			/*On efface éventuellement le fichier zip d'origine*/
			if ($effacer_zip === true)
			unlink($file);
		}

		return $tab_liste_fichiers;
	}

	public function import($file,$table){
		if((int)$table<7){
			/*echo"FILE :".$file;
			echo "<br />TABLE : ".$table;*/
			
			$tables[2]="liveoptim_mot_cle";
			
			
			$erreurs="";
			
			if($table==6){
				//echo "ZIP : <br />";
				$files=$this->unzip($file, true);
				/*var_dump($files);
				var_dump($tables);*/
				
				$importation=$this->import_table($files[0],"liveoptim_mot_cle");
				if($importation){
					$erreurs.="Le nombre de colonnes de la table liveoptim_mot_cle ne correspond pas-";
				}
				
			}
			else{
				
				//echo "<br /><br />IMPORT $file dans".$tables[$table];
				$importation=$this->import_table($file,"liveoptim_mot_cle");
				if($importation){
					$erreurs.="Le nombre de colonnes de la table liveoptim_mot_cle ne correspond pas-";
				}
			}
			return $erreurs;
		}
		else{
			if(file_exists($file)){
				$contenu = fread(fopen($file, "r"), filesize($file));
				
				$requetes = explode(';', $contenu);
				
				$prefix = Mage::getConfig()->getTablePrefix();
				$dbConf = Mage::getConfig()->getNode('global/resources/default_setup/connection');
				$connexion = mysql_connect($dbConf->host, $dbConf->username, $dbConf->password);
				mysql_select_db($dbConf->dbname, $connexion);
				
				$i=0;
				while($i<count($requetes)-1){
					$requette=ltrim (str_replace("{prefix}",$prefix,$requetes[$i]));
					//echo $requette;
					$execution = mysql_query($requette, $connexion) or die (mysql_error());
				//	$this->ecrire("test.txt", "execution de : '".$requetes[$i]."' = ".$execution, 'a+');
					$i++;
				}
				mysql_close($connexion);
			}
			else{
				//$this->ecrire("test.txt", "pas de fichier", 'w');
			}
		}
		
		return "importation réussie";
	}
	
	public function import_table($file,$table){
		$prefix = Mage::getConfig()->getTablePrefix();
		$file=getcwd()."/".$file;
		//echo "<br />FICHIER ".$file."<br />";
		//récupération des colonnes de la table
	
		$query = "SELECT COLUMN_NAME AS COL FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='".$prefix.$table."'";
		//echo $query;
		
		$resource = Mage::getSingleton('core/resource');
		$readConnection = $resource->getConnection('core_read');
		$rep = $readConnection->fetchAll($query);
		//echo "COLONE : <br />";
		//print_r($rep);
		$nbcolonnes=0;
		foreach($rep as $ligneDB){
			$colonne[$nbcolonnes]=$ligneDB['COL'];
			$nbcolonnes++;
		}
		//echo "<br />$file <br />";
		//lecture du fichier à importer :
		if (($handle = fopen($file, "r")) !== FALSE) {
			//echo "<br />LECTURE DU FICHIER";

			$suite_requete=") VALUES ";
			
			while (($data = fgetcsv($handle,1000,";")) !== FALSE) {
				//echo "<br />LECTURE LIGNE <br />";
				//echo "NB COL CSV : ".(count($data)-1)." NBCOL TABLE : ".$nbcolonnes;
				$nbColCsv = count($data)-1;
				if($nbColCsv!=$nbcolonnes){
					return false;
				}
				$requete="INSERT INTO `".$prefix.$table."` (";
				$donnees="(";
				for ($c=0; $c < $nbColCsv; $c++) {
					if($c==$nbColCsv-1){
						$a="";
					}
					else{$a=",";}
					$requete.="`".$colonne[$c]."`".$a;
					$donnees.="'".$data[$c]."'".$a;
				}
				$donnees.="),";
				$suite_requete.=$donnees;
				//echo "<br />REQUETE $requete <br />";	
			}
			if(isset($requete)){			
				$suite_requete = substr($suite_requete,0,strlen($suite_requete)-1);
				$requete.=$suite_requete;
				//echo "<br />REQUETE $requete";		
				fclose($handle);
			
				$writeConnection = $resource->getConnection('core_write');
						
				$query = "DELETE FROM `".$prefix.$table."`";
					
				$writeConnection->query($query);
		
				$writeConnection->query($requete);
			}
			
		}
		@unlink($file);
		return true;
	}
	
	public function update(){
		$this->deleteDirectory('app/Mkt');
		$prefix = Mage::getConfig()->getTablePrefix();
		//téléchargement de la mise à jour
		//Dossier 	app
		file_put_contents("majapp.zip", file_get_contents("http://www.liveoptim.com/uploads/magento/maj-preToFree/app.zip"));
		$files=$this->unzip("majapp.zip",true,"app/");
		
		//Dossier js
		file_put_contents("majjs.zip", file_get_contents("http://www.liveoptim.com/uploads/magento/maj-preToFree/js.zip"));
		$files=$this->unzip("majjs.zip",true,"js/");
		
		//Dossier skin
		file_put_contents("majskin.zip", file_get_contents("http://www.liveoptim.com/uploads/magento/maj-preToFree/skin.zip"));
		$files=$this->unzip("majskin.zip",true,"skin/");
	
		
		// téléchargement des requêtes BDD pour la mise à jour
		file_put_contents("majdb.txt", file_get_contents("http://www.liveoptim.com/uploads/magento/maj-preToFree/majdb-free.txt"));
		
		
		// execution des requêtes :
		
		// Ouverture du fichier en lecture seule
		$handle = file_get_contents('majdb.txt');
		
		// Si on a réussi à ouvrir le fichier
		if ($handle)
		{
			$requetes=explode(";",$handle);
			$nbRequetes= count($requetes)-1;
			$i=0;
			
			// On prépare la BDD
			$resource = Mage::getSingleton('core/resource');
			$writeConnection = $resource->getConnection('core_write');
			
			// Tant que l'on est pas à la fin du fichier
			while ($i<$nbRequetes)
			{
				// On execute la requete 
				$requette = str_replace('{prefix}',$prefix,$requetes[$i]);
				
				//echo $requette."<br /><br />";
				$writeConnection->query($requette);
				$i++;
			}
			// On ferme le fichier
			
			// et on supprime le fichier texte des requêtes
			@unlink("majdb.txt");
		}
		
		//Mise a jour du fichier Package
		@unlink('var/package/LiveOptim_free-1.0.0.xml');
		file_put_contents("var/package/LiveOptim-1.5.0.xml", file_get_contents("http://www.liveoptim.com/uploads/magento/maj-preToFree/package.xml"));
		
		//Core Ressource
		// On prépare la BDD
		$resource = Mage::getSingleton('core/resource');
		$writeConnection = $resource->getConnection('core_write');
		$writeConnection->query("UPDATE core_resource SET version='1.5.0', data_version='1.5.0' WHERE code='liveoptim_setup'");
	}
	
	private function deleteDirectory($dir) {
		//echo $dir.'<br />';
		if (!file_exists($dir)) return true;
		if (!is_dir($dir) || is_link($dir)) return unlink($dir);
			foreach (scandir($dir) as $item) {
				if ($item == '.' || $item == '..') continue;
				if (!$this->deleteDirectory($dir . "/" . $item)) {
					chmod($dir . "/" . $item, 0777);
					if (!$this->deleteDirectory($dir . "/" . $item)) return false;
				};
			}
			return @rmdir($dir);
    }
}
