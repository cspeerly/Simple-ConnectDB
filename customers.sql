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
  `password` varchar(50) DEFAULT NULL,
  `SalesRep` varchar(50) DEFAULT NULL,
  `DateEntered` date DEFAULT NULL,
  `Memo` longtext,
  `CreditLimit` double DEFAULT NULL,
  `PriceLevel` varchar(50) DEFAULT NULL,
  `FavorateColor` varchar(100) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `IMGPhoto` varchar(255) DEFAULT NULL,
  `Languages` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`Cust_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5655 DEFAULT CHARSET=latin1;

-- Dumping data for table a1-sales.customers: 12 rows
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`Cust_id`, `CompanyName`, `ContactFirstName`, `ContactLastName`, `Address1`, `Address2`, `City`, `State`, `zip`, `Phone`, `Email`, `password`, `SalesRep`, `DateEntered`, `Memo`, `CreditLimit`, `PriceLevel`, `FavorateColor`, `Status`, `IMGPhoto`, `Languages`) VALUES
	(1, 'A1-SALES', 'CHUCK', 'GREEN', '3923 JACKSON', '', 'MEMPHIS', 'TN', '38128', '901 555 1515', 'cspeerly@gmail.com', NULL, 'Chuck', '2012-12-05', '<h1><b><i>The Big Bad Homer<img alt="" src="http://localhost/simple/uploads/admin16.jpg"></i></b></h1>', 1000, '2', 'a:1:{i:0;s:5:"Green";}', 'Non-Active', 'uploads/Chuck.jpg', 'a:4:{i:0;s:3:"asp";i:1;s:3:"php";i:2;s:3:"css";i:3;s:4:"html";}'),
	(2, 'C-SALES', 'BOBBY', 'HAILEY', '12875 COUNTY ROAD 42', '', 'TYLER', 'TN', '75704', '', '', NULL, 'Nolan', '2012-11-05', '', 1000, '3', 'a:2:{i:0;s:3:"Red";i:1;s:5:"White";}', 'ACTIVE', 'uploads/3-3.jpg', ''),
	(6, 'F-KIDS', 'BOB', 'Jones', '', '', 'TYLER', 'TX', '38128', NULL, NULL, NULL, 'Bill', '2011-02-04', '<h1><b><i>SAY Hello, SIMPLE&nbsp;<img alt="" src="http://localhost/simple/uploads/admin16.jpg"></i></b></h1>', 5000, '3', 'a:2:{i:0;s:4:"Blue";i:1;s:3:"Red";}', 'ACTIVE', 'uploads/chuck.jpg', ''),
	(3, 'B-SALES', 'STEVE', 'ELLIOTT', '2nd atreet', '', 'MORTON', 'IL', '61550', '', 'sn@mail.com', NULL, 'Chuck', '2012-11-14', '', 1000, '1', 'a:2:{i:0;s:3:"Red";i:1;s:6:"Yellow";}', 'ACTIVE', 'uploads/admin16.jpg', ''),
	(4, 'D-SALES', 'LARRY', 'JOHNSON', '', '', 'WASHINGTON', 'IL', '61571', '', '', NULL, 'Bill', '2012-11-28', '', 1000, '1', 'a:2:{i:0;s:5:"Green";i:1;s:5:"White";}', 'ACTIVE', 'uploads/admin16.jpg', ''),
	(5, 'A2-SALES', 'DON', 'TRUMP', 'HAYS RD', '', 'DUNLAP', 'TN', '37327', '', '', NULL, 'Chuck', '2012-11-14', '', 1000, '2', 'a:1:{i:0;s:4:"Blue";}', 'ACTIVE', 'uploads/admin16.jpg', 'a:1:{i:0;s:4:"html";}'),
	(11, 'F-SALES', 'WANDA', 'RAINS', '3923 JACKSON', '', 'MEMPHIS', 'RI', '38128', '901 555-5555', 'wdorsey@mail.com', NULL, 'Nolan', '2012-11-28', '', 1000, '1', 'a:1:{i:0;s:4:"Blue";}', 'Active', 'uploads/admin16.jpg', 'a:1:{i:0;s:3:"php";}'),
	(7, 'F-KIDS', 'Chad', 'SMITH', '', NULL, 'CHINA', 'TN', '38127', '', '', NULL, 'Bill', '2012-11-06', '', 1000, '2', 'a:3:{i:0;s:4:"Blue";i:1;s:3:"Red";i:2;s:5:"White";}', 'Vaccation', 'uploads/admin16.jpg', 'a:2:{i:0;s:3:"css";i:1;s:4:"ajax";}'),
	(9, 'AK1-SALES', 'RANDY', 'PARKS', '3923 JACKSON', '', 'MEMPHIS', 'TN', '38128', '901 259-7002', '', NULL, 'Bill', '2012-11-05', '', 500, '2', 'a:2:{i:0;s:4:"Blue";i:1;s:3:"Red";}', 'Non-Active', 'uploads/admin16.jpg', ''),
	(8, 'F-SALES', 'JENNIFER', 'MEEKS', '', '', 'CORDOVA', 'TN', '38118', '', '', NULL, 'Chuck', '2012-11-28', '', 1000, '2', 'a:2:{i:0;s:4:"Blue";i:1;s:5:"White";}', 'ACTIVE', 'uploads/admin16.jpg', ''),
	(10, 'A2-SALES', 'GREG', 'RATTER', '1999 Some Street', '', 'MEMPHIS', 'TN', '38128', '555 555-5555', '', 'PASSWORD', 'Chuck', '2013-01-08', '', 1000, '2', 'a:5:{i:0;s:4:"Blue";i:1;s:5:"Green";i:2;s:3:"Red";i:3;s:5:"White";i:4;s:6:"Yellow";}', 'ACTIVE', 'uploads/admin16.jpg', ''),
	(12, 'A3-SALES', 'JOE', 'ALLEN', '222 Sam Rd', NULL, 'PEORIA', 'GA', '38128', '901 555-1212', NULL, NULL, 'Kevin', '2013-02-04', '', 100, '1', 'a:1:{i:0;s:5:"White";}', 'Active', 'uploads/admin16.jpg', '');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
