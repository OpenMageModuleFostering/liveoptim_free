<?php

$prefix = Mage::getConfig()->getTablePrefix();

$installer = $this;

$installer->startSetup();

$installer->run("

DROP TABLE IF EXISTS `".$prefix."liveoptim_balise_ignore`;
CREATE TABLE IF NOT EXISTS `".$prefix."liveoptim_balise_ignore` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`nom` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

INSERT INTO ".$prefix."liveoptim_balise_ignore (id,nom) VALUES
(1,'a'),(2,'h1'),(3,'h2'),(4,'h3'),(5,'h4'),(6,'h5'),
(7,'h6'),(8,'strong'),(9,'em'),(10,'u'),(11,'i'),
(12,'b'),(13,'embed'),(14,'object'),(15,'style');

DROP TABLE IF EXISTS `".$prefix."liveoptim_mot_cle`;
CREATE TABLE IF NOT EXISTS `".$prefix."liveoptim_mot_cle` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`requete` varchar(255) NOT NULL,
	`destination` varchar(255) NOT NULL,
	`position` int(10) unsigned NOT NULL,
	PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `".$prefix."liveoptim_capping`;
CREATE TABLE IF NOT EXISTS `".$prefix."liveoptim_capping` (
	`id` int(1) NOT NULL,
	`capping` varchar(255) NOT NULL,
	`marche` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);
INSERT INTO `".$prefix."liveoptim_capping` (id,capping,marche) VALUES
(1,'3','1');

DROP TABLE IF EXISTS `".$prefix."liveoptim_parametres`;
CREATE TABLE IF NOT EXISTS `".$prefix."liveoptim_parametres` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`cle` varchar(255) NOT NULL,
	`valeur` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

INSERT INTO `".$prefix."liveoptim_parametres` (id,cle,valeur) VALUES
(3,'certificat_mkt_jour',''),(4,'tentative_maj_nb','0'),
(5,'tentative_maj_date','2012-01-01 00:00:00'),
(6,'version','1.0.0'),(8,'inscription','0')
;

");

$installer->endSetup(); 
