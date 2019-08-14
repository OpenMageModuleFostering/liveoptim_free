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
<h2>
	<?php echo __('listerPatternCible_titre'); ?>

	<img class="hint" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/hint.png" alt="?" onmouseover="fenetreLiveoptimOuvrir();" onmouseout="fenetreLiveoptimFermer();" />
		
	<img class="picto_actif" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/actif.png" title="<?php echo __('accueil_copte_client_actif'); ?>" alt="<?php echo __('accueil_copte_client_actif'); ?>"/>
	
	
	
	<div id="fenetreLiveoptim">
		<?php echo __('hintPattern',Mage::getBaseUrl('skin').'adminhtml/base/default/img/hint.png'); ?></div>
	</div>	
</h2>
<?php echo __('listerPatternCible_text'); ?> 

<div id="lo_content">
<p class="parametrage">
<?php echo __('listerPatternCible_boucler'); ?> 
<?php echo __('listerPatternCible_non'); ?>
 <a href="#" onclick="fenetreInfoPreniumOuvrir()"><?php echo __('modifier');?></a>
</p>

<div id="dispoPrenium"><span><?php echo __('hintPrenium'); ?></span></div>
<table style="width: 500px;" cellspacing="0">
	<thead>
		<tr>
			<th class="structure"><?php echo __('listerPatternCible_table_structure'); ?>  <img class="hint" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/hint.png" alt="?" onmouseover="fenetre1LiveoptimOuvrir();" onmouseout="fenetre1LiveoptimFermer();" />
	
			<div id="fenetre1Liveoptim" style="display:none">
				<?php echo $this->__('hintPattern_cible_structure',Mage::getBaseUrl('skin').'adminhtml/base/default/img/hint.png'); ?></div>
			</div>
			<div id="fenetreInfoPrenuim">
				<?php echo __('hintPrenium'); ?>
			</div>
			</th>
			<th class="position"><?php echo __('listerPatternCible_table_position'); ?></th>
			<th class="action"><?php echo __('listerPatternCible_table_action'); ?></th>
		</tr>
	</thead>
	
	<tbody>
		<tr>
			<td class="structure"><?php echo Mage::helper('liveoptim')->colorisation( htmlentities( '<strong>{mc}</strong>' )); ?></td>
			<td class="position">
				<a href="#" onClick="fenetreInfoPreniumOuvrir()"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/fleche-haut.gif" alt="<?php echo __('listerPatternCible_monter'); ?>" /></a>
				<span>1</span>
				<a href="#" onClick="fenetreInfoPreniumOuvrir()"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/fleche-bas.gif" alt="<?php echo __('listerPatternCible_descendre'); ?>" /></a>
			</td>
			<td class="action">
				<a href="#" onClick="fenetreInfoPreniumOuvrir()"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/modifier.gif" alt="<?php echo __('listerPatternCible_modifier'); ?>" /></a>
				<a href="#" onClick="fenetreInfoPreniumOuvrir()"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/supprimer.gif" alt="<?php echo __('listerPatternCible_supprimer'); ?>" /></a>
			</td>
		</tr>
		<tr>
			<td class="structure"><?php echo Mage::helper('liveoptim')->colorisation( htmlentities( '<em>{mc}</em>' )); ?></td>
			<td class="position">
				<a href="#" onClick="fenetreInfoPreniumOuvrir()"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/fleche-haut.gif" alt="<?php echo __('listerPatternCible_monter'); ?>" /></a>
				<span>2</span>
				<a href="#" onClick="fenetreInfoPreniumOuvrir()"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/fleche-bas.gif" alt="<?php echo __('listerPatternCible_descendre'); ?>" /></a>
			</td>
			<td class="action">
				<a href="#" onClick="fenetreInfoPreniumOuvrir()"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/modifier.gif" alt="<?php echo __('listerPatternCible_modifier'); ?>" /></a>
				<a href="#" onClick="fenetreInfoPreniumOuvrir()"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/supprimer.gif" alt="<?php echo __('listerPatternCible_supprimer'); ?>" /></a>
			</td>
		</tr>
	
		<tr>
			<td class="structure"><?php echo Mage::helper('liveoptim')->colorisation( htmlentities( '{mc}' )); ?></td>
			<td class="position">
				<a href="#" onClick="fenetreInfoPreniumOuvrir()"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/fleche-haut.gif" alt="<?php echo __('listerPatternCible_monter'); ?>" /></a>
				<span>3</span>
				<a href="#" onClick="fenetreInfoPreniumOuvrir()"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/fleche-bas.gif" alt="<?php echo __('listerPatternCible_descendre'); ?>" /></a>
			</td>
			<td class="action">
				<a href="#" onClick="fenetreInfoPreniumOuvrir()"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/modifier.gif" alt="<?php echo __('listerPatternCible_modifier'); ?>" /></a>
				<a href="#" onClick="fenetreInfoPreniumOuvrir()"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/supprimer.gif" alt="<?php echo __('listerPatternCible_supprimer'); ?>" /></a>
			</td>
		</tr>
		<tr>
			<td class="structure"><?php echo Mage::helper('liveoptim')->colorisation( htmlentities( '{mc}' )); ?></td>
			<td class="position">
				<a href="#" onClick="fenetreInfoPreniumOuvrir()"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/fleche-haut.gif" alt="<?php echo __('listerPatternCible_monter'); ?>" /></a>
				<span>4</span>
				<a href="#" onClick="fenetreInfoPreniumOuvrir()"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/fleche-bas.gif" alt="<?php echo __('listerPatternCible_descendre'); ?>" /></a>
			</td>
			<td class="action">
				<a href="#" onClick="fenetreInfoPreniumOuvrir()"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/modifier.gif" alt="<?php echo __('listerPatternCible_modifier'); ?>" /></a>
				<a href="#" onClick="fenetreInfoPreniumOuvrir()"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/supprimer.gif" alt="<?php echo __('listerPatternCible_supprimer'); ?>" /></a>
			</td>
		</tr>
	</tbody>
</table>
<br />
<p>
	Copyright 2012
</p>
</div>