<div class="liveoptim">
	<?php $acheteur = $isCompteActifSurServeur;  ?>
	<?php $expire = $isCompteExpire;  ?>
<?php if ( $is_file_get_contents_disable ) { ?>
	<div style="background:none repeat scroll 0 0 #FF4040;color:white;display:block;margin:10px 0;padding:5px;text-align:center;width:800px;">
		The <em>file_get_contents ()</em> PHP function is disabled in the server configuration : <strong>allow_url_fopen=0</strong><br />
		You need to activate this function in order to run LiveOptim.
	</div>
	
<?php } ?>
				
	<br />			
	
	<?php $acheteur = $isCompteActifSurServeur;  ?>
	<?php $expire = $isCompteExpire;  ?>
	
	<div id="j-main-container" class="span10" style="width: 100%;">
		<div class="clearfix"></div>
		<h2>
		<?php echo __('menu_config'); ?>
		
		<img class="picto_actif" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/actif.png" title="<?php echo __('accueil_copte_client_actif'); ?>" alt="<?php echo __('accueil_copte_client_actif'); ?>"/>
		
		

		
		</h2>
		<br />
			<div style="width: 50%;border-right: 1px solid #D8D8D8; float:left">
				<!--<div style="padding-left:10%">-->
				<div style="padding-left:10%">
					<table style="padding-top: 45px;">
						<tr>
							<td style="padding-left: 40px">
								<strong>LiveOptim  :</strong><img class="hint" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/hint.png" alt="?" onmouseover="fenetre1LiveoptimOuvrir();" onmouseout="fenetre1LiveoptimFermer();" />
								&nbsp;&nbsp;&nbsp;&nbsp;
								<div id="fenetre1Liveoptim" style="display:none">
									<?php echo $this->__('hintPattern_config',Mage::getBaseUrl('skin').'adminhtml/base/default/img/hint.png'); ?>
								</div>
							</td>
							<td style="padding-left: 30px; vertical-align: center">
							<?php if ( $isON == false ) { ?>
								<a href="<?php echo Mage::helper('adminhtml')->getUrl("liveoptim/adminhtml_liveoptim/modifconfig",array('on'=>1))?>"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/off.png" alt="off" style="width: 45px"></a>
							<?php } else { ?>
								<a href="<?php echo Mage::helper('adminhtml')->getUrl("liveoptim/adminhtml_liveoptim/modifconfig",array('on'=>2))?>"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/on.png" alt="on" style="width: 45px"></a>
							<?php } ?>
							</td></tr>
					</table>
									
				<?php if ($isON) { ?>
					<table style="padding-top: 30px" class="table table-striped">
						<thead>
							<tr>
								<th class="structure nowrap center">
									<?php echo $this->__('config_limite_capping');?> 
									<img class="hint" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/hint.png" alt="?" onmouseover="fenetre4LiveoptimOuvrir();" onmouseout="fenetre4LiveoptimFermer();" />
									<div id="fenetre4Liveoptim" style="display:none">
										<?php echo $this->__('hintPattern_config_limite',Mage::getBaseUrl('skin').'adminhtml/base/default/img/hint.png'); ?>
									</div>
								</th>
								<th width="100px" class="action nowrap center"><?php echo $this->__('listerBaliseIgnore_action');"listerpatern cible" ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								
									<input name="form_key" type="hidden" value="<?php echo Mage::getSingleton('core/session')->getFormKey() ?>"  />
									<td class="page"><input name="valcap" type="text" value="<?php echo $capping ?>"/></td>
									<td class="action"><input class="ajouter" value="<?php echo $this->__('listerPatternCible_modifier'); ?>" type="button" onClick="fenetreInfoPreniumOuvrir()"/></td>
								
							</tr>
						</tbody> 
					</table>
					
				<?php } ?>
				<br />
					<form action="<?php echo Mage::helper('adminhtml')->getUrl("liveoptim/adminhtml_liveoptim/modifconfig",array('exp'=>'1'))?>" method="post">
						<input name="form_key" type="hidden" value="<?php echo Mage::getSingleton('core/session')->getFormKey() ?>"  />
						<table>
							<tr>
								<td>
									<span style="font-size:14px;font-weight:bold"><?php echo $this->__('config_backup_title'); ?></span><img class="hint" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/hint.png" alt="?" onmouseover="fenetre5LiveoptimOuvrir();" onmouseout="fenetre5LiveoptimFermer();" /><br />
									<div id="fenetre5Liveoptim" style="display:none">
										<?php echo $this->__('hintPattern_config_csv',Mage::getBaseUrl('skin').'adminhtml/base/default/img/hint.png'); ?></div>
									</div>
								</td>
							</tr>
							<tr>
								<td style="padding-left:20px">
									<span><?php  echo $this->__('config_export_csv'); ?></span>
									<div id="div_chck" style="padding-top:10px">
										<label class="label" for="checkbox1"><?php  echo $this->__('menu_baliseignorer'); ?></label><br />
										<label class="label" for="checkbox2"><?php  echo $this->__('menu_config'); ?></label><br />
										<input style="margin-right:5px" type="checkbox" name="2" id="checkbox3" checked><label for="checkbox3"><?php  echo $this->__('menu_motcle');?></label><br />
										<label class="label" for="checkbox4"><?php  echo $this->__('menu_pages_restreintes');?></label><br />
										<label class="label" for="checkbox5"><?php  echo $this->__('menu_pattern'); ?></label><br />
										<label class="label" for="checkbox5"><?php  echo $this->__('menu_patterncible'); ?></label>
									</div>
								</td>
							</tr>
							<tr>
								<td style="padding-left:50px;padding-top:10px">
									<input type="submit" value="<?php echo $this->__('config_bouton_export') ?>" name="Export-CSV">
									<?php if(isset($zip)){?>
										<a target="_blank" href="<?='/'.$zip; ?>"><img alt="ddl zip" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/DL.png" style="width: 45px"></a>
									<?php } else if(is_dir("zip")){ 					
											$handle=opendir("zip");
											while (false !== ($fichier = readdir($handle))) {
												if (($fichier != ".") && ($fichier != "..")) {
												@unlink("zip/".$fichier);
												}
											}
											@unlink("BackupBDD.zip");
										} ?>
								</td>
							</tr>
						</table>
						
						<br /><br />
						
						<br />
						
						
					</form>
				</div>
			</div>
			</div>
				<!--</div>-->
			<div>	
				<center>
					<form action="<?php echo Mage::helper('adminhtml')->getUrl("liveoptim/adminhtml_liveoptim/modifconfig",array('sql'=>'1'))?>" method="post">
						<table style="float: right; width: 40%;">
							<tr>
								<td style="width:220px">
									<?php echo $this->__('config_backup_sql');?>  <img class="hint" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/hint.png" alt="?" onmouseover="fenetre6LiveoptimOuvrir();" onmouseout="fenetre6LiveoptimFermer();" />
					
									<div id="fenetre6Liveoptim" style="display:none">
										<?php echo $this->__('hintPattern_config_Export',Mage::getBaseUrl('skin').'adminhtml/base/default/img/hint.png'); ?>
									</div>
					
								</td>
								
								<td>
									<input name="form_key" type="hidden" value="<?php echo Mage::getSingleton('core/session')->getFormKey() ?>"  />
									<input type="submit" value="SQL" name="Export-SQL">
								</td>
								<td>
										<?php if(isset($res)&& $res!=""){?>
											<a target="_blank" href="<?php echo $res?>"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/DL.png" alt="download" style="width: 45px"></a>
										<?php 
											unset($res);
										}?>
									
								</td>
								
							</tr>
						</table>
					</form>
					<div id="fenetreInfoPrenuim">
						<?php echo __('hintPrenium'); ?>
					</div>
					<form name="import_import" action="<?php echo Mage::helper('adminhtml')->getUrl("liveoptim/adminhtml_liveoptim/modifconfig",array('imp'=>'1'))?>" method="POST" enctype="multipart/form-data" onSubmit="return verifFile('<?php  echo $this->__('config_fichier_vide'); ?>',' <?php echo $this->__('config_fichier_ncsv');?>','<?php  echo $this->__('config_fichier_nzip'); ?>',document.getElementsByName('fichier_up')[0].value,document.getElementsByName('quoi')[0].value);">
						<input name="form_key" type="hidden" value="<?php echo Mage::getSingleton('core/session')->getFormKey() ?>"  />
						<table style="float: right; width: 40%; padding-top: 50px">
							<tr>
								<td><span style="font-size:14px;font-weight:bold"><?php echo $this->__('config_import_title') ?></span></td>
							</tr>
							<tr>
								<td style="padding-left:20px" ><?php echo $this->__('config_importation');?></td>
								<td>
									<SELECT name="quoi">
										<OPTION VALUE=2><?php echo $this->__('menu_motcle'); ?>
										<option value="6">ZIP</option>
										<OPTION VALUE=7>SQL
									</SELECT>
								</td>
							</tr>
							<tr>
								<td style="padding-left:20px" ><?php echo $this->__('config_table_file'); ?></td>
								<td>
									<input type="file" name="fichier_up" onchange="" />
									<input type="hidden" name="MAX_FILE_SIZE" value="9999999999">
								</td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" value='<?php echo $this->__('config_import_validation') ?>'></td>
							</tr>
						</table>
					</form><br />
					<br />
						<table style="float: right; width: 40%; padding-top: 50px">
							<tr>
								<td>
									<span style="font-size:14px;font-weight:bold"><?php echo __('COM_LIVEOPTIM_CACHE_TITRE') ?></span>
								</td>
							<tr>
							<tr>
								<td>
									<p>
										<?php echo __('COM_LIVEOPTIM_CACHE_TEXT') ?>
									</p>
									<input type="button" onClick="fenetreInfoPreniumOuvrir()" style="display:inline-block;margin:10px 36px 0 106px;font-size: 16px ;background-color: #FE2E2E;color: #EFFBF2" value="<?php echo __('COM_LIVEOPTIM_BTN_CACHE_ACTIV'); ?>"/>
															
						
									<input name="form_key" type="hidden" value="<?php echo Mage::getSingleton('core/session')->getFormKey() ?>"  />
									<input type="button" onClick="fenetreInfoPreniumOuvrir()" name="Vide cache" value="<?php echo __('COM_LIVEOPTIM_BTN_CACHE_VIDE')?>">
								</td>
							</tr>
						</table>
					
				</center>			
			</div>
			<div style="clear:both"></div>
	<p style="font-size: 14px; font-weight: bold; margin-left: 100px; width: 200px;">
		Copyright 2012
	</p>
</div>