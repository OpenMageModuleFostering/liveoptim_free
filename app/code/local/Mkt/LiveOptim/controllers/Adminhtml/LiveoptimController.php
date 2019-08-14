<?php

require_once('Mkt/LiveOptim/lib/base/conteneurMotCle.class.php');
require_once('Mkt/LiveOptim/lib/base/conteneurBaliseIgnore.class.php');
require_once('Mkt/LiveOptim/lib/base/conteneurConfig.class.php');


class Mkt_LiveOptim_Adminhtml_LiveoptimController extends Mage_Adminhtml_Controller_action
{
	public function lang(){
		 $lang = Mage::getSingleton('adminhtml/session')->getLocale();
		
		switch($lang){
			case 'en_GB':
			case 'en_US':
			case 'fr_FR':
			case 'es_ES':
			case 'pt_BR':
				break;
			
			case 'es_AR':
			case 'es_CL':
			case 'es_CO':
			case 'es_CR':
			case 'es_MX':
			case 'es_PA':
			case 'es_PE':
			case 'es_VE':
				Mage::getSingleton('adminhtml/session')->setLocale('es_ES');
				$this->_redirectReferer();
				break;
			
			case 'en_AU':
			case 'en_CA':
			case 'en_IE':
			case 'en_IE':
			case 'en_NZ':
			case 'en_AU':
				Mage::getSingleton('adminhtml/session')->setLocale('en_US');
				$this->_redirectReferer();
				break;
				
			case 'fr_CA':
				Mage::getSingleton('adminhtml/session')->setLocale('fr_FR');
				$this->_redirectReferer();
				break;
			
			case 'pt_PT':
				Mage::getSingleton('adminhtml/session')->setLocale('pt_BR');
				$this->_redirectReferer();
				break;
					
			default:
				 Mage::getSingleton('adminhtml/session')->setLocale('en_US');
				 $this->_redirectReferer();
		 }
		 
	}
	
	
	/*           MOTCLE           */
	public function motcleAction(){
		require_once('Mkt/LiveOptim/lib/actions/motCle/listerMotCle.php');
		
	}
	
	public function savemotcleAction(){
		require_once('Mkt/LiveOptim/lib/actions/motCle/creerMotCle.php');
		
	}
	
	public function motclemodifAction(){
		require_once('Mkt/LiveOptim/lib/actions/motCle/modifierMotCle.php');
		
	}
	
	public function motcledeplacerAction(){
		require_once('Mkt/LiveOptim/lib/actions/motCle/deplacerMotCle.php');		

	}
	
	public function motcleenleverAction(){
		require_once('Mkt/LiveOptim/lib/actions/motCle/enleverMotCle.php');
	
	}
	/*           FIN MOT CLE     */
	
	
	/*          SCHEMA GLOBALE         */
	public function patternAction(){
		require_once('Mkt/LiveOptim/lib/actions/pattern/listerPattern.php');		

	}
	
	
	/*           FIN SCHEME GLOBALE                       */
	
	
	/*          SCHEME PAGE CIBLE             */
	public function cibleAction(){
		require_once('Mkt/LiveOptim/lib/actions/patternCible/listerPatternCible.php');
	}
	
	
	/*      FIN SCHEMA PAGE CIBLE       */
	
	
	/*       BALISE IGNORER             */
	public function baliseignoreAction(){
		require_once('Mkt/LiveOptim/lib/actions/baliseIgnore/listerBaliseIgnore.php');
	}
	
	
	/*                 FIN BALISE IGNIORER                              */
	
	/*      Configuration          */
	public function configAction(){
		require_once('Mkt/LiveOptim/lib/actions/config/config.php');
	}
		
	public function modifConfigAction(){
		require_once('Mkt/LiveOptim/lib/actions/config/zipConfig.php');
		require_once('Mkt/LiveOptim/lib/actions/config/modifierConfig.php');
			
	}
	
	
	/*            FIN CONFIGURATION           */	
	function pagesrestreintesAction(){
		require_once('Mkt/LiveOptim/lib/actions/pagesRestreintes/listerPagesRestreintes.php');
	}
	
	function updateAction(){
		require_once('Mkt/LiveOptim/lib/actions/update.php');

	}
	
	
	public function inscriptionAction(){
		require_once('Mkt/LiveOptim/lib/actions/inscription.php');
		
		
	}
	public function accueilAction(){
		
		if(!Mage::helper('liveoptim')->liveoptim_isInscrit()){
			$this->_redirect('*/*/inscription');
		}else{
			$this->lang();
			$this->loadLayout();
			$this->renderLayout();
		}
	}
	public function tutorielAction(){
		if(!Mage::helper('liveoptim')->liveoptim_isInscrit()){
			$this->_redirect('*/*/inscription');
		}else{
			$this->lang();
			$this->loadLayout();
			$this->renderLayout();
		}
	}
	
	public function indexAction() {
		$this->accueilAction();
		/*$this->_initAction()
			->renderLayout();*/
	}


	
}
