<?php
function zipactions($tabname){
		
	// nom des fichiers à ajouter dans l'archive 
	$tables=explode("-",$tabname);
	$nbtables=count($tables);
	// création d'un objet 'zipfile' 
	$zip = new ZipArchive();
	//echo getcwd().'/BackupBDD.zip';
	if($zip->open(getcwd().'/BackupBDD.zip', ZipArchive::CREATE) == TRUE){
		//echo "Cretaion archive<br />";
		// Pour chaque fichier csv
		for($i=0;$i<$nbtables-1;$i++){
			// path du fichier 
			//echo getcwd()."/zip/".$tables[$i].".csv<br />";
			$filename = getcwd()."/zip/".$tables[$i].".csv";
			// ajout du fichier dans l'objet zip
			$zip->addfile($filename, $tables[$i].".csv"); 
		}
	}
	// production de l'archive' Zip 
	$zip->close();

}