-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2015 at 01:25 PM
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
  `cityID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `cityName` varchar(50) NOT NULL,
  `stateID` mediumint(8) unsigned NOT NULL,
  `countryID` varchar(3) NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  PRIMARY KEY (`cityID`),
  UNIQUE KEY `unq` (`countryID`,`stateID`,`cityID`),
  KEY `cityName` (`cityName`),
  KEY `stateID` (`stateID`),
  KEY `countryID` (`countryID`),
  KEY `latitude` (`latitude`),
  KEY `longitude` (`longitude`),
  KEY `countrystate` (`countryID`,`stateID`),
  KEY `countrycity` (`countryID`,`cityID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=296460 ;

--
-- Dumping data for table `pet_city`
--

INSERT INTO `pet_city` (`cityID`, `cityName`, `stateID`, `countryID`, `latitude`, `longitude`) VALUES
(58524, 'Guntur', 1145, 'IND', NULL, NULL),
(58526, 'Hyderabad', 1145, 'IND', NULL, NULL),
(58530, 'Kakinada', 1145, 'IND', NULL, NULL),
(58556, 'Nellore', 1145, 'IND', NULL, NULL),
(58567, 'Rajahmundry', 1145, 'IND', NULL, NULL),
(58576, 'Secunderabad', 1145, 'IND', NULL, NULL),
(58588, 'Tirupati', 1145, 'IND', NULL, NULL),
(58591, 'Vijayawada', 1145, 'IND', NULL, NULL),
(58593, 'Visakhpatnam', 1145, 'IND', NULL, NULL),
(58596, 'Warangal', 1145, 'IND', NULL, NULL),
(58598, 'Itanagar', 1146, 'IND', NULL, NULL),
(58599, 'Bongaigaon', 1147, 'IND', NULL, NULL),
(58601, 'Dibrugarh', 1147, 'IND', NULL, NULL),
(58603, 'Dispur', 1147, 'IND', NULL, NULL),
(58604, 'Guwahati', 1147, 'IND', NULL, NULL),
(58605, 'Jorhat', 1147, 'IND', NULL, NULL),
(58608, 'Nagaon', 1147, 'IND', NULL, NULL),
(58610, 'Sibsagar', 1147, 'IND', NULL, NULL),
(58611, 'Silchar', 1147, 'IND', NULL, NULL),
(58612, 'Tezpur', 1147, 'IND', NULL, NULL),
(58613, 'Tinsukia', 1147, 'IND', NULL, NULL),
(58614, 'Ara', 1148, 'IND', NULL, NULL),
(58618, 'Begusarai', 1148, 'IND', NULL, NULL),
(58620, 'Bhagalpur', 1148, 'IND', NULL, NULL),
(58621, 'Bihar', 1148, 'IND', NULL, NULL),
(58624, 'Darbhanga', 1148, 'IND', NULL, NULL),
(58627, 'Gaya', 1148, 'IND', NULL, NULL),
(58629, 'Hajipur', 1148, 'IND', NULL, NULL),
(58640, 'Muzaffarpur', 1148, 'IND', NULL, NULL),
(58642, 'Patna', 1148, 'IND', NULL, NULL),
(58644, 'Purnia', 1148, 'IND', NULL, NULL),
(58651, 'Chandigarh', 1149, 'IND', NULL, NULL),
(58652, 'Silvassa', 1150, 'IND', NULL, NULL),
(58653, 'Daman', 1151, 'IND', NULL, NULL),
(58654, 'Diu', 1151, 'IND', NULL, NULL),
(58659, 'Delhi', 1152, 'IND', NULL, NULL),
(58674, 'Madgaon', 1153, 'IND', NULL, NULL),
(58675, 'Mormugao', 1153, 'IND', NULL, NULL),
(58676, 'Panaji', 1153, 'IND', NULL, NULL),
(58677, 'Ahmedabad', 1154, 'IND', NULL, NULL),
(58679, 'Anand', 1154, 'IND', NULL, NULL),
(58683, 'Bharuch', 1154, 'IND', NULL, NULL),
(58684, 'Bhavnagar', 1154, 'IND', NULL, NULL),
(58698, 'Gandhinagar', 1154, 'IND', NULL, NULL),
(58703, 'Jamnagar', 1154, 'IND', NULL, NULL),
(58723, 'Rajkot', 1154, 'IND', NULL, NULL),
(58727, 'Surat', 1154, 'IND', NULL, NULL),
(58732, 'Vadodara', 1154, 'IND', NULL, NULL),
(58734, 'Vapi', 1154, 'IND', NULL, NULL),
(58741, 'Ambala', 1155, 'IND', NULL, NULL),
(58746, 'Faridabad (New Township)', 1155, 'IND', NULL, NULL),
(58748, 'Gurgaon', 1155, 'IND', NULL, NULL),
(58750, 'Hissar', 1155, 'IND', NULL, NULL),
(58754, 'Karnal', 1155, 'IND', NULL, NULL),
(58759, 'Panchkula', 1155, 'IND', NULL, NULL),
(58760, 'Panipat', 1155, 'IND', NULL, NULL),
(58762, 'Rohtak', 1155, 'IND', NULL, NULL),
(58764, 'Sonepat', 1155, 'IND', NULL, NULL),
(58767, 'Yamuna Nagar', 1155, 'IND', NULL, NULL),
(58768, 'Shimla', 1156, 'IND', NULL, NULL),
(58769, 'Anantnag', 1157, 'IND', NULL, NULL),
(58770, 'Baramula', 1157, 'IND', NULL, NULL),
(58771, 'Jammu', 1157, 'IND', NULL, NULL),
(58772, 'Kathua', 1157, 'IND', NULL, NULL),
(58773, 'Sopore', 1157, 'IND', NULL, NULL),
(58774, 'Srinagar', 1157, 'IND', NULL, NULL),
(58775, 'Udhampur', 1157, 'IND', NULL, NULL),
(58776, 'Adityapur', 1158, 'IND', NULL, NULL),
(58779, 'Bokaro Steel City', 1158, 'IND', NULL, NULL),
(58784, 'Daltonganj', 1158, 'IND', NULL, NULL),
(58785, 'Deoghar', 1158, 'IND', NULL, NULL),
(58786, 'Dhanbad', 1158, 'IND', NULL, NULL),
(58787, 'Giridih', 1158, 'IND', NULL, NULL),
(58788, 'Hazaribagh', 1158, 'IND', NULL, NULL),
(58789, 'Jamshedpur', 1158, 'IND', NULL, NULL),
(58796, 'Ramgarh', 1158, 'IND', NULL, NULL),
(58797, 'Ranchi', 1158, 'IND', NULL, NULL),
(58803, 'Bangalore', 1159, 'IND', NULL, NULL),
(58805, 'Belgaum', 1159, 'IND', NULL, NULL),
(58810, 'Bommanahalli', 1159, 'IND', NULL, NULL),
(58819, 'Dasarahalli', 1159, 'IND', NULL, NULL),
(58825, 'Gulbarga', 1159, 'IND', NULL, NULL),
(58830, 'Hubli', 1159, 'IND', NULL, NULL),
(58840, 'Mangalore', 1159, 'IND', NULL, NULL),
(58841, 'Mysore', 1159, 'IND', NULL, NULL),
(58851, 'Shimoga', 1159, 'IND', NULL, NULL),
(58857, 'Udupi', 1159, 'IND', NULL, NULL),
(58860, 'Alappuzha', 1160, 'IND', NULL, NULL),
(58870, 'Kannur', 1160, 'IND', NULL, NULL),
(58873, 'Kochi', 1160, 'IND', NULL, NULL),
(58875, 'Kollam', 1160, 'IND', NULL, NULL),
(58876, 'Kottayam', 1160, 'IND', NULL, NULL),
(58877, 'Kozhikode', 1160, 'IND', NULL, NULL),
(58883, 'Palakkad', 1160, 'IND', NULL, NULL),
(58889, 'Thiruvananthapuram', 1160, 'IND', NULL, NULL),
(58891, 'Thrissur', 1160, 'IND', NULL, NULL),
(58893, 'Tiruvalla', 1160, 'IND', NULL, NULL),
(58895, 'Kavaratti', 1161, 'IND', NULL, NULL),
(58901, 'Bhopal', 1162, 'IND', NULL, NULL),
(58910, 'Dewas', 1162, 'IND', NULL, NULL),
(58913, 'Gwalior', 1162, 'IND', NULL, NULL),
(58916, 'Indore', 1162, 'IND', NULL, NULL),
(58918, 'Jabalpur', 1162, 'IND', NULL, NULL),
(58934, 'Ratlam', 1162, 'IND', NULL, NULL),
(58935, 'Rewa', 1162, 'IND', NULL, NULL),
(58936, 'Sagar', 1162, 'IND', NULL, NULL),
(58938, 'Satna', 1162, 'IND', NULL, NULL),
(58947, 'Ujjain', 1162, 'IND', NULL, NULL),
(58974, 'Dombivali', 1163, 'IND', NULL, NULL),
(58981, 'Kalyan', 1163, 'IND', NULL, NULL),
(58997, 'Mumbai', 1163, 'IND', NULL, NULL),
(58998, 'Nagpur', 1163, 'IND', NULL, NULL),
(59002, 'Nashik', 1163, 'IND', NULL, NULL),
(59005, 'Navi Mumbai', 1163, 'IND', NULL, NULL),
(59013, 'Pimpri-Chinchwad', 1163, 'IND', NULL, NULL),
(59014, 'Pune', 1163, 'IND', NULL, NULL),
(59021, 'Aurangabad', 1163, 'IND', NULL, NULL),
(59026, 'Thane', 1163, 'IND', NULL, NULL),
(59036, 'Imphal', 1164, 'IND', NULL, NULL),
(59037, 'Shillong', 1165, 'IND', NULL, NULL),
(59038, 'Tura', 1165, 'IND', NULL, NULL),
(59039, 'Aizawl', 1166, 'IND', NULL, NULL),
(59040, 'Dimapur', 1167, 'IND', NULL, NULL),
(59041, 'Kohima', 1167, 'IND', NULL, NULL),
(59043, 'Baleshwar', 1168, 'IND', NULL, NULL),
(59047, 'Bhadrak', 1168, 'IND', NULL, NULL),
(59049, 'Bhubaneswar', 1168, 'IND', NULL, NULL),
(59050, 'Brahmapur', 1168, 'IND', NULL, NULL),
(59052, 'Cuttack', 1168, 'IND', NULL, NULL),
(59053, 'Dhenkanal', 1168, 'IND', NULL, NULL),
(59056, 'Jharsuguda', 1168, 'IND', NULL, NULL),
(59059, 'Puri', 1168, 'IND', NULL, NULL),
(59060, 'Raurkela', 1168, 'IND', NULL, NULL),
(59063, 'Sambalpur', 1168, 'IND', NULL, NULL),
(59065, 'Karaikal', 1169, 'IND', NULL, NULL),
(59066, 'Ozhukarai', 1169, 'IND', NULL, NULL),
(59067, 'Pondicherry', 1169, 'IND', NULL, NULL),
(59069, 'Amritsar', 1170, 'IND', NULL, NULL),
(59072, 'Bathinda', 1170, 'IND', NULL, NULL),
(59079, 'Hoshiarpur', 1170, 'IND', NULL, NULL),
(59081, 'Jalandhar', 1170, 'IND', NULL, NULL),
(59085, 'Ludhiana', 1170, 'IND', NULL, NULL),
(59089, 'Moga', 1170, 'IND', NULL, NULL),
(59092, 'Pathankot', 1170, 'IND', NULL, NULL),
(59093, 'Patiala', 1170, 'IND', NULL, NULL),
(59094, 'Phagwara', 1170, 'IND', NULL, NULL),
(59096, 'S.A.S. Nagar', 1170, 'IND', NULL, NULL),
(59101, 'Ajmer', 1171, 'IND', NULL, NULL),
(59102, 'Alwar', 1171, 'IND', NULL, NULL),
(59110, 'Bhilwara', 1171, 'IND', NULL, NULL),
(59111, 'Bikaner', 1171, 'IND', NULL, NULL),
(59119, 'Ganganagar', 1171, 'IND', NULL, NULL),
(59123, 'Jaipur', 1171, 'IND', NULL, NULL),
(59126, 'Jodhpur', 1171, 'IND', NULL, NULL),
(59129, 'Kota', 1171, 'IND', NULL, NULL),
(59142, 'Sikar', 1171, 'IND', NULL, NULL),
(59146, 'Udaipur', 1171, 'IND', NULL, NULL),
(59147, 'Gangtok', 1172, 'IND', NULL, NULL),
(59162, 'Chennai', 1173, 'IND', NULL, NULL),
(59164, 'Coimbatore', 1173, 'IND', NULL, NULL),
(59171, 'Erode', 1173, 'IND', NULL, NULL),
(59188, 'Madurai', 1173, 'IND', NULL, NULL),
(59194, 'Nagercoil', 1173, 'IND', NULL, NULL),
(59207, 'Salem', 1173, 'IND', NULL, NULL),
(59220, 'Tiruchirappalli', 1173, 'IND', NULL, NULL),
(59221, 'Tirunelveli', 1173, 'IND', NULL, NULL),
(59223, 'Tiruppur', 1173, 'IND', NULL, NULL),
(59231, 'Vellore', 1173, 'IND', NULL, NULL),
(59235, 'Agartala', 1174, 'IND', NULL, NULL),
(59236, 'Dehra Dun', 1175, 'IND', NULL, NULL),
(59237, 'Haldwani', 1175, 'IND', NULL, NULL),
(59238, 'Hardwar', 1175, 'IND', NULL, NULL),
(59239, 'Kashipur', 1175, 'IND', NULL, NULL),
(59240, 'Rishikesh', 1175, 'IND', NULL, NULL),
(59241, 'Roorkee', 1175, 'IND', NULL, NULL),
(59242, 'Rudrapur', 1175, 'IND', NULL, NULL),
(59243, 'Agra', 1176, 'IND', NULL, NULL),
(59246, 'Allahabad', 1176, 'IND', NULL, NULL),
(59256, 'Bareilly', 1176, 'IND', NULL, NULL),
(59280, 'Ghaziabad', 1176, 'IND', NULL, NULL),
(59295, 'Kanpur', 1176, 'IND', NULL, NULL),
(59306, 'Lucknow', 1176, 'IND', NULL, NULL),
(59314, 'Meerut', 1176, 'IND', NULL, NULL),
(59318, 'Moradabad', 1176, 'IND', NULL, NULL),
(59326, 'Noida', 1176, 'IND', NULL, NULL),
(59351, 'Varanasi', 1176, 'IND', NULL, NULL),
(59461, 'Ambikapur', 1178, 'IND', NULL, NULL),
(59463, 'Bhilai', 1178, 'IND', NULL, NULL),
(59464, 'Bhilai Charoda', 1178, 'IND', NULL, NULL),
(59465, 'Bilaspur', 1178, 'IND', NULL, NULL),
(59469, 'Durg-Bhilainagar', 1178, 'IND', NULL, NULL),
(59470, 'Jagdalpur', 1178, 'IND', NULL, NULL),
(59471, 'Korba', 1178, 'IND', NULL, NULL),
(59472, 'Raigarh', 1178, 'IND', NULL, NULL),
(59473, 'Raipur', 1178, 'IND', NULL, NULL),
(59474, 'Rajnandgaon', 1178, 'IND', NULL, NULL),
(157273, 'Port Blair', 7598, 'IND', NULL, NULL),
(157275, 'Kolkata', 1177, 'IND', NULL, NULL),
(221359, 'AsansolMC', 1177, 'IND', NULL, NULL),
(221360, 'Bardhaman', 1177, 'IND', NULL, NULL),
(221362, 'DurgapurMC', 1177, 'IND', NULL, NULL),
(221382, 'SiliguriM.C.', 1177, 'IND', NULL, NULL),
(221389, 'Hooghly-Chinsurah', 1177, 'IND', NULL, NULL),
(221396, 'Howrah', 1177, 'IND', NULL, NULL),
(221431, 'Barasat', 1177, 'IND', NULL, NULL),
(221432, 'Barrackpore', 1177, 'IND', NULL, NULL),
(221436, 'Dum Dum', 1177, 'IND', NULL, NULL),
(296458, 'Mandi', 1156, 'IND', NULL, NULL),
(296459, 'Solan', 1156, 'IND', NULL, NULL);

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
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(255) DEFAULT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=242 ;

