-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Nov 24, 2019 at 06:41 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petmart`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `orderDisplay`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `orderDisplay` ()  SELECT * from orders$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

DROP TABLE IF EXISTS `admintable`;
CREATE TABLE IF NOT EXISTS `admintable` (
  `uname` varchar(50) NOT NULL,
  `rest_addr` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`uname`, `rest_addr`, `phone`, `password`) VALUES
('admin', 'abc', '9611', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`fname`, `lname`, `gender`, `email`, `mobile`, `address`, `dob`, `password`) VALUES
('', '', '', '', '', '', '0000-00-00', ''),
('adarsh', 'rm', 'male', 'adarshmohana1999@gmail.com', '8694077802', 'Arakalagudu', '1998-09-11', 'adarsh123'),
('admin', 'adarsh', 'male', 'admin', '123456789', 'aarusha homes', '1998-09-11', 'admin'),
('jdc', 'harsha', 'male', 'harsha30997@gmail.com', '678940443', '32, B BLOCK 4TH MAIN 6TH CROSS ,GURUDARSHAN LAYOUT VIDYARANYAPURA', '2019-11-06', '789'),
('hello', 'world', 'female', 'h@gmail.com', '1234', '32, B BLOCK 4TH MAIN 6TH CROSS ,GURUDARSHAN LAYOUT VIDYARANYAPURA', '2019-11-15', 'world'),
('jdcc', 'jc', 'male', 'kdiv0309@gmail.com', '098989898', '32, B BLOCK 4TH MAIN 6TH CROSS ,GURUDARSHAN LAYOUT VIDYARANYAPURA', '2019-11-12', '098'),
('rajath', 'gowda', 'male', 'rajathngowda3@gmail.com', '7090951583', 'arakalgud', '2000-01-03', 'rajath'),
('Rashmi ', ' Rakshith', 'male', 'rakshith07@gmail.com', '8151810465', 'tumkur', '1998-11-28', '3541');

--
-- Triggers `login`
--
DROP TRIGGER IF EXISTS `deletetrigger`;
DELIMITER $$
CREATE TRIGGER `deletetrigger` AFTER DELETE ON `login` FOR EACH ROW INSERT INTO login_log VALUES(null, OLD.email,'DELETED', NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `inserttrigger`;
DELIMITER $$
CREATE TRIGGER `inserttrigger` AFTER INSERT ON `login` FOR EACH ROW INSERT INTO login_log VALUES(null, NEW.email,'REGISTERED', NOW())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `updatetrigger`;
DELIMITER $$
CREATE TRIGGER `updatetrigger` AFTER UPDATE ON `login` FOR EACH ROW INSERT INTO login_log VALUES(null, NEW.email,'UPDATED', NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

DROP TABLE IF EXISTS `login_log`;
CREATE TABLE IF NOT EXISTS `login_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `operation` varchar(20) NOT NULL,
  `logtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_log`
--

INSERT INTO `login_log` (`id`, `email`, `operation`, `logtime`) VALUES
(5, 'amullk008@gmail.com', 'UPDATED', '2018-11-23 11:24:53'),
(4, 'amullk008@gmail.com', 'REGISTERED', '2018-11-23 11:22:52'),
(6, 'amullk008@gmail.com', 'DELETED', '2018-11-23 11:25:52'),
(7, 'b@mail.com', 'REGISTERED', '2018-11-24 05:46:28'),
(8, 'b@mail.com', 'UPDATED', '2018-11-24 05:47:41'),
(9, 'b@mail.com', 'DELETED', '2018-11-24 05:47:54'),
(10, 'admin', 'UPDATED', '2018-11-25 09:44:23'),
(11, 'shreeharsha@gmail.com', 'REGISTERED', '2019-11-09 12:55:38'),
(12, 'kdiv0309@gmail.com', 'REGISTERED', '2019-11-10 07:32:42'),
(13, 'h@gmail.com', 'REGISTERED', '2019-11-13 07:15:13'),
(14, '', 'REGISTERED', '2019-11-17 15:16:54'),
(15, 'shivam@gmail.com', 'UPDATED', '2019-11-21 16:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `datetime` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `itemname` (`itemname`),
  KEY `orders_ibfk_2` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `email`, `fname`, `mobile`, `address`, `itemname`, `quantity`, `datetime`) VALUES
