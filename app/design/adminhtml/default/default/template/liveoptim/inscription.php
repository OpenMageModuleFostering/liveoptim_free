<?php

/**
 *
 * LiveOptim - Optimize the content of your articles and automatically tickets to easily improve your position in the results of search engines: Google, Baidu, Yandex, Bing ... 
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.htm
 * Copyright (C) 2012 Erwan MILBEO — All rights reserved
 * For more information see the README
 * Any question will find answer on  
 * [support@liveoptim.com](mailto:support@liveoptim.com)
 * our Timelines : [US-EN](https://twitter.com/LiveOptim_US) | [FR](https://twitter.com/LiveOptim_FR) | [ES](https://twitter.com/LiveOptim_ES)
 *
*/

?>
<br />
<h2>
	<?php echo __('inscription_titre'); ?>
	
		
	<img class="picto_inactif" src="<?php echo Mage::getBaseUrl('skin').'adminhtml/base/default' ?>/img/inactif.png" title="<?php echo __('accueil_compte_client_inactif'); ?>" alt="<?php echo __('accueil_compte_client_inactif'); ?>"/>			
	
</h2>

<div style="margin-top:20px">

<?php echo __('inscription_texte');$lang = Mage::getSingleton('adminhtml/session')->getLocale();?>
<br /><br />

	<form id="insciption" action="<?php echo Mage::helper('adminhtml')->getUrl("liveoptim/adminhtml_liveoptim/inscription")?>" method="post" style="width:350px">
		<input name="form_key" type="hidden" value="<?php echo Mage::getSingleton('core/session')->getFormKey() ?>"  />
		<?php	if(isset($erreur)){ ?>
		<div style="color:red;margin:0 auto;font-weight: bold;text-align: center;"><?php echo __($erreur); ?></div><br /><br />
<?php 	} ?>
		<input type="hidden" name="url" value="<?php echo $_SERVER['HTTP_HOST']?>"/>
		<label style="width: 200px; display: inline-block;padding-left:30px" for="url"><?php echo __('inscription_url')?></label><input style="width" type="text" name="url" value="<?php echo $_SERVER['HTTP_HOST']?>" disabled /><br />
		<label style="width: 200px; display: inline-block;padding-left:30px" for="mail"><?php echo __('inscription_email')?></label><input type="email" name="mail" /><br />
		<label style="width: 200px; display: inline-block;padding-left:30px" for="pass"><?php echo __('inscription_pass')?></label><input type="password" name="pass" /><br />        <label style="width: 200px; display: inline-block;padding-left:30px" for="lang"><?php echo __('inscription_lang')?></label>		<select name="lang" >		  <option <?php echo ($lang=="en_US" || $lang=="en_GB")?'selected="selected"':'' ?>value="us">English</option>		  <option <?php echo ($lang=="fr_FR")?'selected="selected"':'' ?> value="fr">French</option>		  <option <?php echo ($lang=="pt_BR")?'selected="selected"':'' ?>value="pt">Brazilian Portuguese</option>		  <option <?php echo ($lang=="es_ES")?'selected="selected"':'' ?>value="es">Spanish</option>		</select>
		<input style="display: block; margin: 10px 136px;" type="submit" name="btnInscription" value="<?php echo __('inscription_btnInscrip') ?>" />
	</form>
</div>