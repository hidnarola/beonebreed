-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2016 at 08:16 AM
-- Server version: 5.6.17
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
-- Table structure for table `quality_notes`
--

CREATE TABLE IF NOT EXISTS `quality_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quality_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `quality_notes`
--

INSERT INTO `quality_notes` (`id`, `quality_id`, `name`, `description`, `created_date`, `modified_date`) VALUES
(1, 15, 'sdasd', 'sdasdasdasd', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 15, 'sdasd', 'sdasdasdasd', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 15, 'tester', 'http://beonebreed/mondou/quality/add_next/15http://beonebreed/mondou/quality/add_next/15http://beonebreed/mondou/quality/add_next/15http://beonebreed/mondou/quality/add_next/15http://beonebreed/mondou/quality/add_next/15http://beonebreed/mondou/quality/add_next/15http://beonebreed/mondou/quality/add_next/15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 17, 'sds', 'dsdsdsd', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 0, 'tester', 'testertestertestertestertestertestertestertestertestertestertestertester', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 0, 'tester tester', 'tester testertester testertester testertester testertester testertester testertester tester', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 4, 'tester', 'testertestertestertestertestertestertestertestertestertestertestertester', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
