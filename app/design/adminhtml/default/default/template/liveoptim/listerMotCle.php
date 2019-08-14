<div class="liveoptim">
<?php if ( $is_file_get_contents_disable ) { ?>
	<div style="background:none repeat scroll 0 0 #FF4040;color:white;display:block;margin:10px 0;padding:5px;text-align:center;width:800px;">
		The <em>file_get_contents ()</em> PHP function is disabled in the server configuration : <strong>allow_url_fopen=0</strong><br />
		You need to activate this function in order to run LiveOptim.
	</div>
<?php } ?>

<br />	
<h2>
	
	<?php echo __('listerMotCle_titre');?>
	
	<img class="hint" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/hint.png" alt="?" onmouseover="fenetreLiveoptimOuvrir();" onmouseout="fenetreLiveoptimFermer();" />
		
	
		<img class="picto_actif" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default/img' ?>/actif.png" title="<?php echo $this->__('accueil_copte_client_actif'); ?>" alt="<?php echo $this->__('accueil_copte_client_actif'); ?>"/>
	
	<div id="fenetreLiveoptim" style="display:none">
		<?php echo $this->__('hintMotCle',Mage::getBaseUrl('skin').'adminhtml/base/default/img/hint.png'); ?></div>
	</div>
</h2>
<?php echo __('listerMotCle_table_requete_text'); ?>

<div style='  text-align: center; padding:0px 0 0px 0; '>
<img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default/img' ?>/fleche_verte.png" />
<img style="margin-left: 72px;" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default/img' ?>/fleche_verte.png" />
<img style="margin-left: 72px;" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default/img' ?>/fleche_verte.png" />



