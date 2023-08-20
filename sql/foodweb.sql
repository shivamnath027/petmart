-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2018 at 08:40 AM
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
-- Database: `foodweb`
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
('udupi_admin', 'Udupi Upahar,\r\nKirloskar Layout,\r\nBengaluru-90', '9448655008', '12345');

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
('adarsh', 'rm', 'male', 'adarshmohana1999@gmail.com', '8694077802', 'Arakalagudu', '1998-09-11', 'adarsh123'),
('admin', 'adarsh', 'male', 'admin', '123456789', 'aarusha homes', '1998-09-11', 'admin'),
('rajath', 'gowda', 'male', 'rajathngowda3@gmail.com', '7090951583', 'arakalgud', '2000-01-03', 'rajath'),
('Rashmi ', ' R M', 'female', 'rashmirm2811@gmail.com', '8151810465', 'rudrapatna', '1998-11-28', '3541');

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
  `logtime` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
(10, 'admin', 'UPDATED', '2018-11-25 09:44:23');

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
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `itemname` (`itemname`),
  KEY `orders_ibfk_2` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `email`, `fname`, `mobile`, `address`, `itemname`, `quantity`, `datetime`) VALUES
(35, 'adarshmohana1999@gmail.com', 'adarsh', '8694077802', 'Arakalagudu', 'Alu Paratha', 2, '2018-11-20 14:17:46'),
(36, 'adarshmohana1999@gmail.com', 'adarsh', '8694077802', 'Arakalagudu', 'Hydrabadi Meal', 2, '2018-11-20 14:27:02'),
(37, 'adarshmohana1999@gmail.com', 'adarsh', '8694077802', 'Arakalagudu', 'South Indian Meal', 1, '2018-11-20 14:18:32'),
(38, 'adarshmohana1999@gmail.com', 'adarsh', '8694077802', 'Arakalagudu', 'Mango Lassi', 2, '2018-11-20 14:19:04'),
(39, 'admin', 'admin', '123', 'admin', 'Rajastani Meal', 8, '2018-11-24 05:52:04'),
(40, 'admin', 'admin', '123456', 'aarusha homes', 'Ginger Tea', 4, '2018-11-24 05:52:17'),
(42, 'admin', 'admin', '123456', 'aarusha homes', 'Masala Soda', 3, '2018-11-25 09:43:49'),
(43, 'admin', 'admin', '123456789', 'aarusha homes', 'Mango Lassi', 3, '2018-11-26 03:55:24');

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
('Alu Paratha', 40),
('Butter Masala Dosa', 50),
('Chicken Cutlet', 80),
('Chinese Noodles', 50),
('Chole Bhature', 50),
('Coke', 25),
('Ginger Tea', 20),
('Gobi Manchurian', 50),
('Hydrabadi Meal', 150),
('Idli Vada', 40),
('Italian Pasta', 50),
('Mango Lassi', 40),
('Masala Soda', 20),
('North Indian Meal', 100),
('Poha', 30),
('Punjabi Meal', 120),
('Rajastani Meal', 150),
('South Indian Meal', 100),
('Strawberry Milkshake', 50),
('Vada Pav', 35);

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
