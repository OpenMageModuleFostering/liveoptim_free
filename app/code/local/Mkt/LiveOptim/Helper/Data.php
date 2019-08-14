<?php

class Mkt_LiveOptim_Helper_Data extends Mage_Core_Helper_Abstract
{
	public static function liveoptim_isInscrit(){
		
		require_once dirname(__FILE__).'/../lib/base/conteneurParametres.class.php';
		
		$conteneurParametre = ConteneurParametres::getInstance();
		
		
		$inscription = $conteneurParametre->getInscription();
	
		return ($inscription and $inscription == 1);
		
	}
	
	
	public static function colorisation($chaine){
		$chaine=str_replace("{mc}","<span class=\"mc\">{mc}</span>",$chaine);
		$chaine=str_replace("{url}","<span class=\"url\">{url}</span>",$chaine);	
		return $chaine;
	}
}