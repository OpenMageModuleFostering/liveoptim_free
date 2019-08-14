<?php
/*
 * Fichier code403Action.class.php
 * action code403 Forbidden
 */

require_once dirname(__FILE__).'/../../lib/generiqueAction.php';

header("HTTP/1.0 403 Forbidden");
		
$tpl = 'code403';
