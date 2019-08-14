<div class="liveoptim">		
		<div id="j-main-container">
				<div class="clearfix"></div>
				<?php $acheteur = $isCompteActifSurServeur;  ?>
				<?php $expire = $isCompteExpire;  ?>
				<?php if ( $is_file_get_contents_disable ) { ?>
				<div style="background:none repeat scroll 0 0 #FF4040;color:white;display:block;margin:10px 0;padding:5px;text-align:center;width:800px;">
					The <em>file_get_contents ()</em> PHP function is disabled in the server configuration : <strong>allow_url_fopen=0</strong><br />
					You need to activate this function in order to run LiveOptim.
				</div>
				<?php
					  }
				?> 

<br />			
				<h2>
					<?php echo __('menu_pages_restreintes'); ?>
						
					<img class="picto_actif" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/actif.png" title="<?php echo __('accueil_copte_client_actif'); ?>" alt="<?php echo ('accueil_copte_client_actif'); ?>"/>
					
					<div id="fenetreLiveoptim" style="display:none">
						<?php echo $this->__('hintPageRestriction',Mage::getBaseUrl('skin').'adminhtml/base/default/img/hint.png'); ?>
					</div>
	
				</h2>
<?php echo $this->__('listerBaliseIgnore_text'); ?>				

	<div id="lo_content">
				<div id="fenetreInfoPrenuim">
		<?php echo __('hintPrenium'); ?>
	</div>
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th class="structure nowrap center"><?php echo "Page"; ?></th>
							<th width="100px" class="action nowrap center"><?php echo $this->__('listerBaliseIgnore_action'); ?></th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<td colspan="3">
								<div class="pagination pagination-toolbar">
									<input type="hidden" name="limitstart" value="0" />
								</div>
							</td>
						</tr>
					</tfoot>
					<tbody>
						<tr>
							<td class="page" style="width:300px"><input name="page" type="text" style="width:90%"/></td>
							<td class="action"><input class="ajouter" value="<?php echo $this->__('listerBaliseIgnore_ajouter'); ?>" type="button" onclick="fenetreInfoPreniumOuvrir()" /></td>
						</tr>
				
						<tr>
							<td class="structure">http://mywebsite.com/excluded-page</td>
							<td class="action">
								<a href="#" onclick="fenetreInfoPreniumOuvrir()"><img src="components/com_liveoptim/assets/img/supprimer.gif" alt="<?php echo $this->__('listerBaliseIgnore_supprimer'); ?>" /></a>
							</td>
						</tr>
							
						
					</tbody>
				</table>

				<div class="accordion" id="accordion1"></div>

			</div>
		</div>
	</div>
</div>