(81, 'h@gmail.com', 'hello', '1234', '32, B BLOCK 4TH MAIN 6TH CROSS ,GURUDARSHAN LAYOUT VIDYARANYAPURA', 'Cat Dog Pet Hair Fur Remover', 2, '2019-11-13'),
(85, 'rakshi30997@gmail.com', 'jdc', '678940443', '32, B BLOCK 4TH MAIN 6TH CROSS ,GURUDARSHAN LAYOUT VIDYARANYAPURA', 'Cat Dog Pet Hair Fur Remover', 1, '2019-11-13'),
(86, 'harsha30997@gmail.com', 'jdc', '678940443', '32, B BLOCK 4TH MAIN 6TH CROSS ,GURUDARSHAN LAYOUT VIDYARANYAPURA', 'Choostix Dog Bath Glove 1 pc', 1, '2019-11-13'),
(87, 'shivam30997@gmail.com', 'jdc', '678940443', '32, B BLOCK 4TH MAIN 6TH CROSS ,GURUDARSHAN LAYOUT VIDYARANYAPURA', 'KONG Dog Grooming Brush', 1, '2019-11-13'),
(88, 'h@gmail.com', 'hello', '1234', '32, B BLOCK 4TH MAIN 6TH CROSS ,GURUDARSHAN LAYOUT VIDYARANYAPURA', 'Forbis Aloe Rinse Conditioner', 1, '2019-11-13'),
(89, 'shree30997@gmail.com', 'jdc', '678940443', '32, B BLOCK 4TH MAIN 6TH CROSS ,GURUDARSHAN LAYOUT VIDYARANYAPURA', 'Choostix Dog Bath Glove 1 pc', 1, '2019-11-17'),
(91, 'rakshith30997@gmail.com', 'jdc', '678940443', '32, B BLOCK 4TH MAIN 6TH CROSS ,GURUDARSHAN LAYOUT VIDYARANYAPURA', 'BEAGLE PUP', 1, '2019-11-22'),
(92, 'harshasri997@gmail.com', 'jdc', '678940443', '32, B BLOCK 4TH MAIN 6TH CROSS ,GURUDARSHAN LAYOUT VIDYARANYAPURA', 'Cat Dog Pet Hair Fur Remover', 1, '2019-11-22'),
(93, 'rakshithr07@gmail.com', 'jdc', '678940443', '32, B BLOCK 4TH MAIN 6TH CROSS ,GURUDARSHAN LAYOUT VIDYARANYAPURA', 'LABRADOR RETRIEVER', 1, '2019-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `pricelist`
--

DROP TABLE IF EXISTS `pricelist`;
CREATE TABLE IF NOT EXISTS `pricelist` (
  `itemname` varchar(30) NOT NULL,
  `price` bigint(20) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pricelist`
--

INSERT INTO `pricelist` (`itemname`, `price`) VALUES
('BEAGLE PUP', 4000),
('Bell Buckle Velvet Neck Strap', 500),
('Cat Dog Pet Hair Fur Remover', 2567),
('Choostix Dog Bath Glove 1 pc', 260),
('Doxters S14 Cotton Dog TShirt', 300),
('Drools Chicken and Egg pf', 880),
('Drools Kitten Dry Cat Food', 664),
('Fiprotic Tick  Flea free Spray', 400),
('Forbis Aloe Rinse Conditioner', 1000),
('Frontline Dog Spot', 1400),
('Himalaya Flea And Tick Shampoo', 206),
('HIMALAYAN BREED', 10000),
('Itch Soothing Dog Shampoo', 945),
('KONG Dog Grooming Brush', 1020),
('LABRADOR RETRIEVER', 10000),
('Maharsh  Pet Bathing Tool', 900),
('MAIN COON', 8000),
('MALE HUSKY', 35000),
('Meat Up Adult Dog Food', 630),
('Meo PERSIAN Cat Food', 330),
('Notix Pet Care Powder', 400),
('OUT Flea and Tick Spray', 900),
('Pedigree Adult Meat & Rice', 540),
('PERSIAN', 6000),
('Petkin Liquid Oral Care', 220),
('Petkin Pet Dental Food Spray', 310),
('Petkin Tooth-wipes', 530),
('Petsfusion Dtp56 S Pet Bed', 800),
('Purepet Chicken Vegetables pf', 1150),
('RoyalCanin Second Age Cat Food', 300),
('Shiny-tea Tree Oil Dog Shampoo', 220),
('SHORT HAIR BREED', 15000),
('SIBERIAN HUSKY', 20000),
('Smarty Pet Nylon Soft Harness', 500),
('Trixie Dog Dental Hygiene Kit ', 428),
('Whiskas Gravy Cat Treat', 80);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `Sl. no.` int(11) NOT NULL AUTO_INCREMENT,
  `emailid` varchar(50) NOT NULL,
  `reviews` varchar(1000) NOT NULL,
  `radio` varchar(20) NOT NULL,
  PRIMARY KEY (`Sl. no.`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`Sl. no.`, `emailid`, `reviews`, `radio`) VALUES
(1, 'adarshmohana1998@gmail.com', 'Nice Attempt', 'GOOD'),
(2, 'amulkathare15@gmail.com', 'not bad', 'AVERAGE'),
(3, 'amulkathare15@gmail.com', 'good', 'GOOD'),
(4, 'adarshmohana1999@gmail.com', 'Nice work', 'EXCELLENT');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `pricelist` (`itemname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`email`) REFERENCES `login` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
