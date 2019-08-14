<?php
$id = $_POST['idModifier'];
$requete = $_POST['requete'];
$destination = $_POST['destination'];
$position = $_POST['position'];


if ( !isset($position) || is_null($position) || strlen($position) <= 0 && !intval($position) ) $position = null;

ConteneurMotCle::getInstance()->set($id, $requete, $destination, $position);

$this->_redirect('*/*/motcle');