--
-- Dumping data for table `pet_country`
--

INSERT INTO `pet_country` (`sid`, `country_code`, `country_name`, `active`, `order`) VALUES
(1, 'AF', 'Afghanistan', 0, 1),
(2, 'AL', 'Albania', 0, 2),
(3, 'DZ', 'Algeria', 0, 3),
(4, 'AS', 'American Samoa', 0, 4),
(5, 'AD', 'Andorra', 0, 5),
(6, 'AO', 'Angola', 0, 6),
(7, 'AI', 'Anguilla', 0, 7),
(8, 'AQ', 'Antarctica', 0, 8),
(9, 'AG', 'Antigua and Barbuda', 0, 9),
(10, 'AR', 'Argentina', 0, 10),
(11, 'AM', 'Armenia', 0, 11),
(12, 'AW', 'Aruba', 0, 12),
(13, 'AU', 'Australia', 0, 13),
(14, 'AT', 'Oesterreich', 1, 14),
(15, 'AZ', 'Azerbaidjan', 0, 15),
(16, 'BS', 'Bahamas', 0, 16),
(17, 'BH', 'Bahrain', 0, 17),
(18, 'BD', 'Bangladesh', 0, 18),
(19, 'BB', 'Barbados', 0, 19),
(20, 'BY', 'Belarus', 0, 20),
(21, 'BE', 'Belgium', 0, 21),
(22, 'BZ', 'Belize', 0, 22),
(23, 'BJ', 'Benin', 0, 23),
(24, 'BM', 'Bermuda', 0, 24),
(25, 'BT', 'Bhutan', 0, 25),
(26, 'BO', 'Bolivia', 0, 26),
(27, 'BA', 'Bosnia-Herzegovina', 0, 27),
(28, 'BW', 'Botswana', 0, 28),
(29, 'BV', 'Bouvet Island', 0, 29),
(30, 'BR', 'Brazil', 0, 30),
(31, 'IO', 'British Indian Ocean Territory', 0, 31),
(32, 'BN', 'Brunei Darussalam', 0, 32),
(33, 'BG', 'Bulgaria', 0, 33),
(34, 'BF', 'Burkina Faso', 0, 34),
(35, 'BI', 'Burundi', 0, 35),
(36, 'KH', 'Cambodia', 0, 36),
(37, 'CM', 'Cameroon', 0, 37),
(38, 'CA', 'Canada', 0, 38),
(39, 'CV', 'Cape Verde', 0, 39),
(40, 'KY', 'Cayman Islands', 0, 40),
(41, 'CF', 'Central African Republic', 0, 41),
(42, 'TD', 'Chad', 0, 42),
(43, 'CL', 'Chile', 0, 43),
(44, 'CN', 'China', 0, 44),
(45, 'CX', 'Christmas Island', 0, 45),
(46, 'CC', 'Cocos (Keeling) Islands', 0, 46),
(47, 'CO', 'Colombia', 0, 47),
(48, 'KM', 'Comoros', 0, 48),
(49, 'CG', 'Congo', 0, 49),
(50, 'CK', 'Cook Islands', 0, 50),
(51, 'CR', 'Costa Rica', 0, 51),
(52, 'HR', 'Croatia', 0, 52),
(53, 'CU', 'Cuba', 0, 53),
(54, 'CY', 'Cyprus', 0, 54),
(55, 'CZ', 'Czech Republic', 0, 55),
(56, 'DK', 'Denmark', 0, 56),
(57, 'DJ', 'Djibouti', 0, 57),
(58, 'DM', 'Dominica', 0, 58),
(59, 'DO', 'Dominican Republic', 0, 59),
(60, 'TP', 'East Timor', 0, 60),
(61, 'EC', 'Ecuador', 0, 61),
(62, 'EG', 'Egypt', 0, 62),
(63, 'SV', 'El Salvador', 0, 63),
(64, 'GQ', 'Equatorial Guinea', 0, 64),
(65, 'ER', 'Eritrea', 0, 65),
(66, 'EE', 'Estonia', 0, 66),
(67, 'ET', 'Ethiopia', 0, 67),
(68, 'FK', 'Falkland Islands', 0, 68),
(69, 'FO', 'Faroe Islands', 0, 69),
(70, 'FJ', 'Fiji', 0, 70),
(71, 'FI', 'Finland', 0, 71),
(72, 'FR', 'France', 0, 72),
(73, 'FX', 'France (European Territory)', 0, 73),
(74, 'GF', 'French Guyana', 0, 74),
(75, 'TF', 'French Southern Territories', 0, 75),
(76, 'GA', 'Gabon', 0, 76),
(77, 'GM', 'Gambia', 0, 77),
(78, 'GE', 'Georgia', 0, 78),
(79, 'DE', 'Deutschland', 1, 79),
(80, 'GH', 'Ghana', 0, 80),
(81, 'GI', 'Gibraltar', 0, 81),
(82, 'GR', 'Greece', 0, 82),
(83, 'GL', 'Greenland', 0, 83),
(84, 'GD', 'Grenada', 0, 84),
(85, 'GP', 'Guadeloupe (French)', 0, 85),
(86, 'GU', 'Guam (USA)', 0, 86),
(87, 'GT', 'Guatemala', 0, 87),
(88, 'GG', 'Guernsey', 0, 88),
(89, 'GN', 'Guinea', 0, 89),
(90, 'GW', 'Guinea Bissau', 0, 90),
(91, 'GY', 'Guyana', 0, 91),
(92, 'HT', 'Haiti', 0, 92),
(93, 'HM', 'Heard and McDonald Islands', 0, 93),
(94, 'HN', 'Honduras', 0, 94),
(95, 'HK', 'Hong Kong', 0, 95),
(96, 'HU', 'Hungary', 0, 96),
(97, 'IS', 'Iceland', 0, 97),
(98, 'IN', 'India', 0, 98),
(99, 'ID', 'Indonesia', 0, 99),
(100, 'IR', 'Iran', 0, 100),
(101, 'IQ', 'Iraq', 0, 101),
(102, 'IE', 'Ireland', 0, 102),
(103, 'IL', 'Israel', 0, 103),
(104, 'IT', 'Italy', 0, 104),
(105, 'CI', 'Ivory Coast (Cote D''Ivoire)', 0, 105),
(106, 'JM', 'Jamaica', 0, 106),
(107, 'JP', 'Japan', 0, 107),
(108, 'JO', 'Jordan', 0, 108),
(109, 'KZ', 'Kazakhstan', 0, 109),
(110, 'KE', 'Kenya', 0, 110),
(111, 'KI', 'Kiribati', 0, 111),
(112, 'KW', 'Kuwait', 0, 112),
(113, 'KG', 'Kyrgyzstan', 0, 113),
(114, 'LA', 'Laos', 0, 114),
(115, 'LV', 'Latvia', 0, 115),
(116, 'LB', 'Lebanon', 0, 116),
(117, 'LS', 'Lesotho', 0, 117),
(118, 'LR', 'Liberia', 0, 118),
(119, 'LY', 'Libya', 0, 119),
(120, 'LI', 'Liechtenstein', 0, 120),
(121, 'LT', 'Lithuania', 0, 121),
(122, 'LU', 'Luxembourg', 0, 122),
(123, 'MO', 'Macau', 0, 123),
(124, 'MK', 'Macedonia', 0, 124),
(125, 'MG', 'Madagascar', 0, 125),
(126, 'MW', 'Malawi', 0, 126),
(127, 'MY', 'Malaysia', 0, 127),
(128, 'MV', 'Maldives', 0, 128),
(129, 'ML', 'Mali', 0, 129),
(130, 'MT', 'Malta', 0, 130),
(131, 'MH', 'Marshall Islands', 0, 131),
(132, 'MQ', 'Martinique (French)', 0, 132),
(133, 'MR', 'Mauritania', 0, 133),
(134, 'MU', 'Mauritius', 0, 134),
(135, 'YT', 'Mayotte', 0, 135),
(136, 'MX', 'Mexico', 0, 136),
(137, 'FM', 'Micronesia', 0, 137),
(138, 'MD', 'Moldavia', 0, 138),
(139, 'MC', 'Monaco', 0, 139),
(140, 'MN', 'Mongolia', 0, 140),
(141, 'ME', 'Montenegro', 0, 141),
(142, 'MS', 'Montserrat', 0, 142),
(143, 'MA', 'Morocco', 0, 143),
(144, 'MZ', 'Mozambique', 0, 144),
(145, 'MM', 'Myanmar', 0, 145),
(146, 'NA', 'Namibia', 0, 146),
(147, 'NR', 'Nauru', 0, 147),
(148, 'NP', 'Nepal', 0, 148),
(149, 'NL', 'Netherlands', 0, 149),
(150, 'AN', 'Netherlands Antilles', 0, 150),
(151, 'NC', 'New Caledonia (French)', 0, 151),
(152, 'NZ', 'New Zealand', 0, 152),
(153, 'NI', 'Nicaragua', 0, 153),
(154, 'NE', 'Niger', 0, 154),
(155, 'NG', 'Nigeria', 0, 155),
(156, 'NU', 'Niue', 0, 156),
(157, 'NF', 'Norfolk Island', 0, 157),
(158, 'KP', 'North Korea', 0, 158),
(159, 'MP', 'Northern Mariana Islands', 0, 159),
(160, 'NO', 'Norway', 0, 160),
(161, 'OM', 'Oman', 0, 161),
(162, 'PK', 'Pakistan', 0, 162),
(163, 'PW', 'Palau', 0, 163),
(164, 'PS', 'Palestine Authority', 0, 164),
(165, 'PA', 'Panama', 0, 165),
(166, 'PG', 'Papua New Guinea', 0, 166),
(167, 'PY', 'Paraguay', 0, 167),
(168, 'PE', 'Peru', 0, 168),
(169, 'PH', 'Philippines', 0, 169),
(170, 'PN', 'Pitcairn Island', 0, 170),
(171, 'PL', 'Poland', 0, 171),
(172, 'PF', 'Polynesia (French)', 0, 172),
(173, 'PT', 'Portugal', 0, 173),
(174, 'PR', 'Puerto Rico', 0, 174),
(175, 'QA', 'Qatar', 0, 175),
(176, 'RE', 'Reunion (French)', 0, 176),
(177, 'RO', 'Romania', 0, 177),
(178, 'RU', 'Russian Federation', 0, 178),
(179, 'RW', 'Rwanda', 0, 179),
(180, 'GS', 'S. Georgia & S. Sandwich Isls.', 0, 180),
(181, 'SH', 'Saint Helena', 0, 181),
(182, 'KN', 'Saint Kitts & Nevis Anguilla', 0, 182),
(183, 'LC', 'Saint Lucia', 0, 183),
(184, 'PM', 'Saint Pierre and Miquelon', 0, 184),
(185, 'ST', 'Saint Tome (Sao Tome) and Principe', 0, 185),
(186, 'VC', 'Saint Vincent & Grenadines', 0, 186),
(187, 'WS', 'Samoa', 0, 187),
(188, 'SM', 'San Marino', 0, 188),
(189, 'SA', 'Saudi Arabia', 0, 189),
(190, 'SN', 'Senegal', 0, 190),
(191, 'CS', 'Serbia', 0, 191),
(192, 'SC', 'Seychelles', 0, 192),
(193, 'SL', 'Sierra Leone', 0, 193),
(194, 'SG', 'Singapore', 0, 194),
(195, 'SK', 'Slovak Republic', 0, 195),
(196, 'SI', 'Slovenia', 0, 196),
(197, 'SB', 'Solomon Islands', 0, 197),
(198, 'SO', 'Somalia', 0, 198),
(199, 'ZA', 'South Africa', 0, 199),
(200, 'KR', 'South Korea', 0, 200),
(201, 'ES', 'Spain', 0, 201),
(202, 'LK', 'Sri Lanka', 0, 202),
(203, 'SD', 'Sudan', 0, 203),
(204, 'SR', 'Suriname', 0, 204),
(205, 'SJ', 'Svalbard and Jan Mayen Islands', 0, 205),
(206, 'SZ', 'Swaziland', 0, 206),
(207, 'SE', 'Sweden', 0, 207),
(208, 'CH', 'Schweiz', 1, 208),
(209, 'SY', 'Syria', 0, 209),
(210, 'TJ', 'Tadjikistan', 0, 210),
(211, 'TW', 'Taiwan', 0, 211),
(212, 'TZ', 'Tanzania', 0, 212),
(213, 'TH', 'Thailand', 0, 213),
(214, 'TG', 'Togo', 0, 214),
(215, 'TK', 'Tokelau', 0, 215),
(216, 'TO', 'Tonga', 0, 216),
(217, 'TT', 'Trinidad and Tobago', 0, 217),
(218, 'TN', 'Tunisia', 0, 218),
(219, 'TR', 'Turkey', 0, 219),
(220, 'TM', 'Turkmenistan', 0, 220),
(221, 'TC', 'Turks and Caicos Islands', 0, 221),
(222, 'TV', 'Tuvalu', 0, 222),
(223, 'UG', 'Uganda', 0, 223),
(224, 'UA', 'Ukraine', 0, 224),
(225, 'AE', 'United Arab Emirates', 0, 225),
(226, 'UK', 'United Kingdom', 0, 226),
(227, 'US', 'United States', 0, 227),
(228, 'UY', 'Uruguay', 0, 228),
(229, 'UZ', 'Uzbekistan', 0, 229),
(230, 'VU', 'Vanuatu', 0, 230),
(231, 'VA', 'Vatican City State', 0, 231),
(232, 'VE', 'Venezuela', 0, 232),
(233, 'VN', 'Vietnam', 0, 233),
(234, 'VG', 'Virgin Islands (British)', 0, 234),
(235, 'VI', 'Virgin Islands (USA)', 0, 235),
(236, 'WF', 'Wallis and Futuna Islands', 0, 236),
(237, 'EH', 'Western Sahara', 0, 237),
(238, 'YE', 'Yemen', 0, 238),
(239, 'ZR', 'Zaire', 0, 239),
(240, 'ZM', 'Zambia', 0, 240),
(241, 'ZW', 'Zimbabwe', 0, 241);

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
  `stateID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `stateName` varchar(50) NOT NULL,
  `countryID` varchar(3) NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  PRIMARY KEY (`stateID`),
  KEY `stateName` (`stateName`),
  KEY `countryID` (`countryID`),
  KEY `unq1` (`countryID`,`stateName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=7599 ;

