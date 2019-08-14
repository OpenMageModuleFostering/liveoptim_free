<?php

$conteneurConfig = ConteneurConfig::getInstance();

$conteneurConfig->update();

$this->_redirect('*/*/index');