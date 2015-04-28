-- phpMyAdmin SQL Dump
-- version 3.4.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2012 at 06:44 AM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `brownbag`
--
CREATE DATABASE `brownbag` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `brownbag`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customerID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `lname` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(40) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `fname`, `lname`, `username`, `password`) VALUES
(1, 'Alex', 'Robinson', 'arob', 'mypass'),
(2, 'Robert', 'Rolapp', 'rrol', 'something'),
(3, 'Kim', 'Carling', 'kcar', 'something');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `orderID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customerID` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `paid` tinyint(4) NOT NULL,
  PRIMARY KEY (`orderID`),
  KEY `customerID` (`customerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `customerID`, `order_date`, `paid`) VALUES
(2, 2, '2012-01-03', 1),
(3, 2, '2012-01-04', 0),
(4, 3, '2012-01-05', 0),
(22, 1, '2012-01-11', 1),
(23, 1, '2012-01-12', 0),
(24, 2, '2012-01-09', 0),
(25, 2, '2012-01-10', 1),
(26, 2, '2012-01-12', 0),
(27, 3, '2012-01-09', 1),
(29, 3, '2012-01-13', 0),
(32, 1, '2012-01-05', 0),
(33, 1, '2012-01-03', 1),
(34, 1, '2012-01-04', 0),
(35, 2, '2012-01-11', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
