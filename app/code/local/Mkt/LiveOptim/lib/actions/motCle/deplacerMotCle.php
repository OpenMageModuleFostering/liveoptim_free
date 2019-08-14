<?php
$id = $this->_request->getParam('id');
$patate = $this->_request->getParam('position');

ConteneurMotCle::getInstance()->setPosition( $id, $patate );

$this->_redirect('*/*/motcle');
