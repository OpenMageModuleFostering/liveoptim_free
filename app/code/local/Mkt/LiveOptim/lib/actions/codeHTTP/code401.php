<?php
/*
 * Fichier code401Action.class.php
 * action code401 Unauthorized
 */

require_once dirname(__FILE__).'/../../lib/generiqueAction.php';

header("HTTP/1.0 401 Unauthorized");

$tpl = 'code401';
