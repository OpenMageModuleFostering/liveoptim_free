<?php
	
	require_once('Mkt/LiveOptim/lib/base/conteneurParametres.class.php');
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//Apel vers serveur LO
		$url=$_POST['url'];
		$pass = $_POST['pass'];
		$email = $_POST['mail'];
		$lang = $_POST['lang'];
		
		$options = array(
			'http'=>array(
				'method'=>"POST",
				'header'=>
					"Accept-language: en\r\n"."Accept-language: es\r\n"."Accept-language: pt\r\n".
					"Content-type: application/x-www-form-urlencoded\r\n",
				'content'=>http_build_query(array('url' =>$url=$_POST['url'],'pass' => $pass,'email'=>$email,'lang'=>$lang,'cms'=>'magento'))
		));
		
		$context = stream_context_create($options);
			
		
		if ( !$responce = @file_get_contents('http://www.liveoptim.com/service/inscription', false, $context ) ) {
			$responce = 'erreur:file_get_contents';
			echo $responce;
		}else{
			$erreur=$responce;
			//var_dump($responce);	
			$responce = explode('|||', $responce);
			//echo $responce[0];	
			if($responce[0]!="1"){
				$erreur=$responce[1];
				
				$this->lang();
				$this->loadLayout();
				$this->getLayout()->getBlock('head')->setTitle('LiveOptim  - '.$this->__('inscription_titre'));
				$this->getLayout()->getBlock('inscription')->assign('erreur',$erreur);
				$this->renderLayout();
			}else{
				$conteneurParam=ConteneurParametres::getInstance();
				$conteneurParam->setInscription(true);
				
				$this->_redirect('*/*/index');
			}
		}
		
	}else{
		$this->lang();
		$this->loadLayout();
		$this->getLayout()->getBlock('head')->setTitle('LiveOptim  - '.$this->__('inscription_titre'));
		$this->renderLayout();
	}
?>