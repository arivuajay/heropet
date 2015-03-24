-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2015 at 03:20 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pet_city`
--

INSERT INTO `pet_city` (`city_id`, `city_name`, `pet_state_id`, `pet_country_id`, `created`, `updated`) VALUES
(1, 'Madurai', 1, 1, '2015-03-24 16:32:06', '2015-03-24 16:32:06'),
(2, 'Lübbecke', 2, 2, '2015-03-24 16:35:42', '2015-03-24 16:35:42'),
(3, 'Chennai', 1, 1, '2015-03-24 16:38:22', '2015-03-24 16:38:22'),
(4, 'Bengaluru', 3, 1, '2015-03-24 16:41:09', '2015-03-24 16:41:09'),
(5, 'Goldens Bridge', 4, 3, '2015-03-24 17:15:24', '2015-03-24 17:15:24');

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
(1, 'IN', 'India', '2015-03-24 16:32:06', '2015-03-24 16:32:06'),
(2, 'DE', 'Germany', '2015-03-24 16:35:42', '2015-03-24 16:35:42'),
(3, 'US', 'United States', '2015-03-24 17:15:24', '2015-03-24 17:15:24');

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
(1, 'TN', 'Tamil Nadu', 1, '2015-03-24 16:32:06', '2015-03-24 16:32:06'),
(2, 'NRW', 'Nordrhein-Westfalen', 2, '2015-03-24 16:35:42', '2015-03-24 16:35:42'),
(3, 'KA', 'Karnataka', 1, '2015-03-24 16:41:09', '2015-03-24 16:41:09'),
(4, 'NY', 'New York', 3, '2015-03-24 17:15:24', '2015-03-24 17:15:24');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pet_user`
--

INSERT INTO `pet_user` (`id`, `email`, `password_hash`, `password_reset_token`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin@heropet.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', NULL, 1, 1, '2015-03-17 00:00:00', '2015-03-19 13:37:17'),
(2, 'nadesh@arkinfotec.com', '393bd13ba7505e42781c3d7d55fb592f7dac8a89a9a36a8697bfa0e6170be713700385f045c024e3a206a63a310b6eb720d0cadbde1ff3d2e1598ff994e27284', NULL, 2, 1, '2015-03-24 16:32:06', '2015-03-24 16:32:06'),
(3, 'nadesh1@arkinfotec.com', 'ecdc77b5073c0429eaafe839eb027f2b532f47b3627c7e2f84c8598722b38dc9b55fdaef4ad350d6fe9f1229d64a2e29ad38422c5dd3f219a41502bc463e2d18', NULL, 2, 1, '2015-03-24 16:35:42', '2015-03-24 16:35:42'),
(4, 'nadesh2@arkinfotec.com', 'ef8b5f2eadd98db0523d515c2a2dbc14d547caf1fc4e708f464b94b71e4579796465df8cade814e57c27298451313829f74da9078cb51f4d60536e09807818df', NULL, 2, 1, '2015-03-24 16:38:22', '2015-03-24 16:38:22'),
(5, 'nadesh3@arkinfotec.com', 'dded41142453771e16fb7a0565c16c2e1bc2e81448b57126f3ba5a8821c631c5e2da923a07266bd1fd83932b5e9b16e2bbd51289d7b7e6e00e10a83e17830386', NULL, 2, 1, '2015-03-24 16:41:09', '2015-03-24 16:41:09'),
(6, '44nadesh1@arkinfotec.com', '53ee983ec02c438d317b29989dfe3225a200bbcfa79e709e85d060655ccc5b85e174bde4efa278cff1ca2f19b2dc5984f2bbe007e46ae22f8e274f98ad73f2a6', NULL, 2, 1, '2015-03-24 17:00:27', '2015-03-24 17:00:27'),
(7, 'nadesh4@arkinfotec.com', 'a111d3623e9f533289a07d18934490738396103c3c7e5129ec78d92bb948b89eff361b218be98c3f1f0479c46fdaa2fea428216b45a96f8c262ba5c15dcace81', NULL, 2, 1, '2015-03-24 17:15:24', '2015-03-24 17:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `pet_user_profile`
--

CREATE TABLE IF NOT EXISTS `pet_user_profile` (
  `user_profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `pet_user_id` int(11) NOT NULL,
  `user_address` text NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `pet_country_id` int(11) DEFAULT NULL,
  `pet_state_id` int(11) DEFAULT NULL,
  `pet_city_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`user_profile_id`),
  KEY `FK_pet_user_profile` (`pet_user_id`),
  KEY `FK_pet_user_profile_country` (`pet_country_id`),
  KEY `FK_pet_user_profile_state` (`pet_state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pet_user_profile`
--

INSERT INTO `pet_user_profile` (`user_profile_id`, `pet_user_id`, `user_address`, `latitude`, `longitude`, `pet_country_id`, `pet_state_id`, `pet_city_id`, `created`, `updated`) VALUES
(1, 2, '9, Jansiranipuram 2nd street, Sellur, Madurai, Tamilnadu, India', 9.934832, 78.124475, 1, 1, 1, '2015-03-24 16:32:06', '2015-03-24 16:32:06'),
(2, 3, '241  Margaret M. Norris  Obermehner Weg 58  Lübbecke, 32312', 52.2936898, 8.5969028, 2, 2, 2, '2015-03-24 16:35:42', '2015-03-24 16:35:42'),
(3, 4, '26/1, Mahathma Gandhi Road, Chennai  600034', 13.0635744, 80.2437162, 1, 1, 3, '2015-03-24 16:38:22', '2015-03-24 16:38:22'),
(4, 5, '71, Cunningham Road, Bangalore – 560052, INDIA', 12.9906064, 77.5881959, 1, 3, 4, '2015-03-24 16:41:09', '2015-03-24 16:41:09'),
(5, 6, '241  Margaret M. Norris  Obermehner Weg 58  Lübbecke, 32312', 52.2936898, 8.5969028, 2, 2, 2, '2015-03-24 17:00:27', '2015-03-24 17:00:27'),
(6, 7, 'test', 41.2925714, -73.6794265, 3, 4, 5, '2015-03-24 17:15:24', '2015-03-24 17:15:24');

--
-- Constraints for dumped tables
--

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
