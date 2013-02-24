-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.29-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             7.0.0.4315
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for a1-sales
DROP DATABASE IF EXISTS `a1-sales`;
CREATE DATABASE IF NOT EXISTS `a1-sales` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `a1-sales`;


-- Dumping structure for table a1-sales.customers
DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `Cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyName` varchar(50) DEFAULT NULL,
  `ContactFirstName` varchar(50) DEFAULT NULL,
  `ContactLastName` varchar(50) DEFAULT NULL,
  `Address1` varchar(50) DEFAULT NULL,
  `Address2` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `zip` varchar(15) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `SalesRep` varchar(11) DEFAULT NULL,
  `DateEntered` date DEFAULT NULL,
  `Memo` blob,
  `CreditLimit` double DEFAULT NULL,
  `PriceLevel` varchar(50) DEFAULT NULL,
  `FavorateColor` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `IMGPhoto` varchar(255) DEFAULT NULL,
  `Languages` varchar(100) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `Year` year(4) DEFAULT NULL,
  `DateTime` datetime DEFAULT NULL,
  `TimeStamp` timestamp NULL DEFAULT NULL,
  `Notes` longtext,
  PRIMARY KEY (`Cust_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table a1-sales.customers: 12 rows
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`Cust_id`, `CompanyName`, `ContactFirstName`, `ContactLastName`, `Address1`, `Address2`, `City`, `State`, `zip`, `Phone`, `Email`, `Password`, `SalesRep`, `DateEntered`, `Memo`, `CreditLimit`, `PriceLevel`, `FavorateColor`, `Status`, `IMGPhoto`, `Languages`, `Date`, `Time`, `Year`, `DateTime`, `TimeStamp`, `Notes`) VALUES
	(1, 'A1-SALES', 'Joe', 'gains', '3923 JACKSON', '', 'MEMPHIS', 'TN', '38128', '901 279-9350', 'cspeerly@gmail.com', NULL, '2', '2012-12-18', NULL, 1000, 'LEVEL-1', 'a:1:{i:0;s:4:"Blue";}', 'ACTIVE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 'C-SALES', 'BOB', 'LINDER', '456 COUNTY ROAD 69', '', 'Dalas', 'TX', '75704', '', '', NULL, '1', '2012-11-02', NULL, 1000, '2', 'a:1:{i:0;s:5:"White";}', 'ACTIVE', 'uploads/admin16.jpg', 'a:3:{i:0;s:4:"ajax";i:1;s:4:"html";i:2;s:3:"css";}', '2013-02-22', NULL, NULL, NULL, NULL, NULL),
	(7, 'F-KIDS', 'JOSH', 'CARTERUGHT', '', '', 'WEST MEMPHIS', 'AR', '', '', '', NULL, '1', '2012-11-20', NULL, 1000, 'LEVEL-1', 'a:1:{i:0;s:6:"Yellow";}', 'ACTIVE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 'B-SALES', 'STEVE', 'COCKRAN', '2nd atreet', '', 'MORTON', 'IL', '61550', '', 'sn@mail.com', NULL, '2', '2012-11-14', NULL, 1000, 'LEVEL-1', 'a:1:{i:0;s:5:"Green";}', 'ACTIVE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, 'D-SALES', 'LARRY', 'BLACK', '', '', 'WASHINGTON', 'IL', '61571', '', '', NULL, '1', '2012-11-28', NULL, 1000, 'LEVEL-1', 'a:1:{i:0;s:5:"White";}', 'ACTIVE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 'E-SALES', 'DON', 'TRUMP', '', '', 'DUNLAP', 'TN', '38128', '', '', NULL, '1', '2012-11-14', NULL, 1000, 'LEVEL-1', 'a:2:{i:0;s:4:"Blue";i:1;s:3:"Red";}', 'ACTIVE', NULL, 'a:1:{i:0;s:3:"php";}', NULL, NULL, NULL, NULL, NULL, NULL),
	(6, 'F-SALES', 'WANDA', 'TILLEY', '3923 JACKSON', '', 'MEMPHIS', 'TN', '38128', '', '', NULL, '1', '2012-11-28', NULL, 1000, 'LEVEL-1', 'a:1:{i:0;s:3:"Red";}', 'ACTIVE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(8, 'F-KIDS', 'CHAD', 'SNIDER', '', '', '', 'CA', '', '', '', NULL, '1', '2012-11-06', NULL, 1000, 'LEVEL-1', 'a:1:{i:0;s:3:"Red";}', 'ACTIVE', NULL, 'a:1:{i:0;s:3:"asp";}', NULL, NULL, NULL, NULL, NULL, NULL),
	(9, 'f-SALES', 'randy', 'SMITH', '3923 JACKSON', '', 'MEMPHIS', 'TN', '38018', '', '', NULL, '1', '2012-11-28', NULL, 1000, 'LEVEL-1', 'a:1:{i:0;s:4:"Blue";}', 'ACTIVE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(10, 'F-SALES', 'JENNIFER', 'FIBBLEY', '', '', 'CORDOVA', 'TN', '38118', '', '', NULL, '1', '2012-11-28', NULL, 1000, 'LEVEL-1', 'a:1:{i:0;s:5:"Green";}', 'ACTIVE', 'uploads/4-3.jpg', 'a:3:{i:0;s:4:"html";i:1;s:3:"css";i:2;s:4:"ajax";}', NULL, NULL, NULL, NULL, NULL, NULL),
	(11, 'A3-SALES', 'GARY', 'PARBISKI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2013-01-12', NULL, NULL, '3', 'a:1:{i:0;s:6:"Yellow";}', NULL, NULL, 'a:2:{i:0;s:3:"css";i:1;s:4:"ajax";}', NULL, NULL, NULL, NULL, NULL, NULL),
	(12, 'A2-SALES', 'KELLY', 'HASTY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2013-02-22', NULL, NULL, '2', 'a:1:{i:0;s:3:"Red";}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
