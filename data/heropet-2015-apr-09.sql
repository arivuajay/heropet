-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2015 at 10:28 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `heropet`
--

-- --------------------------------------------------------

--
-- Table structure for table `pet_ad_package`
--

CREATE TABLE IF NOT EXISTS `pet_ad_package` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(100) NOT NULL,
  `package_cost` decimal(10,2) NOT NULL,
  `package_days` varchar(50) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pet_ad_package`
--

INSERT INTO `pet_ad_package` (`package_id`, `package_name`, `package_cost`, `package_days`, `sort_order`, `created`, `updated`) VALUES
(1, '+10KM', '10.00', NULL, 0, '2015-03-28 00:00:00', '2015-03-28 00:00:00'),
(2, '+20KM', '20.00', NULL, 0, '2015-03-28 00:00:00', '2015-03-28 00:00:00'),
(3, '+50KM', '30.00', NULL, 0, '2015-03-28 00:00:00', '2015-03-28 00:00:00'),
(4, 'Free(<10KM)', '0.00', NULL, 0, '2015-03-30 00:00:00', '2015-03-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pet_category`
--

CREATE TABLE IF NOT EXISTS `pet_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `category_image` text,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pet_category`
--

INSERT INTO `pet_category` (`category_id`, `category_name`, `category_image`, `status`, `created`, `updated`) VALUES
(1, 'Dog', NULL, '1', '2015-03-30 13:07:58', '2015-03-30 13:07:58'),
(2, 'Cat', NULL, '1', '2015-03-30 13:08:11', '2015-03-30 13:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `pet_city`
--

CREATE TABLE IF NOT EXISTS `pet_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(100) NOT NULL,
  `pet_state_id` int(11) NOT NULL,
  `pet_country_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`city_id`),
  KEY `FK_pet_city_country` (`pet_country_id`),
  KEY `FK_pet_city_state` (`pet_state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pet_city`
--

INSERT INTO `pet_city` (`city_id`, `city_name`, `pet_state_id`, `pet_country_id`, `created`, `updated`) VALUES
(1, 'Bengaluru', 1, 1, '2015-03-27 15:52:46', '2015-03-27 15:52:46'),
(2, 'Madurai', 2, 1, '2015-03-27 15:55:17', '2015-03-27 15:55:17'),
(3, 'Lübbecke', 3, 2, '2015-03-27 15:57:14', '2015-03-27 15:57:14'),
(4, 'Chennai', 2, 1, '2015-03-27 15:58:15', '2015-03-27 15:58:15'),
(5, 'Madison', 4, 3, '2015-03-30 14:34:00', '2015-03-30 14:34:00'),
(6, 'Hemer', 3, 2, '2015-04-01 10:59:27', '2015-04-01 10:59:27');

-- --------------------------------------------------------

--
-- Table structure for table `pet_cms_content`
--

CREATE TABLE IF NOT EXISTS `pet_cms_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) DEFAULT NULL,
  `body` longtext,
  `url` varchar(255) DEFAULT NULL,
  `pageTitle` varchar(255) DEFAULT NULL,
  `metaTitle` varchar(255) DEFAULT NULL,
  `metaDescription` varchar(255) DEFAULT NULL,
  `metaKeywords` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pet_cms_content`
--

INSERT INTO `pet_cms_content` (`id`, `heading`, `body`, `url`, `pageTitle`, `metaTitle`, `metaDescription`, `metaKeywords`) VALUES
(1, 'About Us', 'This is for testing', 'about-us', 'About Us', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pet_country`
--

CREATE TABLE IF NOT EXISTS `pet_country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(10) DEFAULT NULL,
  `country_name` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pet_country`
--

INSERT INTO `pet_country` (`country_id`, `country_code`, `country_name`, `created`, `updated`) VALUES
(1, 'IN', 'India', '2015-03-27 15:52:46', '2015-03-27 15:52:46'),
(2, 'DE', 'Germany', '2015-03-27 15:57:14', '2015-03-27 15:57:14'),
(3, 'US', 'United States', '2015-03-30 14:34:00', '2015-03-30 14:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `pet_lost`
--

CREATE TABLE IF NOT EXISTS `pet_lost` (
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
  KEY `FK_pet_lost_package` (`pet_ad_package_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pet_lost`
--

INSERT INTO `pet_lost` (`lost_id`, `pet_category_id`, `pet_name`, `breed`, `eye_color`, `furcolor`, `sex`, `age`, `weight`, `chipped`, `castrated`, `sterilized`, `date_of_missing`, `lost_address`, `latitude`, `longitude`, `pet_country_id`, `pet_state_id`, `pet_city_id`, `additional_informations`, `reward`, `pet_user_id`, `pet_ad_package_id`, `status`, `created`, `updated`) VALUES
(1, 1, 'First Pet', 'Test Breed', 'Black', 'Brown', '1', 5, '20.00', '0', '0', '0', '2015-03-31 00:00:00', '9, Jansiranipuram 2nd street, sellur, Madurai, India', 9.934832, 78.124475, 1, 2, 2, 'This is for testing', '1500.00', 6, 4, '1', '2015-03-31 18:23:01', '2015-03-31 18:24:09'),
(2, 1, 'My First Pet', 'Test Breed', '', '', '0', NULL, '0.00', '0', '0', '0', '2015-03-31 12:00:00', '191 Hauptstr. 26  Hemer, 58675', 51.3750513, 7.7596946, 2, 3, 6, '', '1500.00', 6, 4, '1', '2015-04-01 10:59:27', '2015-04-01 10:59:27');

-- --------------------------------------------------------

--
-- Table structure for table `pet_lost_photo`
--

CREATE TABLE IF NOT EXISTS `pet_lost_photo` (
  `lost_photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `pet_lost_id` int(11) NOT NULL,
  `photos` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`lost_photo_id`),
  KEY `FK_pet_lost_photo` (`pet_lost_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pet_lost_photo`
--

INSERT INTO `pet_lost_photo` (`lost_photo_id`, `pet_lost_id`, `photos`, `created`, `updated`) VALUES
(2, 1, 'Plmpx-dog.jpg', '2015-03-31 18:24:09', '2015-03-31 18:24:09'),
(3, 2, 'p424m-dog.jpg', '2015-04-01 10:59:27', '2015-04-01 10:59:27');

-- --------------------------------------------------------

--
-- Table structure for table `pet_master_role`
--

CREATE TABLE IF NOT EXISTS `pet_master_role` (
  `Master_Role_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Role_Code` varchar(45) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `is_Admin` enum('0','1') NOT NULL DEFAULT '0',
  `Active` bit(1) DEFAULT NULL,
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Rowversion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Role_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pet_master_role`
--

INSERT INTO `pet_master_role` (`Master_Role_ID`, `Role_Code`, `Description`, `is_Admin`, `Active`, `Created_Date`, `Rowversion`) VALUES
(1, 'ADM', 'Admin', '1', b'1', '2015-02-14 08:25:09', '0000-00-00 00:00:00'),
(2, 'USR', 'User', '0', b'0', '2015-03-20 07:32:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pet_state`
--

CREATE TABLE IF NOT EXISTS `pet_state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_code` varchar(10) DEFAULT NULL,
  `state_name` varchar(100) NOT NULL,
  `pet_country_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`state_id`),
  KEY `FK_pet_state` (`pet_country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pet_state`
--

INSERT INTO `pet_state` (`state_id`, `state_code`, `state_name`, `pet_country_id`, `created`, `updated`) VALUES
(1, 'KA', 'Karnataka', 1, '2015-03-27 15:52:46', '2015-03-27 15:52:46'),
(2, 'TN', 'Tamil Nadu', 1, '2015-03-27 15:55:17', '2015-03-27 15:55:17'),
(3, 'NRW', 'Nordrhein-Westfalen', 2, '2015-03-27 15:57:14', '2015-03-27 15:57:14'),
(4, 'SD', 'South Dakota', 3, '2015-03-30 14:34:00', '2015-03-30 14:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `pet_user`
--

CREATE TABLE IF NOT EXISTS `pet_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_wipo_user_role` (`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pet_user`
--

INSERT INTO `pet_user` (`id`, `email`, `password_hash`, `password_reset_token`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin@heropet.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', NULL, 1, 1, '2015-03-17 00:00:00', '2015-03-19 13:37:17'),
(2, 'nadesh1@arkinfotec.com', '178aeaeaa44f39983a5d01957b5f77da91d9104f390aa2d56076fed58ac567ef3e0f851ea02f4ffce44d21bcc08e9da714a351f00d5aa6c4cb260225ab8fb812', NULL, 2, 1, '2015-03-27 15:52:47', '2015-03-27 15:52:47'),
(3, 'nadesh2@arkinfotec.com', '9069812e3252a4914d5d160e2002c9b2beabed3c5cef5ef651b169a517dd3fc868772b3acd3f480134c89ede0053f8b9559f653af881f3d316cae549c5c0cf27', NULL, 2, 1, '2015-03-27 15:55:17', '2015-03-27 15:55:17'),
(4, 'nadesh3@arkinfotec.com', '502e0faa295a1b91ab881faadcad7585b504da0c68d6df1bc257bc9fc1eb4eb6eca24d6d4c2a3413193240a489bb9cfbac48076b292d36061bda81e965b67e8b', NULL, 2, 1, '2015-03-27 15:57:14', '2015-03-27 15:57:14'),
(5, 'nadesh4@arkinfotec.com', 'd545a346c72df057eff58ef485c6aa7b6b8da552b93740a4707eb9647bbca0329d220f36c9b7827762dc79918a4ee276d721591bfc5331719df90774fea375df', NULL, 2, 1, '2015-03-27 15:58:15', '2015-03-27 15:58:15'),
(6, 'nadesh@arkinfotec.com', '8000191e8d20d812c25c97a9bd6a50c29a1a915c400c4daffbb2c261ac5744c3d325e91c9ff010ddb1be6ce887965d36b36c48f254e1c97f0a0dd948fb42149e', NULL, 2, 1, '2015-03-27 15:59:12', '2015-03-27 15:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `pet_user_profile`
--

CREATE TABLE IF NOT EXISTS `pet_user_profile` (
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
  KEY `FK_pet_user_profile_state` (`pet_state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pet_user_profile`
--

INSERT INTO `pet_user_profile` (`user_profile_id`, `pet_user_id`, `user_first_name`, `user_last_name`, `user_address`, `latitude`, `longitude`, `pet_country_id`, `pet_state_id`, `pet_city_id`, `user_phone`, `user_mobile`, `user_profile_picture`, `created`, `updated`) VALUES
(1, 2, 'Nadesh', 'S', '71, Cunningham Road, Bangalore – 560052, INDIA', 12.9906064, 77.5881959, 1, 1, 1, '123456789', '123456789', 'a0jLR-300-300.png', '2015-03-27 15:52:47', '2015-03-27 15:52:47'),
(2, 3, 'Nadesh', 'S', '9, Jansiranipuram 2nd street, Sellur, Madurai, Tamilnadu, India', 9.934832, 78.124475, 1, 2, 2, '123456789', '123456789', '', '2015-03-27 15:55:17', '2015-03-27 15:55:17'),
(3, 4, 'Nadesh', 'S', '241  Margaret M. Norris  Obermehner Weg 58  Lübbecke, 32312', 52.2936898, 8.5969028, 2, 3, 3, '123456789', '123456789', '', '2015-03-27 15:57:14', '2015-03-27 15:57:14'),
(4, 5, 'Nadesh', 'S', '26/1, Mahathma Gandhi Road, Chennai  600034', 13.0635744, 80.2437162, 1, 2, 4, '123456789', '123456789', '', '2015-03-27 15:58:15', '2015-03-27 15:58:15'),
(5, 6, 'Nadesh1', 'S1', '9, Jansiranipuram 2nd street, Sellur, Madurai, Tamilnadu, India', 9.934832, 78.124475, 1, 2, 2, '123456789', '123456789', 'ayqp1-1_1.png', '2015-03-27 15:59:12', '2015-03-28 19:39:04');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pet_lost`
--
ALTER TABLE `pet_lost`
  ADD CONSTRAINT `FK_pet_lost_category` FOREIGN KEY (`pet_category_id`) REFERENCES `pet_category` (`category_id`),
  ADD CONSTRAINT `FK_pet_lost_package` FOREIGN KEY (`pet_ad_package_id`) REFERENCES `pet_ad_package` (`package_id`),
  ADD CONSTRAINT `FK_pet_lost_user` FOREIGN KEY (`pet_user_id`) REFERENCES `pet_user` (`id`);

--
-- Constraints for table `pet_lost_photo`
--
ALTER TABLE `pet_lost_photo`
  ADD CONSTRAINT `FK_pet_lost_photo` FOREIGN KEY (`pet_lost_id`) REFERENCES `pet_lost` (`lost_id`);

--
-- Constraints for table `pet_user`
--
ALTER TABLE `pet_user`
  ADD CONSTRAINT `FK_pet_user_role` FOREIGN KEY (`role`) REFERENCES `pet_master_role` (`Master_Role_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pet_user_profile`
--
ALTER TABLE `pet_user_profile`
  ADD CONSTRAINT `FK_pet_user_profile` FOREIGN KEY (`pet_user_id`) REFERENCES `pet_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
