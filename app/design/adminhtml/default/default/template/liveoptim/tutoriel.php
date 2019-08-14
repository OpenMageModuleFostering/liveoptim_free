<div class="liveoptim">
<?php /*<div id="icon-options-general" class="icon32"></div>*/ ?>

<?php if ( $is_file_get_contents_disable ) { ?>
	<div style="background:none repeat scroll 0 0 #FF4040;color:white;display:block;margin:10px 0;padding:5px;text-align:center;width:800px;">
		The <em>file_get_contents ()</em> PHP function is disabled in the server configuration : <strong>allow_url_fopen=0</strong><br />
		You need to activate this function in order to run LiveOptim.
	</div>
<?php } ?>
	
<h2>
	<?php echo __('tutoriel_titre'); ?>

		
	
		<img class="picto_actif" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/actif.png" title="<?php echo __('accueil_copte_client_actif'); ?>" alt="<?php echo ('accueil_copte_client_actif'); ?>"/>
	
</h2>
<br />

	<br /><br />
<div id="lo_content">
<p>
		<?php echo __('COM_LIVEOPTIM_TUTO'); ?>
</p>
</div>