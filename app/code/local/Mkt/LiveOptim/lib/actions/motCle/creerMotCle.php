<?php
$requete = $_POST['requete'];
		$destination = $_POST['destination'];
		$patate = $_POST['position'];


		if ( !isset($patate) || is_null($patate) || strlen($patate) <= 0 || !intval($patate) ) $patate = null;

		$id = ConteneurMotCle::getInstance()->add( $requete, $destination, $patate );
		
		$this->_redirect('*/*/motcle');