<div id="lo_content">
<table class="wp-list-table widefat fixed posts" style ="margin-left: 240px;" cellspacing="0">
	<thead>
		<tr>
			<th class="requete"><?php echo __('listerMotCle_table_requete'); ?>   <img class="hint" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/hint.png" alt="?" onmouseover="fenetre1LiveoptimOuvrir();" onmouseout="fenetre1LiveoptimFermer();" />
	
	<div id="fenetre1Liveoptim" style="display:none">
		<?php echo $this->__('hintMotCle_requete',Mage::getBaseUrl('skin').'adminhtml/base/default/img/hint.png'); ?></div>
	</div></th>
			<th class="destination"><?php echo $this->__('listerMotCle_table_destination'); ?>  <img class="hint" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/hint.png" alt="?" onmouseover="fenetre2LiveoptimOuvrir();" onmouseout="fenetre2LiveoptimFermer();" />
	
	<div id="fenetre2Liveoptim" style="display:none">
		<?php echo $this->__('hintMotCle_destination',Mage::getBaseUrl('skin').'adminhtml/base/default/img/hint.png'); ?></div>
	</div></th>
			<th class="position"><?php echo $this->__('listerMotCle_table_position'); ?>  <img class="hint" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/hint.png" alt="?" onmouseover="fenetre3LiveoptimOuvrir();" onmouseout="fenetre3LiveoptimFermer();" />
	
	<div id="fenetre3Liveoptim" style="display:none">
		<?php echo $this->__('hintMotCle_position',Mage::getBaseUrl('skin').'adminhtml/base/default/img/hint.png'); ?></div>
	</div></th>
			<th class="action"><?php echo $this->__('listerMotCle_table_action'); ?></th>
		</tr>
	</thead>
	
	<tbody>
		<?php 
				$nb = count($lMotCles);
		?>
		<!--<form action="<?php echo Mage::getUrl('liveoptim/adminhtml_liveoptim/savemotcle') ?>" method="post" onSubmit="<?php echo ( $nb<10 )? "return verifRequetteMotCle('".__('listerMotCle_msg_alert')."')" :" return displayRestriction('".__('COM_LIVEOPTIM_MSG_MOT_CLE')."')"?>" > -->
		<form action="<?php echo Mage::getUrl('liveoptim/adminhtml_liveoptim/savemotcle') ?>" method="post" onSubmit="<?php echo "return verifRequetteMotCle('".__('listerMotCle_msg_alert')."')"?>" >
			<tr>
			
			
				<input name="form_key" type="hidden" value="<?php echo Mage::getSingleton('core/session')->getFormKey() ?>"  />
				<td class="requete"><input name="requete" type="text" /></td>
				<td class="destination"><input name="destination" type="text" /></td>
				<td class="position"><input name="position" type="text" /></td>
				<td class="action"><input class="ajouter" value="<?php echo $this->__('listerMotCle_ajouter'); ?>" type="submit" /></td>
			
					
			</tr>
		</form>
		<?php 
			$i=0;
			foreach ( $lMotCles as $lMotCle ) { 
				if($i>9)break;
		?>
			
			<?php if ( !is_null( $idModifier) && $idModifier == $lMotCle['id'] ) { ?>
			
				<form action="<?php echo Mage::getUrl("liveoptim/adminhtml_liveoptim/motclemodif") ?>" method="post">
					<input name="idModifier" value="<?php echo $lMotCle['id']; ?>" type="hidden" />
					<input name="form_key" type="hidden" value="<?php echo Mage::getSingleton('core/session')->getFormKey() ?>"  />
					<tr>
						<td class="requete"><input name="requete" value="<?php echo $lMotCle['requete']; ?>" type="text" /></td>
						<td class="destination"><input name="destination" value="<?php echo $lMotCle['destination']; ?>" type="text" /></td>
						<td class="position"><input name="position" value="<?php echo $lMotCle['position']; ?>" type="text" /></td>
						<td class="action">
							<input class="modifier" value="<?php echo $this->__('listerMotCle_modifier'); ?>" type="submit" />
							<a href="<?php echo Mage::helper('adminhtml')->getUrl('liveoptim/adminhtml_liveoptim/motcleenlever',array('id'=>$lMotCle['id']))?>" onclick="return confirm('<?php echo $this->__('listerMotCle_confirmation_suppression'); ?>');"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default/img' ?>/supprimer.gif" alt="<?php echo $this->__('listerMotCle_supprimer'); ?>" /></a>
						</td>
					</tr>
				</form>
				
			<?php } else { ?>
			
				<tr>
					<td class="requete"><?php echo $lMotCle['requete']; ?></td>
					<td class="destination"><?php echo $lMotCle['destination']; ?></td>
					<td class="position">
						<a href="<?php echo Mage::helper('adminhtml')->getUrl("liveoptim/adminhtml_liveoptim/motcledeplacer",array('id'=>$lMotCle['id'],'position'=>$lMotCle['position'] - 1))?>"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default/img' ?>/fleche-haut.gif" alt="<?php echo $this->__('listerMotCle_monter'); ?>" /></a>
						<span><?php echo $lMotCle['position']; ?></span>
						<a href="<?php echo Mage::helper('adminhtml')->getUrl("liveoptim/adminhtml_liveoptim/motcledeplacer",array('id'=>$lMotCle['id'],'position'=>$lMotCle['position'] + 1))?>"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default/img' ?>/fleche-bas.gif" alt="<?php echo $this->__('listerMotCle_descendre'); ?>" /></a>
					</td>
					<td class="action">
						<a href="<?php echo Mage::helper("adminhtml")->getUrl('liveoptim/adminhtml_liveoptim/motcle',array('idModifier'=>$lMotCle['id']))?>"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default/img' ?>/modifier.gif" alt="<?php echo $this->__('listerMotCle_modifier'); ?>" /></a>
						<a href="<?php echo Mage::helper('adminhtml')->getUrl('liveoptim/adminhtml_liveoptim/motcleenlever',array('id'=>$lMotCle['id']))?>" onclick="return confirm('<?php echo $this->__('listerMotCle_confirmation_suppression'); ?>');"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default/img' ?>/supprimer.gif" alt="<?php echo $this->__('listerMotCle_supprimer'); ?>" /></a>
					</td>
				</tr>
				
			<?php } ?>
			
		<?php 
				$i++;
			} ?>
	</tbody>
</table>
<br />
<p>
	Copyright 2012
</p>
</div>