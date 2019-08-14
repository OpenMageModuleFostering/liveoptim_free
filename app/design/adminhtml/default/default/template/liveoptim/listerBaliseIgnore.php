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
	<?php echo __('listerBaliseIgnore_titre'); ?>
	
	<img class="hint" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/hint.png" alt="?" onmouseover="fenetreLiveoptimOuvrir();" onmouseout="fenetreLiveoptimFermer();" />
		
	
		<img class="picto_actif" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/actif.png" title="<?php echo __('accueil_copte_client_actif'); ?>" alt="<?php echo __('accueil_copte_client_actif'); ?>"/>
	

	<div id="fenetreLiveoptim">
		<?php echo __('hintBaliseIgnore',Mage::getBaseUrl('skin').'adminhtml/base/default/img/hint.png'); ?>
	</div>
</div>
</h2>
<?php echo __('listerBaliseIgnore_text1'); ?>

<div id="lo_content">
<table class="wp-list-table widefat fixed posts" cellspacing="0">
	<thead>
		<tr>
			<th class="nom"><?php echo __('listerBaliseIgnore_nom'); ?><img class="hint" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/hint.png" alt="?" onmouseover="fenetre1LiveoptimOuvrir();" onmouseout="fenetre1LiveoptimFermer();" />
	
	<div id="fenetre1Liveoptim" style="display:none">
		<?php echo $this->__('hintBaliseIgnore',Mage::getBaseUrl('skin').'adminhtml/base/default/img/hint.png'); ?></div>
	</div></th>
			<th class="action"><?php echo __('listerBaliseIgnore_action'); ?></th>
		</tr>
	</thead>
	<div id="fenetreInfoPrenuim">
		<?php echo __('hintPrenium'); ?>
	</div>
	<tbody>
		<tr>
			<td class="nom"><input name="nom" type="text" /></td>
			<td class="action"><input class="ajouter" value="<?php echo __('listerBaliseIgnore_ajouter'); ?>" type="button"  onclick="fenetreInfoPreniumOuvrir()"/></td>
		</tr>

	<?php foreach ( $listeBaliseIgnorer as $lBaliseIgnore ) { ?>
		<tr>
			<td class="nom"><?php echo $lBaliseIgnore['nom']; ?></td>
			<td class="action">
				<a href="#" onclick="fenetreInfoPreniumOuvrir()"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/modifier.gif" alt="<?php echo __('listerBaliseIgnore_modifier'); ?>" /></a>
				<a href="#" onclick="fenetreInfoPreniumOuvrir()"><img src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/supprimer.gif" alt="<?php echo __('listerBaliseIgnore_balises_supprimer'); ?>" /></a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>

<br />
<p>
	Copyright 2012
</p>
</div>