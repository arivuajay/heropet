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
/*Table structure for table `pet_ad_package` */

DROP TABLE IF EXISTS `pet_ad_package`;

CREATE TABLE `pet_ad_package` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(100) NOT NULL,
  `package_cost` decimal(10,2) NOT NULL,
  `package_days` varchar(50) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `pet_ad_package` */

insert  into `pet_ad_package`(`package_id`,`package_name`,`package_cost`,`package_days`,`sort_order`,`created`,`updated`) values (1,'+10KM','10.00',NULL,0,'2015-03-28 00:00:00','2015-03-28 00:00:00'),(2,'+20KM','20.00',NULL,0,'2015-03-28 00:00:00','2015-03-28 00:00:00'),(3,'+50KM','30.00',NULL,0,'2015-03-28 00:00:00','2015-03-28 00:00:00'),(4,'Free(<10KM)','0.00',NULL,0,'2015-03-30 00:00:00','2015-03-30 00:00:00');

/*Table structure for table `pet_breed` */

DROP TABLE IF EXISTS `pet_breed`;

CREATE TABLE `pet_breed` (
  `breed_id` int(11) NOT NULL AUTO_INCREMENT,
  `pet_category_id` int(11) DEFAULT NULL,
  `breed_name` varchar(256) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `update` datetime DEFAULT NULL,
  PRIMARY KEY (`breed_id`),
  KEY `FK_pet_breed` (`pet_category_id`),
  CONSTRAINT `FK_pet_breed` FOREIGN KEY (`pet_category_id`) REFERENCES `pet_category` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pet_breed` */

insert  into `pet_breed`(`breed_id`,`pet_category_id`,`breed_name`,`created`,`update`) values (1,1,'pug','2015-04-06 15:51:57','2015-04-06 15:51:57');

/*Table structure for table `pet_category` */

DROP TABLE IF EXISTS `pet_category`;

CREATE TABLE `pet_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `category_image` text,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pet_category` */

insert  into `pet_category`(`category_id`,`category_name`,`category_image`,`status`,`created`,`updated`) values (1,'Dog',NULL,'1','2015-03-30 13:07:58','2015-03-30 13:07:58'),(2,'Cat',NULL,'1','2015-03-30 13:08:11','2015-03-30 13:08:11');

/*Table structure for table `pet_city` */

DROP TABLE IF EXISTS `pet_city`;

CREATE TABLE `pet_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(100) NOT NULL,
  `pet_state_id` int(11) NOT NULL,
  `pet_country_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`city_id`),
  KEY `FK_pet_city_country` (`pet_country_id`),
  KEY `FK_pet_city_state` (`pet_state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `pet_city` */

insert  into `pet_city`(`city_id`,`city_name`,`pet_state_id`,`pet_country_id`,`created`,`updated`) values (1,'Bengaluru',1,1,'2015-03-27 15:52:46','2015-03-27 15:52:46'),(2,'Madurai',2,1,'2015-03-27 15:55:17','2015-03-27 15:55:17'),(3,'Lübbecke',3,2,'2015-03-27 15:57:14','2015-03-27 15:57:14'),(4,'Chennai',2,1,'2015-03-27 15:58:15','2015-03-27 15:58:15'),(5,'Madison',4,3,'2015-03-30 14:34:00','2015-03-30 14:34:00'),(6,'Shelbyville',5,3,'2015-04-02 12:00:40','2015-04-02 12:00:40'),(7,'Motherwell',6,4,'2015-04-06 18:32:10','2015-04-06 18:32:10');

/*Table structure for table `pet_cms_content` */

DROP TABLE IF EXISTS `pet_cms_content`;

CREATE TABLE `pet_cms_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) DEFAULT NULL,
  `body` longtext,
  `url` varchar(255) DEFAULT NULL,
  `pageTitle` varchar(255) DEFAULT NULL,
  `metaTitle` varchar(255) DEFAULT NULL,
  `metaDescription` varchar(255) DEFAULT NULL,
  `metaKeywords` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `pet_cms_content` */

insert  into `pet_cms_content`(`id`,`heading`,`body`,`url`,`pageTitle`,`metaTitle`,`metaDescription`,`metaKeywords`) values (1,'About Us','This is for testing','about-us','About Us','','','');

/*Table structure for table `pet_country` */

DROP TABLE IF EXISTS `pet_country`;

CREATE TABLE `pet_country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(10) DEFAULT NULL,
  `country_name` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `pet_country` */

insert  into `pet_country`(`country_id`,`country_code`,`country_name`,`created`,`updated`) values (1,'IN','India','2015-03-27 15:52:46','2015-03-27 15:52:46'),(2,'DE','Germany','2015-03-27 15:57:14','2015-03-27 15:57:14'),(3,'US','United States','2015-03-30 14:34:00','2015-03-30 14:34:00'),(4,'ZA','South Africa','2015-04-06 18:32:10','2015-04-06 18:32:10');

/*Table structure for table `pet_lost` */

DROP TABLE IF EXISTS `pet_lost`;

CREATE TABLE `pet_lost` (
  `lost_id` int(11) NOT NULL AUTO_INCREMENT,
  `pet_category_id` int(11) NOT NULL,
  `pet_name` varchar(500) NOT NULL,
  `breed` varchar(500) NOT NULL,
  `eye_color` varchar(50) DEFAULT NULL,
  `furcolor` varchar(50) DEFAULT NULL,
  `sex` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 - Female 1- Male',
  `age` smallint(6) DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `chipped` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 - No 1 - Yes',
  `castrated` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 - No 1 - Yes',
  `sterilized` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 - No 1 - Yes',
  `date_of_missing` datetime NOT NULL,
  `lost_address` text NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `pet_country_id` int(11) DEFAULT NULL,
  `pet_state_id` int(11) DEFAULT NULL,
  `pet_city_id` int(11) DEFAULT NULL,
  `additional_informations` text,
  `reward` decimal(10,2) NOT NULL,
  `pet_user_id` int(11) NOT NULL,
  `pet_ad_package_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 - Inactive 1- Active',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`lost_id`),
  KEY `FK_pet_lost_category` (`pet_category_id`),
  KEY `FK_pet_lost_user` (`pet_user_id`),
  KEY `FK_pet_lost_package` (`pet_ad_package_id`),
  CONSTRAINT `FK_pet_lost_category` FOREIGN KEY (`pet_category_id`) REFERENCES `pet_category` (`category_id`),
  CONSTRAINT `FK_pet_lost_package` FOREIGN KEY (`pet_ad_package_id`) REFERENCES `pet_ad_package` (`package_id`),
  CONSTRAINT `FK_pet_lost_user` FOREIGN KEY (`pet_user_id`) REFERENCES `pet_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `pet_lost` */

insert  into `pet_lost`(`lost_id`,`pet_category_id`,`pet_name`,`breed`,`eye_color`,`furcolor`,`sex`,`age`,`weight`,`chipped`,`castrated`,`sterilized`,`date_of_missing`,`lost_address`,`latitude`,`longitude`,`pet_country_id`,`pet_state_id`,`pet_city_id`,`additional_informations`,`reward`,`pet_user_id`,`pet_ad_package_id`,`status`,`created`,`updated`) values (1,1,'First Pettt','Test Breed','Black','Brown','1',5,'20.00','0','0','0','2015-03-31 00:00:00','9, Jansiranipuram 2nd street, sellur, Madurai, India',9.934832,78.124475,1,2,2,'This is for testing','1500.00',8,4,'1','2015-03-31 18:23:01','2015-04-06 17:02:27'),(2,1,'tiger','grade dane','brown','fawn','0',2,'50.00','0','0','0','2015-04-02 00:00:00','madurai',9.9252007,78.1197754,1,2,2,'','1500.00',8,1,'1','2015-04-03 13:53:22','2015-04-04 13:59:55'),(9,2,'First Pettt','pakii','','','1',NULL,'0.00','0','0','0','2015-04-06 00:00:00','test,madurai-10',9.9369821,78.1449795,1,2,2,'','2000.00',1,3,'1','2015-04-06 18:38:30','2015-04-06 18:38:30');

/*Table structure for table `pet_lost_photo` */

DROP TABLE IF EXISTS `pet_lost_photo`;

CREATE TABLE `pet_lost_photo` (
  `lost_photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `pet_lost_id` int(11) NOT NULL,
  `photos` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`lost_photo_id`),
  KEY `FK_pet_lost_photo` (`pet_lost_id`),
  CONSTRAINT `FK_pet_lost_photo` FOREIGN KEY (`pet_lost_id`) REFERENCES `pet_lost` (`lost_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `pet_lost_photo` */

insert  into `pet_lost_photo`(`lost_photo_id`,`pet_lost_id`,`photos`,`created`,`updated`) values (4,1,'xEisP-Plmpx-dog.jpg','2015-04-06 17:02:27','2015-04-06 17:02:27');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `pet_master_role` */

insert  into `pet_master_role`(`Master_Role_ID`,`Role_Code`,`Description`,`is_Admin`,`Active`,`Created_Date`,`Rowversion`) values (1,'ADM','Admin','1','','2015-02-14 13:55:09','0000-00-00 00:00:00'),(2,'USR','User','0','\0','2015-03-20 13:02:35','0000-00-00 00:00:00');

/*Table structure for table `pet_state` */

DROP TABLE IF EXISTS `pet_state`;

CREATE TABLE `pet_state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_code` varchar(10) DEFAULT NULL,
  `state_name` varchar(100) NOT NULL,
  `pet_country_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`state_id`),
  KEY `FK_pet_state` (`pet_country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `pet_state` */

insert  into `pet_state`(`state_id`,`state_code`,`state_name`,`pet_country_id`,`created`,`updated`) values (1,'KA','Karnataka',1,'2015-03-27 15:52:46','2015-03-27 15:52:46'),(2,'TN','Tamil Nadu',1,'2015-03-27 15:55:17','2015-03-27 15:55:17'),(3,'NRW','Nordrhein-Westfalen',2,'2015-03-27 15:57:14','2015-03-27 15:57:14'),(4,'SD','South Dakota',3,'2015-03-30 14:34:00','2015-03-30 14:34:00'),(5,'TN','Tennessee',3,'2015-04-02 12:00:40','2015-04-02 12:00:40'),(6,'EC','Eastern Cape',4,'2015-04-06 18:32:10','2015-04-06 18:32:10');

/*Table structure for table `pet_user` */

DROP TABLE IF EXISTS `pet_user`;

CREATE TABLE `pet_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_wipo_user_role` (`role`),
  CONSTRAINT `FK_pet_user_role` FOREIGN KEY (`role`) REFERENCES `pet_master_role` (`Master_Role_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pet_user` */

insert  into `pet_user`(`id`,`email`,`password_hash`,`password_reset_token`,`role`,`status`,`created_at`,`updated_at`) values (1,'admin@heropet.com','c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec',NULL,1,1,'2015-03-17 00:00:00','2015-03-19 13:37:17'),(2,'nadesh1@arkinfotec.com','178aeaeaa44f39983a5d01957b5f77da91d9104f390aa2d56076fed58ac567ef3e0f851ea02f4ffce44d21bcc08e9da714a351f00d5aa6c4cb260225ab8fb812',NULL,2,1,'2015-03-27 15:52:47','2015-03-27 15:52:47'),(3,'nadesh2@arkinfotec.com','9069812e3252a4914d5d160e2002c9b2beabed3c5cef5ef651b169a517dd3fc868772b3acd3f480134c89ede0053f8b9559f653af881f3d316cae549c5c0cf27',NULL,2,1,'2015-03-27 15:55:17','2015-03-27 15:55:17'),(4,'nadesh3@arkinfotec.com','502e0faa295a1b91ab881faadcad7585b504da0c68d6df1bc257bc9fc1eb4eb6eca24d6d4c2a3413193240a489bb9cfbac48076b292d36061bda81e965b67e8b',NULL,2,1,'2015-03-27 15:57:14','2015-03-27 15:57:14'),(5,'nadesh4@arkinfotec.com','d545a346c72df057eff58ef485c6aa7b6b8da552b93740a4707eb9647bbca0329d220f36c9b7827762dc79918a4ee276d721591bfc5331719df90774fea375df',NULL,2,1,'2015-03-27 15:58:15','2015-03-27 15:58:15'),(6,'nadesh@arkinfotec.com','8000191e8d20d812c25c97a9bd6a50c29a1a915c400c4daffbb2c261ac5744c3d325e91c9ff010ddb1be6ce887965d36b36c48f254e1c97f0a0dd948fb42149e',NULL,2,1,'2015-03-27 15:59:12','2015-03-27 15:59:12'),(8,'stanley.vasu@arkinfotec.com','3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79','',2,1,'2015-04-02 12:05:49','2015-04-02 18:50:58');

/*Table structure for table `pet_user_profile` */

DROP TABLE IF EXISTS `pet_user_profile`;

CREATE TABLE `pet_user_profile` (
  `user_profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `pet_user_id` int(11) NOT NULL,
  `user_first_name` varchar(100) NOT NULL,
  `user_last_name` varchar(100) DEFAULT NULL,
  `user_address` text NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `pet_country_id` int(11) DEFAULT NULL,
  `pet_state_id` int(11) DEFAULT NULL,
  `pet_city_id` int(11) DEFAULT NULL,
  `user_phone` varchar(100) DEFAULT NULL,
  `user_mobile` varchar(100) DEFAULT NULL,
  `user_profile_picture` text,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`user_profile_id`),
  KEY `FK_pet_user_profile` (`pet_user_id`),
  KEY `FK_pet_user_profile_country` (`pet_country_id`),
  KEY `FK_pet_user_profile_state` (`pet_state_id`),
  CONSTRAINT `FK_pet_user_profile` FOREIGN KEY (`pet_user_id`) REFERENCES `pet_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `pet_user_profile` */

insert  into `pet_user_profile`(`user_profile_id`,`pet_user_id`,`user_first_name`,`user_last_name`,`user_address`,`latitude`,`longitude`,`pet_country_id`,`pet_state_id`,`pet_city_id`,`user_phone`,`user_mobile`,`user_profile_picture`,`created`,`updated`) values (1,2,'Nadesh','S','71, Cunningham Road, Bangalore – 560052, INDIA',12.9906064,77.5881959,1,1,1,'123456789','123456789','a0jLR-300-300.png','2015-03-27 15:52:47','2015-03-27 15:52:47'),(2,3,'Nadesh','S','9, Jansiranipuram 2nd street, Sellur, Madurai, Tamilnadu, India',9.934832,78.124475,1,2,2,'123456789','123456789','','2015-03-27 15:55:17','2015-03-27 15:55:17'),(3,4,'Nadesh','S','241  Margaret M. Norris  Obermehner Weg 58  Lübbecke, 32312',52.2936898,8.5969028,2,3,3,'123456789','123456789','','2015-03-27 15:57:14','2015-03-27 15:57:14'),(4,5,'Nadesh','S','26/1, Mahathma Gandhi Road, Chennai  600034',13.0635744,80.2437162,1,2,4,'123456789','123456789','','2015-03-27 15:58:15','2015-03-27 15:58:15'),(5,6,'Nadesh1','S1','9, Jansiranipuram 2nd street, Sellur, Madurai, Tamilnadu, India',9.934832,78.124475,1,2,2,'123456789','123456789','ayqp1-1_1.png','2015-03-27 15:59:12','2015-03-28 19:39:04'),(7,8,'stan','lee','tn',35.5174913,-86.5804473,3,5,6,'987654321','987654321','vYi37-house711.jpg','2015-04-02 12:05:49','2015-04-02 12:05:49');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
