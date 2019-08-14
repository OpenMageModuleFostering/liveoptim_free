<?php
$id = $this->_request->getParam('id');
		
ConteneurMotCle::getInstance()->remove($id);

$this->_redirect('*/*/motcle');
