-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2015 at 08:47 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `property`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '75d23af433e0cea4c0e45a56dba18b30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `category_description` varchar(360) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `category_description`) VALUES
(36, 'c3', 'asasas'),
(37, 'c8', 'asasas'),
(38, 'c1', 'asas'),
(39, 'c7', 'asasas'),
(40, 'c2', 'asas'),
(41, 'c6', 'asasas'),
(42, 'c5', 'asasas'),
(43, 'c4', 'asasas'),
(44, 'c9', 'dfdfdf'),
(45, 'c10', 'nhhjhjhjhj'),
(46, 'asdsd', 'sdsd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_info`
--

CREATE TABLE IF NOT EXISTS `tbl_contact_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(360) NOT NULL,
  `telephone_number` varchar(15) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `fax` int(11) NOT NULL,
  `company_url` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE IF NOT EXISTS `tbl_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `property_image` varchar(360) DEFAULT NULL,
  `thumb1` varchar(350) DEFAULT NULL,
  `thumb2` varchar(350) DEFAULT NULL,
  `thumb3` varchar(350) DEFAULT NULL,
  `thumb4` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`id`, `property_id`, `property_image`, `thumb1`, `thumb2`, `thumb3`, `thumb4`) VALUES
(9, 45, '223.png', '', '', '', 'diabeties14.png'),
(10, 46, '132.png', '', '', '', ''),
(11, 47, '224.png', NULL, NULL, NULL, NULL),
(12, 48, '133.png', '225.png', '', '', ''),
(13, 49, '226.png', '', '', '', ''),
(14, 50, '135.png', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_property`
--

CREATE TABLE IF NOT EXISTS `tbl_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `short_description` varchar(100) NOT NULL,
  `long_description` varchar(360) NOT NULL,
  `city` varchar(30) NOT NULL,
  `no_of_rooms` int(11) NOT NULL,
  `no_of_bathrooms` int(11) NOT NULL,
  `surface` varchar(20) NOT NULL,
  `construction_year` varchar(20) NOT NULL,
  `other_utilities` varchar(360) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `tbl_property`
--

INSERT INTO `tbl_property` (`id`, `title`, `price`, `short_description`, `long_description`, `city`, `no_of_rooms`, `no_of_bathrooms`, `surface`, `construction_year`, `other_utilities`, `category_id`) VALUES
(45, 'mtest1', '34', 'dsd', 'sdsds', '', 0, 0, '', '', '', 36),
(46, 'test2', '45', '', '', '', 0, 0, '', '', '', 36),
(47, 'test3', '40', '', '', '', 0, 0, '', '', '', 0),
(48, 'test4', 'asas', '', '', '', 0, 0, '', '', '', 44),
(50, 'dfdf1', 'dfdf', '', '', '', 0, 0, '', '', '', 36);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
