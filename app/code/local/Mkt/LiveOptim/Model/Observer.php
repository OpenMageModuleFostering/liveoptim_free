<?php
/**
 * @category   MKT
 * @package    MKT_LiveOptim
 * @author     contact@liveoptim.com
 * @website    http://www.liveoptim.com
 * @license    Shareware
 */
class Mkt_LiveOptim_Model_Observer {

	public function setOptimisationSEO(Varien_Event_Observer $observer) {
		
			$transport			= $observer->getTransport();
			$block				= $observer->getBlock();
			$blocks = array('Mage_Catalog_Block_Product_View','Mage_Catalog_Block_Category_View','Mage_Catalog_Block_Product_View_DelisterPatternCibleion',
							'Mage_Catalog_Block_Product_View_Attributes','Mage_Catalog_Block_Product_List_Upsell','Mage_Catalog_Block_Product_View_Additional','Mage_Tag_Block_Product_List');
			//$blocks = array('Mage_Catalog_Block_Product_View','Mage_Catalog_Block_Category_View');
			require_once dirname(__FILE__).'../../lib/lib/CleMKT.class.php';
			$cleMKT = new CleMKT();
			
			if(in_array(get_class($block),$blocks)&& $cleMKT->isOnOff()){
						
				$content = $transport->getHtml();
		
				try{

					require_once 'Mkt/LiveOptim/lib/lib/liveoptim.php';
					$transport->setHtml(liveoptim_action( $content ));

				}catch (Exception $e){
					$transport->setHtml($content);
				}
				
				/*try {
					if (function_exists("zend_loader_enabled") && file_exists('Mkt/LiveOptim/lib/'.$repAdmin.'/lib/liveoptim.php')) {
						echo "LIVEOPTIM<br />";
						require_once 'Mkt/LiveOptim/lib/'.$repAdmin.'/lib/liveoptim.php'
						$transport->setHtml(liveoptim_action( $content )); 
					} else {
						throw new Exception('file_exists( "liveoptim.php" ) == false');
					}
				} catch (Exception $e) {
					echo "$e<br />";
					$transport->setHtml($content);
				}*/
			}
			/*$html = str_replace('tes','<strong>test</strong>',);
					
			//$html = $preHtml . $html . $postHtml;*/
			

		//endif;
	}
	
	
}
