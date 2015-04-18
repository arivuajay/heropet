-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2015 at 07:58 AM
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
-- Table structure for table `pet_admin`
--

CREATE TABLE IF NOT EXISTS `pet_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_last_login` datetime NOT NULL,
  `admin_login_ip` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pet_admin`
--

INSERT INTO `pet_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_last_login`, `admin_login_ip`, `created`, `updated`) VALUES
(1, 'admin@heropet.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'Admin', '2015-04-16 16:07:48', '127.0.0.1', '2015-04-16 00:00:00', '2015-04-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pet_country`
--

CREATE TABLE IF NOT EXISTS `pet_country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(250) NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `country_dialing_code` varchar(10) NOT NULL,
  `country_flag_image` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pet_country`
--

INSERT INTO `pet_country` (`country_id`, `country_name`, `country_code`, `country_dialing_code`, `country_flag_image`, `created`, `updated`) VALUES
(1, 'Austria', 'AT', '+43', '', '2015-04-16 00:00:00', '2015-04-16 00:00:00'),
(2, 'Germany', 'DE', '+49', '', '2015-04-16 00:00:00', '2015-04-16 00:00:00'),
(3, 'Switzerland', 'CH', '+41', '', '2015-04-16 00:00:00', '2015-04-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pet_user`
--

CREATE TABLE IF NOT EXISTS `pet_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_status` enum('0','1') NOT NULL DEFAULT '1',
  `user_last_login` datetime DEFAULT NULL,
  `user_login_ip` varchar(255) DEFAULT NULL,
  `reset_password_string` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pet_user`
--

INSERT INTO `pet_user` (`user_id`, `user_email`, `user_password`, `user_status`, `user_last_login`, `user_login_ip`, `reset_password_string`, `created`, `updated`) VALUES
(7, 'nadesh@arkinfotec.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', '1', NULL, NULL, NULL, '2015-04-17 20:02:26', '2015-04-17 20:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `pet_user_profile`
--

CREATE TABLE IF NOT EXISTS `pet_user_profile` (
  `user_profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `pet_user_id` int(11) NOT NULL,
  `user_profile_picture` text,
  `user_title` varchar(10) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_sur_name` varchar(255) DEFAULT NULL,
  `pet_country_id` int(11) NOT NULL,
  `user_zip_code` varchar(100) NOT NULL,
  `user_town` varchar(255) NOT NULL,
  `user_street` varchar(100) DEFAULT NULL,
  `user_house_number` varchar(50) DEFAULT NULL,
  `user_mobile_number` varchar(255) DEFAULT NULL,
  `user_is_agree_tc` enum('0','1') NOT NULL,
  `user_voucher_code` varchar(100) DEFAULT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`user_profile_id`),
  KEY `FK_pet_user_profile` (`pet_user_id`),
  KEY `FK_pet_user_profile_country` (`pet_country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pet_user_profile`
--
ALTER TABLE `pet_user_profile`
  ADD CONSTRAINT `FK_pet_user_profile` FOREIGN KEY (`pet_user_id`) REFERENCES `pet_user` (`user_id`),
  ADD CONSTRAINT `FK_pet_user_profile_country` FOREIGN KEY (`pet_country_id`) REFERENCES `pet_country` (`country_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
