-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 192.168.1.201
-- Generation Time: Jan 04, 2016 at 02:10 PM
-- Server version: 5.5.32
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `beonebreed`
--

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `contact` text NOT NULL,
  `fax` varchar(50) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `user_id`, `name`, `address`, `telephone`, `contact`, `fax`, `is_deleted`) VALUES
(53, 0, 'asdsdsd', 'sdsdsd', 'sdsd', 'sdsd', 'sdsd', 1),
(54, 2, 'asdsdsd1', 'sdsdsd', 'sdsd', 'sdsd', 'sdsd', 0),
(55, 0, 'asdsdsd', 'sdsdsd', 'sdsd', 'sdsd', 'sdsd', 0),
(56, 0, 'asdsdsd', 'sdsdsd', 'sdsd', 'sdsd', 'sdsd', 0),
(57, 0, 'asdsdsd', 'sdsdsd', 'sdsd', 'sdsd', 'sdsd', 0),
(58, 0, 'asdsdsd', 'sdsdsd', 'sdsd', 'sdsd', 'sdsd', 0),
(59, 0, 'asdsdsd', 'sdsdsd', 'sdsd', 'sdsd', 'sdsd', 0),
(60, 0, 'asdsdsd', 'sdsdsd', 'sdsd', 'sdsd', 'sdsd', 0),
(61, 0, 'asdsdsd', 'sdsdsd', 'sdsd', 'sdsd', 'sdsd', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
