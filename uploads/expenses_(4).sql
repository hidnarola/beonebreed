-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2015 at 09:59 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `merchinm_mimtuit`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `NET` float NOT NULL,
  `GST` float NOT NULL,
  `total` float NOT NULL,
  `show_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `item`, `description`, `NET`, `GST`, `total`, `show_id`, `created`) VALUES
(1, '', 'dfdf', 4, 5, 0, 0, '2015-10-24 00:00:00'),
(2, '', 'dfdf', 34, 34, 0, 0, '2015-10-24 00:00:00'),
(3, '', 'sdsd', 0, 0, 0, 0, '2015-10-24 00:00:00'),
(4, '', 'sdsd', 45, 45, 0, 0, '2015-10-24 00:00:00'),
(5, '', 'sdsd', 45, 45, 0, 0, '2015-10-24 00:00:00'),
(6, '', 'sdsd', 45, 45, 0, 0, '2015-10-24 00:00:00'),
(7, '', 'sdsd', 45, 45, 0, 0, '2015-10-24 00:00:00'),
(8, '', 'sdsd', 45, 45, 0, 0, '2015-10-24 00:00:00'),
(9, 'sdsd', 'sdsd', 52, 2, 54, 0, '2015-10-24 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