--
-- Dumping data for table `pet_state`
--

INSERT INTO `pet_state` (`stateID`, `stateName`, `countryID`, `latitude`, `longitude`) VALUES
(1145, 'Andhra Pradesh', 'IND', NULL, NULL),
(1146, 'Arunachal Pradesh', 'IND', NULL, NULL),
(1147, 'Assam', 'IND', NULL, NULL),
(1148, 'Bihar', 'IND', NULL, NULL),
(1149, 'Chandigarh', 'IND', NULL, NULL),
(1150, 'Dadra & Nagar Haveli', 'IND', NULL, NULL),
(1151, 'Daman & Diu', 'IND', NULL, NULL),
(1152, 'Delhi', 'IND', NULL, NULL),
(1153, 'Goa', 'IND', NULL, NULL),
(1154, 'Gujarat', 'IND', NULL, NULL),
(1155, 'Haryana', 'IND', NULL, NULL),
(1156, 'Himachal Pradesh', 'IND', NULL, NULL),
(1157, 'Jammu & Kashmir', 'IND', NULL, NULL),
(1158, 'Jharkhand', 'IND', NULL, NULL),
(1159, 'Karnataka', 'IND', NULL, NULL),
(1160, 'Kerala', 'IND', NULL, NULL),
(1161, 'Lakshadweep', 'IND', NULL, NULL),
(1162, 'Madhya Pradesh', 'IND', NULL, NULL),
(1163, 'Maharashtra', 'IND', NULL, NULL),
(1164, 'Manipur', 'IND', NULL, NULL),
(1165, 'Meghalaya', 'IND', NULL, NULL),
(1166, 'Mizoram', 'IND', NULL, NULL),
(1167, 'Nagaland', 'IND', NULL, NULL),
(1168, 'Orissa', 'IND', NULL, NULL),
(1169, 'Pondicherry', 'IND', NULL, NULL),
(1170, 'Punjab', 'IND', NULL, NULL),
(1171, 'Rajasthan', 'IND', NULL, NULL),
(1172, 'Sikkim', 'IND', NULL, NULL),
(1173, 'Tamil Nadu', 'IND', NULL, NULL),
(1174, 'Tripura', 'IND', NULL, NULL),
(1175, 'Uttaranchal', 'IND', NULL, NULL),
(1176, 'Uttar Pradesh', 'IND', NULL, NULL),
(1177, 'West Bengal', 'IND', NULL, NULL),
(1178, 'Chhattisgarh', 'IND', NULL, NULL),
(7598, 'Andaman & Nicobar Islands', 'IND', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pet_user`
--

INSERT INTO `pet_user` (`id`, `email`, `password_hash`, `password_reset_token`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin@heropet.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', NULL, 1, 1, '2015-03-17 00:00:00', '2015-03-19 13:37:17'),
(3, 'nadesh@arkinfotec.com', 'ce736b2b2ab6d81a7a2b739b720ce499538919820a75ffb1f0521ffc245235f90d771af6e59d7d80b82135dfc621544bb3605331c8e50ea76e1f047880e5e294', NULL, 2, 1, '2015-03-19 13:23:45', '2015-03-19 18:58:04');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pet_city`
--
ALTER TABLE `pet_city`
  ADD CONSTRAINT `FK_pet_city_state` FOREIGN KEY (`stateID`) REFERENCES `pet_state` (`stateID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pet_user`
--
ALTER TABLE `pet_user`
  ADD CONSTRAINT `FK_pet_user_role` FOREIGN KEY (`role`) REFERENCES `pet_master_role` (`Master_Role_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
