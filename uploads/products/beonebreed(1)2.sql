-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2015 at 01:25 PM
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
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL,
  `updated_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_date`, `updated_date`) VALUES
(1, 'comfort', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'fun', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'well being', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL,
  `updated_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_date`, `updated_date`) VALUES
(1, 'Marketting', '2015-12-19 07:35:11', '2015-12-19 07:35:11'),
(2, 'Administration', '2015-12-19 07:35:11', '2015-12-19 07:35:11'),
(3, 'Management', '2015-12-19 07:35:32', '2015-12-19 07:35:32'),
(4, 'Quality', '2015-12-19 07:35:32', '2015-12-19 07:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `project_type_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `estimated_days` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `project_manager` varchar(30) NOT NULL,
  `quick_notes` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_date` timestamp NOT NULL,
  `updated_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `department_id`, `name`, `project_type_id`, `category_id`, `estimated_days`, `priority`, `project_manager`, `quick_notes`, `status`, `created_date`, `updated_date`) VALUES
(45, 0, 'ssdsd', 1, 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 0, 'sdsd', 1, 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 0, 'sdsd', 1, 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 0, 'sdsd', 1, 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 0, 'sdsdsd', 2, 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 0, 'test', 2, 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 0, 'test', 1, 1, 12, 1, '12', 'ererer', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 0, 'asas', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 0, 'asasas', 1, 2, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 0, 'fdf', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 0, 'sdsd', 1, 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 0, 'asasas', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 0, 'dssdsd', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 0, 'fdf', 2, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 0, 'asas', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 0, 'sdsd', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 0, 'asas', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 0, 'asas', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 0, 'asas', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 0, 'asas', 1, 1, 12, 2, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 0, 'asas', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 0, 'fgfg', 1, 0, 45, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 0, 'asas', 2, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 0, 'test', 1, 0, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 0, 'asas', 2, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 0, 'asas', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 0, 'sadsd', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 0, 'ass', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 0, 'asas', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 0, 'dfdf', 2, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 0, 'asas', 1, 2, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 0, 'asasas', 1, 2, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 0, 'asasas', 1, 2, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 0, 'asasas', 2, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 0, 'asasas', 2, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 0, 'asasas', 2, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 0, 'asasas', 2, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 0, 'asas', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 0, 'aasas', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 0, 'asasas', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 0, 'asas', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 0, 'asas', 2, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 0, 'asas', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 0, 'asas', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 0, 'sdsd', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 0, 'asas', 1, 1, 12, 2, 'manager', 'hii..soon these project will be started', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 0, 'testing', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 0, 'testing', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 0, 'testing', 1, 1, 0, 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_actionplan`
--

CREATE TABLE IF NOT EXISTS `project_actionplan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `action` varchar(360) NOT NULL,
  `resposible` varchar(360) NOT NULL,
  `mertic_key` varchar(360) NOT NULL,
  `complete_level` varchar(10) NOT NULL,
  `created_date` timestamp NOT NULL,
  `updated_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `project_actionplan`
--

INSERT INTO `project_actionplan` (`id`, `project_id`, `action`, `resposible`, `mertic_key`, `complete_level`, `created_date`, `updated_date`) VALUES
(6, 2, 'm2m2', 'responsible', 'test', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 2, 'sdsd', 'sdsd', 'sdsd', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 2, 'asasas', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 2, 'asasas', '', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 2, 'action to take1', 'responsible for', '12', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 10, 'action to take1', 'responsible for', '12', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 2, 'fdf', 'dfd', 'fdf', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 3, 'testing1', 'testing for1', 'tested1', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_attachments`
--

CREATE TABLE IF NOT EXISTS `project_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL,
  `updated_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `project_attachments`
--

INSERT INTO `project_attachments` (`id`, `project_id`, `name`, `created_date`, `updated_date`) VALUES
(6, 51, 'geospatial.zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 0, 'pagination_in_php_mysql.zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 0, 'fancyBox-master(1).zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 0, 'jquery-validation-1.14.0.zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 58, 'CakePHP-PayPalRest-Plugin-mast', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 59, 'import-excel-file-in-database1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 60, 'chosen-master2.zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 60, 'debug_kit-2.2.4.zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 63, 'google-api-php-client-master_(', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 63, 'google-api-php-client-master_(', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 63, 'merchinm_mimtuit_(1).sql', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 64, 'braintree_php-master_(1).zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 64, 'braintree_php-master_(1)1.zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 64, 'braintree_php-master_(1)2.zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 65, 'braintree-php-3.7.01.tgz', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 65, 'braintree-php-3.7.02.tgz', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 65, 'braintree-php-3.7.03.tgz', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 66, 'bootstrap-datepicker-1.4.0-dis', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 66, 'bootstrap-datepicker-1.4.0-dis', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 66, 'bootstrap-datepicker-1.4.0-dis', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 67, 'CodeIgniter-3.0.2.zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 68, 'codeigniter_captcha.zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 69, 'codeigniter-template-master.zi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 70, 'codeigniter_captcha1.zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 71, 'chosen-master3.zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 73, 'braintree_php-master_(1)3.zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 74, 'merchinm_mimtuit.zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 75, 'cakephp-2.6.1.zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 75, 'cakephp-social-share-2.x.zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 76, 'chosen-master4.zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 76, 'download_(2).jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 76, 'download_(2)1.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 0, 'cakephp-2.6.11.zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 0, 'cakephp-2.6.12.zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 0, 'import-excel-file-in-database2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 0, 'import-excel-file-in-database3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 0, 'cakephp-social-share-2.x1.zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 0, 'cakephp-social-share-2.x2.zip', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_external_notes`
--

CREATE TABLE IF NOT EXISTS `project_external_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `created_date` timestamp NOT NULL,
  `updated_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `project_external_notes`
--

INSERT INTO `project_external_notes` (`id`, `project_id`, `name`, `description`, `created_date`, `updated_date`) VALUES
(16, 0, 'asasa', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 0, 'asasa', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 0, 'sddsdsd', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 0, 'asasas', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 60, 'sdsdsd', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 67, 'asasasasasas', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 67, 'www.extra.com', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 72, 'asasasas', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 76, 'www.google.com', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 76, 'www.google.com', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 0, 'www.external.com', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 0, 'http://www.google.com', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 0, 'www.google.com', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_notes`
--

CREATE TABLE IF NOT EXISTS `project_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `created_date` timestamp NOT NULL,
  `updated_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `project_notes`
--

INSERT INTO `project_notes` (`id`, `project_id`, `name`, `description`, `created_date`, `updated_date`) VALUES
(18, 0, 'asas', 'asasas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 0, 'asas', 'asasas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 54, 'dfdf', 'dfdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 0, 'asas', 'asasas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 60, 'sdsd', 'sdsdsd', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 60, 'sdsd', 'sdsdsd', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 67, 'asas', 'asas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 76, 'asas', 'asasa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 76, 'testing', 'testing testing', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 0, 'testing', 'sites', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 0, 'Testing the sites', 'dffdd\r\ndf\r\nd\r\nf\r\ndsf\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 0, 'testing', 'dfdfd\r\nf\r\nsdf\r\nds\r\nfdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 0, 'testing1', 'dfdfd\r\nf\r\nsdf\r\nds\r\nfdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 0, 'testing12', 'dfdfd\r\nf\r\nsdf\r\nds\r\nfdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_timesheet`
--

CREATE TABLE IF NOT EXISTS `project_timesheet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `dates` date NOT NULL,
  `description` varchar(360) NOT NULL,
  `focus` varchar(360) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL,
  `updated_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `project_timesheet`
--

INSERT INTO `project_timesheet` (`id`, `project_id`, `dates`, `description`, `focus`, `user_id`, `created_date`, `updated_date`) VALUES
(20, 2, '2015-12-29', 'dsd', 'sdsd', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 2, '2015-12-22', 'asas', 'asa', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_types`
--

CREATE TABLE IF NOT EXISTS `project_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `created_date` timestamp NOT NULL,
  `updated_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `project_types`
--

INSERT INTO `project_types` (`id`, `type`, `created_date`, `updated_date`) VALUES
(1, 'idea', '2015-12-21 04:15:21', '2015-12-21 04:15:21'),
(2, 'inprogress', '2015-12-21 04:15:21', '2015-12-21 04:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  ` created_date` timestamp NOT NULL,
  `modified_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_group_id`, `first_name`, `last_name`, `username`, `email`, `password`, `is_deleted`, ` created_date`, `modified_date`) VALUES
(2, 1, 'admin', 'test', 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2015-12-18 10:55:28', '2015-12-18 10:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
