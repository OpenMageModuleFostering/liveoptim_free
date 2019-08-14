	<div id="infoPrenium" style="margin-top:calc(); display: none;">
		<div class="header"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/logo-mkt-popup.png"></img></div>
		<div class="center">
			
			<div class="center-rigth">
				<span class="all_prod"><?php echo __('COM_LIVEOPTIM_FNT_PRE_ALL_PRODUCT') ?></span>
				<img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/Flechegauche.png"/>
				<img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/Flechecentrale.png"/>
				<img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/Flechedroite.png"/><br />
				<div id="others_product">
					<span class="txt_other"><?php echo __('COM_LIVEOPTIM_FNT_PRE_OTHER_PRODUCT') ?></span><br />
					<a class="btn_plusInfo" target="_blank" href="http://www.liveoptim.com/other-products/"><?php echo __('COM_LIVEOPTIM_FNT_PRE_MORE_INFO') ?></a> 
				</div>
			
			</div>
			<div class="center-left">
				<span class="logo-lo-prenium"></span>
				<span class="logo-30jours-gratuit"></span>
				<div id="conteneur-detail">
					<div>
						<span class="header-left"></span>
						<span class="header-middle"></span>
						<span class="header-right"></span>
					</div>
					<div class="middle-left">
						<div class="middle-right">
							<div class="feature-premium">
								<span class="detail"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/PictoValid.png"><?php echo __('COM_LIVEOPTIM_FNT_PRE_UN_KEY') ?></span>
								<span class="detail"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/PictoValid.png"><?php echo __('COM_LIVEOPTIM_FNT_PRE_UN_TARGET') ?></span><br />
								<span class="detail"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/PictoValid.png"><?php echo __('COM_LIVEOPTIM_FNT_PRE_CACHE') ?></span>
								<span class="detail"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/PictoValid.png"><?php echo __('COM_LIVEOPTIM_FNT_PRE_CUSTOM_TAG') ?></span><br />
								<span class="detail"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/PictoValid.png"><?php echo __('COM_LIVEOPTIM_FNT_PRE_TARGET') ?></span>
								<span class="detail"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/PictoValid.png"><?php echo __('COM_LIVEOPTIM_FNT_PRE_LOOP') ?></span><br />
								<span class="detail"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/PictoValid.png"><?php echo __('COM_LIVEOPTIM_FNT_PRE_CAPPING') ?></span>
								<span class="detail"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/PictoValid.png"><?php echo __('COM_LIVEOPTIM_FNT_PRE_EXCLUD_PAGES') ?></span><br />
								<span class="detail"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/PictoValid.png"><?php echo __('COM_LIVEOPTIM_FNT_PRE_EXECEPTION') ?></span>
								<span class="detail"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/PictoValid.png"><?php echo __('COM_LIVEOPTIM_FNT_PRE_SUPPORT') ?></span><br />
								<span class="detail"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/PictoValid.png"><?php echo __('COM_LIVEOPTIM_FNT_PRE_TWITER') ?></span>
								<span class="detail"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/PictoValid.png"><?php echo __('COM_LIVEOPTIM_FNT_PRE_HOTLINE') ?></span><br />
								<span class="detail"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/PictoValid.png"><?php echo __('COM_LIVEOPTIM_FNT_PRE_CHAT') ?> </span><br />
								<a class="btn_Prenuim" href="<?php echo Mage::helper('adminhtml')->getUrl("liveoptim/adminhtml_liveoptim/update")?>"><?php echo __('COM_LIVEOPTIM_FNT_PRE_UPGRADE') ?></a> 
							</div>
						</div>						
					</div>
					<div class="footer-left">
						<div class="footer-right">
							<span class="footer-middle"></span>
						</div>
					</div>
				</div>
				
			</div>
			
		</div>
		<div ><img class="close" onclick="displayInfoPrenium()" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/close.png"></img></div>
		
	</div>
	<div style='width: 100%; background-color: #787878; text-align: center; padding:5px 0 5px 0;<?php echo $margin ?>'>
		<p style='color: #FFFFFF;'><?php echo __('COM_LIVEOPTIM_LICENCE_FREE')."<br />". __('COM_LIVEOPTIM_BOUTON_PRENIUM');?></p>
	</div>