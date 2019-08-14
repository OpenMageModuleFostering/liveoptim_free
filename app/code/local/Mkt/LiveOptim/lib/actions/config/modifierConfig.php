<?
$on = $this->_request->getParam('on');
$val = $this->_request->getParam('val');
$exp = $this->_request->getParam('exp');
$imp = $this->_request->getParam('imp');
$sql = $this->_request->getParam('sql');

if (isset($on)){
	//$on = $_GET['on'];
	ConteneurConfig::getInstance()->TurnOnOff($on);
	
	$this->_redirect('*/*/config');
}
else if (isset($exp)){
	$val =array();
	for($i=0;$i<6;$i++){
		
		array_push($val,$_POST[(string)$i]);
	}
	//print_r($val);
	
	$res=ConteneurConfig::getInstance()->exporter($val);
	$fichier = $res;
	
	if(strpos('.sql',$fichier)==0){
		zipactions($res);
		
		@rmdir("zip");			
	$this->_redirect('*/*/config',array('zip'=>'BackupBDD.zip'));
	}else{
		$this->_redirect('*/*/config',array('res'=>$fichier));
	}
}
else if (isset($sql)){
	$val =array();
	for($i=0;$i<6;$i++){
		array_push($val,$_POST[(string)$i]);
	}
	$res = ConteneurConfig::getInstance()->sql($val);
 
	$this->_redirect('*/*/config',array('res'=>$res));
}

else if (isset($imp)){
	$val =$_POST['quoi'];
	if((int)$val<7){
		//if($text!=''){$text=$texte."\n";}
		@mkdir("LiveOptimTemp",0777,true);
		$chemin_destination = 'LiveOptimTemp/'; 
		$file=$chemin_destination.$_FILES['fichier_up']['name'];
		move_uploaded_file($_FILES['fichier_up']['tmp_name'], $file); 
		$res=ConteneurConfig::getInstance()->import($file, $val);	
		$r=@rmdir("LiveOptimTemp");	
		$this->_redirect('*/*/config');
	}else{
		$file=$_FILES['fichier_up']['tmp_name'];
	}
	//
	$etat = ConteneurConfig::getInstance()->import($file, $val);
	//@rmdir("../LiveOptimTemp");	
	$this->_redirect('*/*/config');
	
	
}else{
	$this->_redirect('*/*/config');
}