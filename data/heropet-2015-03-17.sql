/*
SQLyog Ultimate v8.55 
MySQL - 5.6.17 : Database - heropet
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`heropet` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `heropet`;

/*Table structure for table `pet_cms_attachment` */

DROP TABLE IF EXISTS `pet_cms_attachment`;

CREATE TABLE `pet_cms_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contentId` int(10) unsigned NOT NULL,
  `filename` varchar(255) NOT NULL,
  `extension` varchar(50) NOT NULL,
  `mimeType` varchar(255) NOT NULL,
  `byteSize` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contentId` (`contentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pet_cms_attachment` */

/*Table structure for table `pet_cms_content` */

DROP TABLE IF EXISTS `pet_cms_content`;

CREATE TABLE `pet_cms_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nodeId` int(10) unsigned NOT NULL,
  `locale` varchar(50) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `body` longtext,
  `css` longtext,
  `url` varchar(255) DEFAULT NULL,
  `pageTitle` varchar(255) DEFAULT NULL,
  `breadcrumb` varchar(255) DEFAULT NULL,
  `metaTitle` varchar(255) DEFAULT NULL,
  `metaDescription` varchar(255) DEFAULT NULL,
  `metaKeywords` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contentId_locale` (`nodeId`,`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `pet_cms_content` */

insert  into `pet_cms_content`(`id`,`nodeId`,`locale`,`heading`,`body`,`css`,`url`,`pageTitle`,`breadcrumb`,`metaTitle`,`metaDescription`,`metaKeywords`) values (1,1,'en_us','About Us','This is for testing','','about-us','About Us','','','','');

/*Table structure for table `pet_cms_node` */

DROP TABLE IF EXISTS `pet_cms_node`;

CREATE TABLE `pet_cms_node` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  `parentId` int(10) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name_deleted` (`name`,`deleted`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `pet_cms_node` */

insert  into `pet_cms_node`(`id`,`created`,`updated`,`parentId`,`name`,`deleted`) values (1,'2015-03-16 16:30:17','2015-03-16 19:13:24',0,'foo',0);

/*Table structure for table `pet_master_role` */

DROP TABLE IF EXISTS `pet_master_role`;

CREATE TABLE `pet_master_role` (
  `Master_Role_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Role_Code` varchar(45) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `is_Admin` enum('0','1') NOT NULL DEFAULT '0',
  `Active` bit(1) DEFAULT NULL,
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Rowversion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Role_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pet_master_role` */

insert  into `pet_master_role`(`Master_Role_ID`,`Role_Code`,`Description`,`is_Admin`,`Active`,`Created_Date`,`Rowversion`) values (1,'ADM','Admin','0','','2015-02-14 13:55:09','0000-00-00 00:00:00');

/*Table structure for table `pet_user` */

DROP TABLE IF EXISTS `pet_user`;

CREATE TABLE `pet_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_wipo_user_role` (`role`),
  CONSTRAINT `FK_wipo_user_role` FOREIGN KEY (`role`) REFERENCES `pet_master_role` (`Master_Role_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pet_user` */

insert  into `pet_user`(`id`,`username`,`name`,`password_hash`,`password_reset_token`,`email`,`role`,`status`,`created_at`,`updated_at`) values (1,'admin','Admin','c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec',NULL,'arivu.sacs@gmail.com',1,1,1413526995,1424063457),(2,'nadesh','Nadesh','8fa1b3da163c0c6042d2f6a9b46c785ba5de41266fefe8ac81c341a9255797c889b632bb5d69a12f8747bdfa15deb7ffee9e67738ca50787a6193ed6aacecc46',NULL,'nadesh@arkinfotec.com',1,1,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
