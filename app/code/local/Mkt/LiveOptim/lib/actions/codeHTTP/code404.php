<?php
/*
 * Fichier code404Action.class.php
 * action code404 Not Found
 */

require_once dirname(__FILE__).'/../../lib/generiqueAction.php';

header("HTTP/1.0 404 Not Found");
		
$tpl = 'code404';
