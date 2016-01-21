-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 192.168.1.201
-- Generation Time: Oct 13, 2015 at 08:39 AM
-- Server version: 5.5.32
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `geospatial`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `answerId` int(11) NOT NULL AUTO_INCREMENT,
  `questionId` int(11) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `title` text COMMENT 'details of answer',
  `image` varchar(255) DEFAULT NULL,
  `audio` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT '1',
  `isTrue` int(11) DEFAULT NULL,
  PRIMARY KEY (`answerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Contains list of answers' AUTO_INCREMENT=240 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answerId`, `questionId`, `position`, `title`, `image`, `audio`, `video`, `created`, `modified`, `isActive`, `isTrue`) VALUES
(1, 1, 1, 'Library ', NULL, NULL, NULL, '2015-09-21 09:42:23', NULL, 1, 1),
(2, 1, 2, 'Garden', NULL, NULL, NULL, '2015-09-21 09:42:42', NULL, 1, NULL),
(3, 1, 3, 'Classroom', NULL, NULL, NULL, '2015-10-02 10:39:30', NULL, 1, NULL),
(4, 1, 4, 'Staffroom', NULL, NULL, NULL, '2015-10-02 10:39:51', NULL, 1, NULL),
(5, 2, 1, 'Krunal', NULL, NULL, NULL, '2015-10-02 10:40:12', NULL, 1, 1),
(6, 2, 2, 'Ekta', NULL, NULL, NULL, '2015-10-02 10:42:14', NULL, 1, NULL),
(7, 2, 3, 'Charmi', NULL, NULL, NULL, '2015-10-02 10:43:52', NULL, 1, NULL),
(8, 2, 4, 'Tejas', NULL, NULL, NULL, '2015-10-02 10:44:15', NULL, 1, NULL),
(9, 3, 1, 'Toronto', NULL, NULL, NULL, '2015-10-02 10:40:12', NULL, 1, NULL),
(10, 3, 2, 'Ottawa', NULL, NULL, NULL, '2015-10-02 10:42:14', NULL, 1, 1),
(11, 3, 3, 'Calgary', NULL, NULL, NULL, '2015-10-02 10:43:52', NULL, 1, NULL),
(12, 3, 4, 'Montreal', NULL, NULL, NULL, '2015-10-02 10:44:15', NULL, 1, NULL),
(13, 39, 1, '5	', NULL, NULL, NULL, '2015-10-02 10:46:45', NULL, 1, NULL),
(14, 39, 2, '6', NULL, NULL, NULL, '2015-10-02 10:48:49', NULL, 1, NULL),
(15, 39, 3, '7', NULL, NULL, NULL, '2015-10-02 10:49:17', NULL, 1, 1),
(16, 39, 4, '8', NULL, NULL, NULL, '2015-10-02 10:49:32', NULL, 1, NULL),
(17, 68, NULL, 'yes', NULL, NULL, NULL, '2015-10-05 05:26:15', NULL, 1, NULL),
(18, 68, NULL, 'no', NULL, NULL, NULL, '2015-10-05 05:26:15', NULL, 1, NULL),
(19, 68, NULL, 'may b', NULL, NULL, NULL, '2015-10-05 05:26:15', NULL, 1, NULL),
(20, 68, NULL, 'not yet', NULL, NULL, NULL, '2015-10-05 05:26:15', NULL, 1, NULL),
(21, 69, NULL, 'yes', NULL, NULL, NULL, '2015-10-05 05:34:23', NULL, 1, NULL),
(22, 70, NULL, 'yes', NULL, NULL, NULL, '2015-10-05 05:37:02', NULL, 1, NULL),
(23, 71, NULL, 'yes', NULL, NULL, NULL, '2015-10-05 05:38:10', NULL, 1, NULL),
(24, 71, NULL, 'no', NULL, NULL, NULL, '2015-10-05 05:38:10', NULL, 1, NULL),
(25, 71, NULL, 'may b', NULL, NULL, NULL, '2015-10-05 05:38:10', NULL, 1, NULL),
(26, 71, NULL, 'not yet', NULL, NULL, NULL, '2015-10-05 05:38:10', NULL, 1, NULL),
(27, 72, NULL, 'exam', NULL, NULL, NULL, '2015-10-05 05:40:03', NULL, 1, NULL),
(28, 73, NULL, 'test', NULL, NULL, NULL, '2015-10-05 05:42:23', NULL, 1, NULL),
(29, 73, NULL, 'exam', NULL, NULL, NULL, '2015-10-05 05:42:23', NULL, 1, NULL),
(30, 73, NULL, 'final', NULL, NULL, NULL, '2015-10-05 05:42:23', NULL, 1, NULL),
(31, 73, NULL, 'midterm', NULL, NULL, NULL, '2015-10-05 05:42:23', NULL, 1, NULL),
(32, 74, NULL, 'human', NULL, NULL, NULL, '2015-10-05 05:54:04', NULL, 1, NULL),
(33, 74, NULL, 'robot', NULL, NULL, NULL, '2015-10-05 05:54:04', NULL, 1, NULL),
(34, 74, NULL, 'insect', NULL, NULL, NULL, '2015-10-05 05:54:04', NULL, 1, NULL),
(35, 74, NULL, 'animal', NULL, NULL, NULL, '2015-10-05 05:54:04', NULL, 1, NULL),
(36, 75, NULL, 'hello', NULL, NULL, NULL, '2015-10-05 05:55:25', NULL, 1, NULL),
(37, 75, NULL, 'hi', NULL, NULL, NULL, '2015-10-05 05:55:25', NULL, 1, NULL),
(38, 75, NULL, 'gfdjhj', NULL, NULL, NULL, '2015-10-05 05:55:25', NULL, 1, NULL),
(39, 75, NULL, 'hjfk', NULL, NULL, NULL, '2015-10-05 05:55:25', NULL, 1, NULL),
(40, 76, NULL, 'jjghjjj', NULL, NULL, NULL, '2015-10-05 05:56:28', NULL, 1, NULL),
(41, 76, NULL, 'jgjgjj', NULL, NULL, NULL, '2015-10-05 05:56:28', NULL, 1, NULL),
(42, 76, NULL, 'jgjjj', NULL, NULL, NULL, '2015-10-05 05:56:28', NULL, 1, NULL),
(43, 76, NULL, 'jjgjjjjj', NULL, NULL, NULL, '2015-10-05 05:56:28', NULL, 1, NULL),
(44, 77, NULL, 'hello', NULL, NULL, NULL, '2015-10-05 05:57:52', NULL, 1, NULL),
(45, 77, NULL, 'hi', NULL, NULL, NULL, '2015-10-05 05:57:52', NULL, 1, NULL),
(46, 77, NULL, 'hw', NULL, NULL, NULL, '2015-10-05 05:57:52', NULL, 1, NULL),
(47, 77, NULL, 'hjf', NULL, NULL, NULL, '2015-10-05 05:57:52', NULL, 1, NULL),
(48, 78, NULL, 'last', NULL, NULL, NULL, '2015-10-05 05:59:12', NULL, 1, NULL),
(49, 78, NULL, 'first', NULL, NULL, NULL, '2015-10-05 05:59:12', NULL, 1, NULL),
(50, 78, NULL, 'hi', NULL, NULL, NULL, '2015-10-05 05:59:12', NULL, 1, NULL),
(51, 78, NULL, 'hello', NULL, NULL, NULL, '2015-10-05 05:59:12', NULL, 1, NULL),
(52, 79, NULL, 'b', NULL, NULL, NULL, '2015-10-05 06:01:05', NULL, 1, NULL),
(53, 79, NULL, 'g', NULL, NULL, NULL, '2015-10-05 06:01:05', NULL, 1, NULL),
(54, 79, NULL, 'a', NULL, NULL, NULL, '2015-10-05 06:01:05', NULL, 1, NULL),
(55, 79, NULL, 'r', NULL, NULL, NULL, '2015-10-05 06:01:05', NULL, 1, NULL),
(56, 80, NULL, 'abcd', NULL, NULL, NULL, '2015-10-05 06:01:55', NULL, 1, NULL),
(57, 80, NULL, 'efi', NULL, NULL, NULL, '2015-10-05 06:01:55', NULL, 1, NULL),
(58, 80, NULL, 'cpm', NULL, NULL, NULL, '2015-10-05 06:01:55', NULL, 1, NULL),
(59, 80, NULL, 'trderttt', NULL, NULL, NULL, '2015-10-05 06:01:55', NULL, 1, NULL),
(60, 81, NULL, 'hi', NULL, NULL, NULL, '2015-10-05 06:04:25', NULL, 1, NULL),
(61, 81, NULL, 'test', NULL, NULL, NULL, '2015-10-05 06:04:25', NULL, 1, NULL),
(62, 81, NULL, 'home', NULL, NULL, NULL, '2015-10-05 06:04:25', NULL, 1, NULL),
(63, 81, NULL, 'hello', NULL, NULL, NULL, '2015-10-05 06:04:25', NULL, 1, NULL),
(64, 82, NULL, 'nice', NULL, NULL, NULL, '2015-10-05 06:22:36', NULL, 1, NULL),
(65, 82, NULL, 'better', NULL, NULL, NULL, '2015-10-05 06:22:36', NULL, 1, NULL),
(66, 82, NULL, 'good', NULL, NULL, NULL, '2015-10-05 06:22:36', NULL, 1, NULL),
(67, 82, NULL, 'fail', NULL, NULL, NULL, '2015-10-05 06:22:36', NULL, 1, NULL),
(68, 83, NULL, 'yes', NULL, NULL, NULL, '2015-10-05 06:23:20', NULL, 1, NULL),
(69, 83, NULL, 'hi', NULL, NULL, NULL, '2015-10-05 06:23:20', NULL, 1, NULL),
(70, 83, NULL, 'good', NULL, NULL, NULL, '2015-10-05 06:23:20', NULL, 1, 1),
(71, 83, NULL, 'final', NULL, NULL, NULL, '2015-10-05 06:23:20', NULL, 1, NULL),
(72, 84, NULL, 'monday', NULL, NULL, NULL, '2015-10-07 04:39:15', NULL, 1, NULL),
(73, 84, NULL, 'monday', NULL, NULL, NULL, '2015-10-07 04:39:15', NULL, 1, NULL),
(74, 84, NULL, 'monday', NULL, NULL, NULL, '2015-10-07 04:39:15', NULL, 1, 1),
(75, 84, NULL, 'monday', NULL, NULL, NULL, '2015-10-07 04:39:15', NULL, 1, NULL),
(76, 85, NULL, 'right', NULL, NULL, NULL, '2015-10-07 04:46:27', NULL, 1, 1),
(77, 85, NULL, 'wrong', NULL, NULL, NULL, '2015-10-07 04:46:27', NULL, 1, 0),
(78, 85, NULL, 'true', NULL, NULL, NULL, '2015-10-07 04:46:27', NULL, 1, 0),
(79, 85, NULL, 'false', NULL, NULL, NULL, '2015-10-07 04:46:27', NULL, 1, 0),
(84, 86, NULL, 'first4', NULL, NULL, NULL, '2015-10-07 06:13:38', NULL, 1, 1),
(85, 86, NULL, 'first4', NULL, NULL, NULL, '2015-10-07 06:13:38', NULL, 1, NULL),
(86, 86, NULL, 'first4', NULL, NULL, NULL, '2015-10-07 06:13:38', NULL, 1, NULL),
(87, 86, NULL, 'first4', NULL, NULL, NULL, '2015-10-07 06:13:38', NULL, 1, NULL),
(88, 87, NULL, 'dddd', NULL, NULL, NULL, '2015-10-07 06:16:10', NULL, 1, 1),
(89, 87, NULL, 'dddd', NULL, NULL, NULL, '2015-10-07 06:16:10', NULL, 1, NULL),
(90, 87, NULL, 'dddd', NULL, NULL, NULL, '2015-10-07 06:16:10', NULL, 1, NULL),
(91, 87, NULL, 'dddd', NULL, NULL, NULL, '2015-10-07 06:16:10', NULL, 1, 1),
(92, 88, NULL, 'option D', NULL, NULL, NULL, '2015-10-07 06:23:31', NULL, 1, NULL),
(93, 88, NULL, 'option D', NULL, NULL, NULL, '2015-10-07 06:23:32', NULL, 1, 1),
(94, 88, NULL, 'option D', NULL, NULL, NULL, '2015-10-07 06:23:32', NULL, 1, NULL),
(95, 88, NULL, 'option D', NULL, NULL, NULL, '2015-10-07 06:23:32', NULL, 1, NULL),
(96, 89, NULL, 'dd', NULL, NULL, NULL, '2015-10-07 06:28:26', NULL, 1, NULL),
(97, 89, NULL, 'dd', NULL, NULL, NULL, '2015-10-07 06:28:26', NULL, 1, NULL),
(98, 89, NULL, 'dd', NULL, NULL, NULL, '2015-10-07 06:28:26', NULL, 1, 1),
(99, 89, NULL, 'dd', NULL, NULL, NULL, '2015-10-07 06:28:26', NULL, 1, NULL),
(100, 90, NULL, 'aaa', NULL, NULL, NULL, '2015-10-07 06:32:17', NULL, 1, NULL),
(101, 90, NULL, 'bbb', NULL, NULL, NULL, '2015-10-07 06:32:17', NULL, 1, NULL),
(102, 90, NULL, 'ccc', NULL, NULL, NULL, '2015-10-07 06:32:17', NULL, 1, 1),
(103, 90, NULL, 'ddd', NULL, NULL, NULL, '2015-10-07 06:32:17', NULL, 1, NULL),
(104, 91, NULL, 'six1', NULL, NULL, NULL, '2015-10-07 06:35:11', NULL, 1, 1),
(105, 91, NULL, 'six2', NULL, NULL, NULL, '2015-10-07 06:35:11', NULL, 1, NULL),
(106, 91, NULL, 'six3', NULL, NULL, NULL, '2015-10-07 06:35:11', NULL, 1, 1),
(107, 91, NULL, 'six4', NULL, NULL, NULL, '2015-10-07 06:35:11', NULL, 1, NULL),
(108, 92, NULL, 's1', NULL, NULL, NULL, '2015-10-07 06:41:28', NULL, 1, 1),
(109, 92, NULL, 's2', NULL, NULL, NULL, '2015-10-07 06:41:28', NULL, 1, 1),
(110, 92, NULL, 's3', NULL, NULL, NULL, '2015-10-07 06:41:28', NULL, 1, NULL),
(111, 92, NULL, 's4', NULL, NULL, NULL, '2015-10-07 06:41:28', NULL, 1, NULL),
(112, 93, NULL, 'm1', NULL, NULL, NULL, '2015-10-07 06:45:28', NULL, 1, NULL),
(113, 93, NULL, 'm2', NULL, NULL, NULL, '2015-10-07 06:45:28', NULL, 1, 1),
(114, 93, NULL, 'm3', NULL, NULL, NULL, '2015-10-07 06:45:28', NULL, 1, NULL),
(115, 93, NULL, 'm4', NULL, NULL, NULL, '2015-10-07 06:45:28', NULL, 1, 1),
(116, 94, NULL, 'aaa', NULL, NULL, NULL, '2015-10-07 06:46:57', NULL, 1, 1),
(117, 94, NULL, 'vvv', NULL, NULL, NULL, '2015-10-07 06:46:57', NULL, 1, NULL),
(118, 94, NULL, 'nnn', NULL, NULL, NULL, '2015-10-07 06:46:57', NULL, 1, NULL),
(119, 94, NULL, 'hhjtgj', NULL, NULL, NULL, '2015-10-07 06:46:57', NULL, 1, NULL),
(120, 95, NULL, 'help1', NULL, NULL, NULL, '2015-10-07 06:50:20', NULL, 1, 1),
(121, 95, NULL, 'hellp2', NULL, NULL, NULL, '2015-10-07 06:50:20', NULL, 1, NULL),
(122, 95, NULL, 'help3', NULL, NULL, NULL, '2015-10-07 06:50:20', NULL, 1, NULL),
(123, 95, NULL, 'help4', NULL, NULL, NULL, '2015-10-07 06:50:20', NULL, 1, NULL),
(124, 96, NULL, 'as1', NULL, NULL, NULL, '2015-10-07 06:53:47', NULL, 1, 1),
(125, 96, NULL, 'as2', NULL, NULL, NULL, '2015-10-07 06:53:47', NULL, 1, NULL),
(126, 96, NULL, 'as3', NULL, NULL, NULL, '2015-10-07 06:53:47', NULL, 1, NULL),
(127, 96, NULL, 'as4', NULL, NULL, NULL, '2015-10-07 06:53:47', NULL, 1, NULL),
(128, 97, NULL, 'not yet', NULL, NULL, NULL, '2015-10-07 06:57:05', NULL, 1, NULL),
(129, 97, NULL, 'not yet', NULL, NULL, NULL, '2015-10-07 06:57:05', NULL, 1, NULL),
(130, 97, NULL, 'not yet', NULL, NULL, NULL, '2015-10-07 06:57:05', NULL, 1, NULL),
(131, 97, NULL, 'not yet', NULL, NULL, NULL, '2015-10-07 06:57:05', NULL, 1, NULL),
(139, 98, NULL, 'android', NULL, NULL, NULL, '2015-10-07 07:13:20', NULL, 1, NULL),
(147, 99, NULL, 'android', NULL, NULL, NULL, '2015-10-07 07:15:12', NULL, 1, NULL),
(148, 100, NULL, 'php', NULL, NULL, NULL, '2015-10-07 07:16:38', NULL, 1, NULL),
(149, 100, NULL, 'asp', NULL, NULL, NULL, '2015-10-07 07:16:38', NULL, 1, 1),
(150, 100, NULL, 'java', NULL, NULL, NULL, '2015-10-07 07:16:38', NULL, 1, NULL),
(151, 100, NULL, 'android', NULL, NULL, NULL, '2015-10-07 07:16:38', NULL, 1, NULL),
(152, 101, NULL, 'jghjjghjgjj', NULL, NULL, NULL, '2015-10-08 03:46:22', NULL, 1, 1),
(153, 101, NULL, 'gjgjgjjgjh', NULL, NULL, NULL, '2015-10-08 03:46:22', NULL, 1, NULL),
(154, 101, NULL, 'tyryry', NULL, NULL, NULL, '2015-10-08 03:46:22', NULL, 1, NULL),
(155, 101, NULL, 'hgghjgj', NULL, NULL, NULL, '2015-10-08 03:46:22', NULL, 1, NULL),
(156, 102, NULL, 'opipp', NULL, NULL, NULL, '2015-10-08 03:48:39', NULL, 1, 1),
(157, 102, NULL, 'pipio', NULL, NULL, NULL, '2015-10-08 03:48:39', NULL, 1, NULL),
(158, 102, NULL, 'yiuiu', NULL, NULL, NULL, '2015-10-08 03:48:39', NULL, 1, NULL),
(159, 102, NULL, 'njkjhk', NULL, NULL, NULL, '2015-10-08 03:48:39', NULL, 1, NULL),
(160, 103, NULL, 'no', NULL, NULL, NULL, '2015-10-08 04:07:21', NULL, 1, 0),
(161, 103, NULL, 'yes', NULL, NULL, NULL, '2015-10-08 04:07:21', NULL, 1, 1),
(162, 103, NULL, 'friday', NULL, NULL, NULL, '2015-10-08 04:07:21', NULL, 1, 0),
(163, 103, NULL, 'monday', NULL, NULL, NULL, '2015-10-08 04:07:21', NULL, 1, 0),
(164, 104, NULL, 'true', NULL, NULL, NULL, '2015-10-08 05:09:48', NULL, 1, 0),
(165, 104, NULL, 'false', NULL, NULL, NULL, '2015-10-08 05:09:48', NULL, 1, 0),
(166, 104, NULL, 'yes', NULL, NULL, NULL, '2015-10-08 05:09:48', NULL, 1, 1),
(167, 104, NULL, 'no', NULL, NULL, NULL, '2015-10-08 05:09:48', NULL, 1, 0),
(168, 105, NULL, '7', NULL, NULL, NULL, '2015-10-09 06:07:23', NULL, 1, 1),
(169, 105, NULL, '8', NULL, NULL, NULL, '2015-10-09 06:07:23', NULL, 1, 0),
(170, 105, NULL, '4', NULL, NULL, NULL, '2015-10-09 06:07:23', NULL, 1, 0),
(171, 105, NULL, '6', NULL, NULL, NULL, '2015-10-09 06:07:23', NULL, 1, 0),
(172, 106, NULL, 'klkjl', NULL, NULL, NULL, '2015-10-09 08:43:02', NULL, 1, NULL),
(173, 106, NULL, 'lkjll', NULL, NULL, NULL, '2015-10-09 08:43:02', NULL, 1, NULL),
(174, 106, NULL, 'ljkljkl', NULL, NULL, NULL, '2015-10-09 08:43:02', NULL, 1, 1),
(175, 106, NULL, 'ljkljkl', NULL, NULL, NULL, '2015-10-09 08:43:02', NULL, 1, NULL),
(176, 107, NULL, 'hgfhfgf', NULL, NULL, NULL, '2015-10-10 05:58:13', NULL, 1, 1),
(177, 107, NULL, 'hhfhfhf', NULL, NULL, NULL, '2015-10-10 05:58:13', NULL, 1, NULL),
(178, 107, NULL, 'fhfghff', NULL, NULL, NULL, '2015-10-10 05:58:13', NULL, 1, NULL),
(179, 107, NULL, 'fhfhfhf', NULL, NULL, NULL, '2015-10-10 05:58:13', NULL, 1, NULL),
(180, 108, NULL, '', NULL, NULL, NULL, '2015-10-10 06:17:49', NULL, 1, 1),
(181, 108, NULL, '', NULL, NULL, NULL, '2015-10-10 06:17:50', NULL, 1, NULL),
(182, 108, NULL, '', NULL, NULL, NULL, '2015-10-10 06:17:50', NULL, 1, NULL),
(183, 108, NULL, '', NULL, NULL, NULL, '2015-10-10 06:17:50', NULL, 1, NULL),
(184, 109, NULL, '', NULL, NULL, NULL, '2015-10-10 06:23:37', NULL, 1, 1),
(185, 109, NULL, '', NULL, NULL, NULL, '2015-10-10 06:23:37', NULL, 1, NULL),
(186, 109, NULL, '', NULL, NULL, NULL, '2015-10-10 06:23:37', NULL, 1, NULL),
(187, 109, NULL, '', NULL, NULL, NULL, '2015-10-10 06:23:37', NULL, 1, NULL),
(188, 110, NULL, '', NULL, NULL, NULL, '2015-10-10 06:33:54', NULL, 1, 1),
(189, 110, NULL, '', NULL, NULL, NULL, '2015-10-10 06:33:54', NULL, 1, NULL),
(190, 110, NULL, '', NULL, NULL, NULL, '2015-10-10 06:33:54', NULL, 1, NULL),
(191, 110, NULL, '', NULL, NULL, NULL, '2015-10-10 06:33:54', NULL, 1, NULL),
(192, 111, NULL, '', NULL, NULL, NULL, '2015-10-10 07:10:23', NULL, 1, 1),
(193, 111, NULL, '', NULL, NULL, NULL, '2015-10-10 07:10:23', NULL, 1, NULL),
(194, 111, NULL, '', NULL, NULL, NULL, '2015-10-10 07:10:23', NULL, 1, NULL),
(195, 111, NULL, '', NULL, NULL, NULL, '2015-10-10 07:10:23', NULL, 1, NULL),
(196, 112, NULL, '', NULL, NULL, NULL, '2015-10-10 07:24:06', NULL, 1, 1),
(197, 112, NULL, '', NULL, NULL, NULL, '2015-10-10 07:24:06', NULL, 1, NULL),
(198, 112, NULL, '', NULL, NULL, NULL, '2015-10-10 07:24:06', NULL, 1, NULL),
(199, 112, NULL, '', NULL, NULL, NULL, '2015-10-10 07:24:06', NULL, 1, NULL),
(200, 113, NULL, '', NULL, NULL, NULL, '2015-10-12 04:38:38', NULL, 1, 1),
(201, 113, NULL, '', NULL, NULL, NULL, '2015-10-12 04:38:38', NULL, 1, NULL),
(202, 113, NULL, '', NULL, NULL, NULL, '2015-10-12 04:38:38', NULL, 1, NULL),
(203, 113, NULL, '', NULL, NULL, NULL, '2015-10-12 04:38:38', NULL, 1, NULL),
(204, 114, NULL, 'select', NULL, NULL, NULL, '2015-10-12 04:54:52', NULL, 1, 1),
(205, 114, NULL, 'radio', NULL, NULL, NULL, '2015-10-12 04:54:52', NULL, 1, 0),
(206, 114, NULL, 'drop', NULL, NULL, NULL, '2015-10-12 04:54:53', NULL, 1, 0),
(207, 114, NULL, 'test', NULL, NULL, NULL, '2015-10-12 04:54:53', NULL, 1, 0),
(208, 115, NULL, 'ys', NULL, NULL, NULL, '2015-10-12 05:01:01', NULL, 1, 0),
(209, 115, NULL, 'no', NULL, NULL, NULL, '2015-10-12 05:01:01', NULL, 1, 1),
(210, 115, NULL, 'true', NULL, NULL, NULL, '2015-10-12 05:01:01', NULL, 1, 0),
(211, 115, NULL, 'false', NULL, NULL, NULL, '2015-10-12 05:01:01', NULL, 1, 0),
(212, 116, NULL, 'adajan', NULL, NULL, NULL, '2015-10-12 05:22:45', NULL, 1, 0),
(213, 116, NULL, 'abcd', NULL, NULL, NULL, '2015-10-12 05:22:45', NULL, 1, 1),
(214, 116, NULL, 'acrt', NULL, NULL, NULL, '2015-10-12 05:22:45', NULL, 1, 0),
(215, 116, NULL, 'dert', NULL, NULL, NULL, '2015-10-12 05:22:45', NULL, 1, 0),
(216, 117, NULL, 'ghjtg', NULL, NULL, NULL, '2015-10-12 05:25:10', NULL, 1, NULL),
(217, 117, NULL, 'jgh', NULL, NULL, NULL, '2015-10-12 05:25:10', NULL, 1, 1),
(218, 117, NULL, 'jgh', NULL, NULL, NULL, '2015-10-12 05:25:10', NULL, 1, NULL),
(219, 117, NULL, 'jhgj', NULL, NULL, NULL, '2015-10-12 05:25:10', NULL, 1, NULL),
(220, 118, NULL, 'jghjghj', NULL, NULL, NULL, '2015-10-12 05:27:08', NULL, 1, 0),
(221, 118, NULL, 'jjjjjgjh', NULL, NULL, NULL, '2015-10-12 05:27:08', NULL, 1, 1),
(222, 118, NULL, 'jghjgh', NULL, NULL, NULL, '2015-10-12 05:27:08', NULL, 1, 0),
(223, 118, NULL, 'jghjjjj', NULL, NULL, NULL, '2015-10-12 05:27:08', NULL, 1, 0),
(224, 119, NULL, 'jgjuj', NULL, NULL, NULL, '2015-10-12 06:14:37', NULL, 1, 1),
(225, 119, NULL, ',ljklll', NULL, NULL, NULL, '2015-10-12 06:14:37', NULL, 1, NULL),
(226, 119, NULL, 'ljkljljl', NULL, NULL, NULL, '2015-10-12 06:14:37', NULL, 1, NULL),
(227, 119, NULL, 'ljkljkllj', NULL, NULL, NULL, '2015-10-12 06:14:38', NULL, 1, NULL),
(228, 120, NULL, 'iuiyy', NULL, NULL, NULL, '2015-10-12 06:35:45', NULL, 1, 1),
(229, 120, NULL, 'iyiyii', NULL, NULL, NULL, '2015-10-12 06:35:45', NULL, 1, NULL),
(230, 120, NULL, 'yiyiyiyiyi', NULL, NULL, NULL, '2015-10-12 06:35:45', NULL, 1, NULL),
(231, 120, NULL, 'yiyiyiyiy', NULL, NULL, NULL, '2015-10-12 06:35:45', NULL, 1, NULL),
(232, 121, NULL, 'jhkjhk', NULL, NULL, NULL, '2015-10-12 06:36:18', NULL, 1, 1),
(233, 121, NULL, 'jyutuyuyu', NULL, NULL, NULL, '2015-10-12 06:36:18', NULL, 1, NULL),
(234, 121, NULL, 'khjkjkk', NULL, NULL, NULL, '2015-10-12 06:36:18', NULL, 1, NULL),
(235, 121, NULL, 'khkkk', NULL, NULL, NULL, '2015-10-12 06:36:18', NULL, 1, NULL),
(236, 122, NULL, '', NULL, NULL, NULL, '2015-10-12 08:30:17', NULL, 1, 1),
(237, 122, NULL, '', NULL, NULL, NULL, '2015-10-12 08:30:17', NULL, 1, NULL),
(238, 122, NULL, '', NULL, NULL, NULL, '2015-10-12 08:30:17', NULL, 1, NULL),
(239, 122, NULL, '', NULL, NULL, NULL, '2015-10-12 08:30:18', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE IF NOT EXISTS `assignments` (
  `assignmentId` int(11) NOT NULL AUTO_INCREMENT,
  `createdUserId` int(11) DEFAULT NULL,
  `description` text,
  `questionToComplete` int(11) DEFAULT NULL COMMENT 'No. of question to Complete assigment',
  `grade` varchar(255) NOT NULL,
  `startLatitude` float DEFAULT NULL,
  `startLongitude` float DEFAULT NULL,
  `startDate` datetime DEFAULT NULL COMMENT 'date time to start assigment',
  `endDate` datetime DEFAULT NULL COMMENT 'dead line to finish assigment',
  `isCompleted` int(11) DEFAULT '0' COMMENT '0 = Incomplete, 1 = Complete',
  `isActive` int(1) NOT NULL DEFAULT '1',
  `assignmentName` varchar(255) NOT NULL,
  `totalQuestions` int(10) unsigned NOT NULL,
  PRIMARY KEY (`assignmentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Contains list of all assigment with owner' AUTO_INCREMENT=26 ;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignmentId`, `createdUserId`, `description`, `questionToComplete`, `grade`, `startLatitude`, `startLongitude`, `startDate`, `endDate`, `isCompleted`, `isActive`, `assignmentName`, `totalQuestions`) VALUES
(1, 1, 'This assignment will help you  learn basic concepts about Geospatial', 4, '2', 0, 0, '2015-10-03 00:00:00', '2015-10-03 00:00:00', 0, 1, 'Design for Geospatial', 4),
(3, 1, 'testing', 30, 'A', NULL, NULL, NULL, NULL, 0, 1, 'Test', 50),
(4, 1, 'Testing edit', 5, 'B', NULL, NULL, NULL, NULL, 0, 0, 'Test1', 10),
(7, 1, 'question', 40, 'A', NULL, NULL, NULL, NULL, 0, 1, 'question', 50),
(8, 1, 'Treasure Hunt Game CMS', 5, 'A', NULL, NULL, '2015-10-01 00:00:00', '2015-10-30 00:00:00', 0, 0, 'PHP Development', 50),
(9, 1, 'jgjgjgjg', 5, 'a', NULL, NULL, '2015-10-02 00:00:00', '2015-10-10 00:00:00', 0, 0, 'jgjjgj', 5),
(10, 1, 'date', 10, 'a', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 'date', 10),
(11, 1, 'hfhfhf', 10, 'd', NULL, NULL, '2015-10-13 00:00:00', '2015-10-30 00:00:00', 0, 0, 'hgfhfhhh', 10),
(12, 1, 'date select`', 10, 'a', NULL, NULL, '2015-10-02 00:00:00', '2015-10-30 00:00:00', 0, 0, 'date select', 10),
(13, 1, 'Lat-Long', 10, 'A', 21.1926, 72.7997, '2015-10-03 00:00:00', '2015-10-24 00:00:00', 0, 0, 'Lat-Long', 12),
(14, 1, 'ankita', 50, 'A', 21.1926, 72.7997, '2015-10-01 00:00:00', '2015-10-31 00:00:00', 0, 0, 'ankita', 50),
(15, 1, 'Application Testing Assignment', 5, '3', 16.5411, 82.3767, '2015-10-08 00:00:00', '2015-10-12 00:00:00', 0, 0, 'Testing', 5),
(16, 1, 'assignment', 50, 'A', 21.1926, 72.7997, '2015-10-01 00:00:00', '2015-10-30 00:00:00', 0, 0, 'A Assignment', 50),
(17, 1, 'jgjgjjg', 45, 'a', 21.1926, 72.7997, '2015-10-01 00:00:00', '2015-10-16 00:00:00', 0, 0, 'jghjjg', 50),
(18, 1, 'cg', 34, 'A', 19.076, 72.8777, '2015-10-01 00:00:00', '2015-10-30 00:00:00', 0, 0, 'cg', 40),
(19, 1, 'testing @ 12 october,2015', 3, '2', 19.076, 72.8777, '2015-10-16 00:00:00', '2015-10-01 00:00:00', 0, 0, 'testing', 3),
(20, 1, 'tevhv ghvhj vhj vhj v', 3, '2', 21.1913, 72.8429, '2015-10-06 00:00:00', '2015-10-16 00:00:00', 0, 0, 'testing', 3),
(21, 1, 'jhgjjg', 32, '1', 21.1926, 72.7997, '2015-10-01 00:00:00', '2015-10-10 00:00:00', 0, 0, 'asas', 32),
(22, 1, 'ghjgh', 32, 'a', 21.1926, 72.7997, '2015-10-23 00:00:00', '2015-10-01 00:00:00', 0, 0, 'ghjgj', 32),
(23, 1, 'iuuo', 43, '1', 21.1926, 72.7997, '2015-10-15 00:00:00', '2015-10-01 00:00:00', 0, 0, 'louio', 43),
(24, 1, 'jghjhjg', 43, '1`', 21.1926, 72.7997, '2015-10-21 00:00:00', '2015-10-01 00:00:00', 0, 0, 'jgh', 43),
(25, 1, 'fghf`', 21, '1', 21.1926, 72.7997, '2015-10-08 00:00:00', '2015-10-30 00:00:00', 0, 0, 'hfyhfg', 21);

-- --------------------------------------------------------

--
-- Table structure for table `forgotpassword`
--

CREATE TABLE IF NOT EXISTS `forgotpassword` (
  `forgotPasswordId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isActive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`forgotPasswordId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Contains list of assigned token' AUTO_INCREMENT=16 ;

--
-- Dumping data for table `forgotpassword`
--

INSERT INTO `forgotpassword` (`forgotPasswordId`, `userId`, `token`, `created`, `isActive`) VALUES
(15, 1, '1443423010MQ==', '2015-09-28 06:50:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hint`
--

CREATE TABLE IF NOT EXISTS `hint` (
  `hintId` int(11) NOT NULL AUTO_INCREMENT,
  `questionId` int(11) DEFAULT NULL,
  `description` text,
  `isActive` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`hintId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Contains list of hint with each question' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hint`
--

INSERT INTO `hint` (`hintId`, `questionId`, `description`, `isActive`) VALUES
(1, 1, 'A study place', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `questionId` int(11) NOT NULL AUTO_INCREMENT,
  `assignmentId` int(11) DEFAULT NULL,
  `title` text COMMENT 'Basically description of question',
  `image` varchar(255) DEFAULT NULL,
  `audio` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT '1',
  `latitude` double NOT NULL DEFAULT '0',
  `longitude` double NOT NULL DEFAULT '0',
  `position` int(11) DEFAULT NULL,
  `quesType` int(11) DEFAULT NULL,
  PRIMARY KEY (`questionId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Contains list of all questions.' AUTO_INCREMENT=123 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionId`, `assignmentId`, `title`, `image`, `audio`, `video`, `created`, `modified`, `isActive`, `latitude`, `longitude`, `position`, `quesType`) VALUES
(1, 1, 'Where is the book located?', NULL, NULL, NULL, '2015-09-21 05:40:12', NULL, 1, 46.793877, -71.256705, NULL, 1),
(2, 1, 'Who has stolen Mary''s Treasure ?', 'uploads/0b8342fc-2656-4ea6-a495-fc3dc6e16f2f.jpg', NULL, NULL, '2015-09-21 05:41:47', NULL, 1, 46.792028, -71.264176, 3, 2),
(3, 1, 'What is the capital of Canada ?', NULL, NULL, 'uploads/Ew24FjWZCypN.mp4', '2015-09-29 04:28:56', NULL, 1, 46.78547, -71.264865, 2, 3),
(12, 3, 'first?', NULL, NULL, NULL, '2015-09-29 05:08:50', NULL, 1, 0, 0, NULL, 1),
(13, 3, 'image?', NULL, NULL, NULL, '2015-09-29 06:27:00', NULL, 1, 0, 0, NULL, 1),
(39, 1, 'How many days are there in a week?', NULL, NULL, NULL, '2015-10-01 07:21:43', NULL, 1, 46.784574, -71.262832, 3, 1),
(40, 4, 'check?', NULL, NULL, NULL, '2015-10-01 07:22:23', NULL, 1, 0, 0, 1, 1),
(41, 2, 'image?', 'uploads/0b8342fc-2656-4ea6-a495-fc3dc6e16f2f.jpg', NULL, NULL, '2015-10-02 04:00:29', NULL, 1, 0, 0, 5, 2),
(42, 8, 'test?', NULL, NULL, NULL, '2015-10-02 04:57:49', NULL, 1, 0, 0, 1, 1),
(43, 8, 'test2?', NULL, NULL, NULL, '2015-10-02 04:58:27', NULL, 1, 0, 0, 2, 1),
(54, 8, 'jgjkjhkhkhkkh', NULL, NULL, NULL, '2015-10-02 05:19:25', NULL, 1, 0, 0, 7, 1),
(57, 8, 'yiyiyiuiyiyiu', NULL, NULL, NULL, '2015-10-02 05:21:34', NULL, 1, 0, 0, 8, 1),
(59, 8, 'khjkkhkhkhk', NULL, NULL, NULL, '2015-10-02 05:24:37', NULL, 1, 0, 0, 9, 1),
(60, 8, 'hfhfhfhf', NULL, NULL, NULL, '2015-10-02 05:32:24', NULL, 1, 0, 0, 3, 1),
(62, 13, 'lat-long', NULL, NULL, NULL, '2015-10-03 09:52:02', NULL, 1, 0, 0, 1, 1),
(63, 13, 'hgjgjjjjjg', NULL, NULL, NULL, '2015-10-03 09:55:20', NULL, 1, 0, 0, 2, 1),
(64, 13, 'test', NULL, NULL, NULL, '2015-10-03 09:58:34', NULL, 1, 21.19257164001465, 72.79973602294922, 3, 1),
(65, 8, 'test testing?????', NULL, NULL, NULL, '2015-10-05 03:52:15', NULL, 1, 21.19257164001465, 72.79973602294922, 6, 1),
(66, 8, 'iuiyiyiiyi', NULL, NULL, NULL, '2015-10-05 05:11:00', NULL, 1, 21.19257164001465, 72.79973602294922, 4, 1),
(67, 8, 'jhhj', NULL, NULL, NULL, '2015-10-05 05:19:03', NULL, 1, 21.19257164001465, 72.79973602294922, 11, 1),
(68, 8, 'answers save?', NULL, NULL, NULL, '2015-10-05 05:26:14', NULL, 1, 21.19257164001465, 72.79973602294922, 12, 1),
(69, 8, 'true answer save?', NULL, NULL, NULL, '2015-10-05 05:34:23', NULL, 1, 21.19257164001465, 72.79973602294922, 13, 1),
(70, 8, 'assignment-1?', NULL, NULL, NULL, '2015-10-05 05:37:02', NULL, 1, 21.19257164001465, 72.79973602294922, 15, 1),
(71, 8, 'assignment-2?', NULL, NULL, NULL, '2015-10-05 05:38:10', NULL, 1, 21.184207916259766, 72.83488464355469, 16, 1),
(72, 8, 'assignment-3?', NULL, NULL, NULL, '2015-10-05 05:40:03', NULL, 1, 21.184207916259766, 72.83488464355469, 17, 1),
(73, 8, 'assignment-4?', NULL, NULL, NULL, '2015-10-05 05:42:23', NULL, 1, 30.08692741394043, 78.26760864257812, 18, 1),
(74, 8, 'who r u?', NULL, NULL, NULL, '2015-10-05 05:54:04', NULL, 1, 21.184207916259766, 72.83488464355469, 20, 1),
(75, 8, 'hello?', NULL, NULL, NULL, '2015-10-05 05:55:25', NULL, 1, 21.184207916259766, 72.83488464355469, 21, 1),
(76, 8, 'jghjghjjjj', NULL, NULL, NULL, '2015-10-05 05:56:28', NULL, 1, 21.184207916259766, 72.83488464355469, 22, 1),
(77, 8, 'hi', NULL, NULL, NULL, '2015-10-05 05:57:52', NULL, 1, 21.184207916259766, 72.83488464355469, 23, 1),
(78, 8, 'last?', NULL, NULL, NULL, '2015-10-05 05:59:12', NULL, 1, 21.184207916259766, 72.83488464355469, 26, 1),
(80, 8, 'jghjjgjjjg', NULL, NULL, NULL, '2015-10-05 06:01:55', NULL, 1, 21.184207916259766, 72.83488464355469, 28, 1),
(81, 8, 'jghjjgjjj', NULL, NULL, NULL, '2015-10-05 06:04:25', NULL, 1, 21.189659118652344, 72.81170654296875, 30, 1),
(82, 8, 'isTrue?', NULL, NULL, NULL, '2015-10-05 06:22:36', NULL, 1, 21.184207916259766, 72.83488464355469, 31, 1),
(83, 8, 'nice', NULL, NULL, NULL, '2015-10-05 06:23:20', NULL, 1, 27.023799896240234, 74.21790313720703, 32, 1),
(84, 8, 'who r u?', NULL, NULL, NULL, '2015-10-07 04:39:15', NULL, 1, 21.089545, 72.62653799999998, 35, 1),
(85, 8, 'final', NULL, NULL, NULL, '2015-10-07 04:46:27', NULL, 1, 0, 0, 36, 1),
(86, 14, 'first', NULL, NULL, NULL, '2015-10-07 06:13:38', NULL, 1, 21.1925707, 72.79973559999996, 1, 1),
(87, 14, 'try', NULL, NULL, NULL, '2015-10-07 06:16:10', NULL, 1, 21.1860807, 72.78642680000007, 2, 1),
(88, 14, 'aaaafghfh', NULL, NULL, NULL, '2015-10-07 06:23:31', NULL, 1, 21.1925707, 72.79973559999996, 3, 1),
(89, 14, 'an?', NULL, NULL, NULL, '2015-10-07 06:28:26', NULL, 1, 21.1860807, 72.78642680000007, 4, 1),
(90, 14, 't         ?', NULL, NULL, NULL, '2015-10-07 06:32:17', NULL, 1, 21.1925707, 72.79973559999996, 5, 1),
(91, 14, 'six question?', NULL, NULL, NULL, '2015-10-07 06:35:11', NULL, 1, 21.1925707, 72.79973559999996, 6, 1),
(92, 14, 'seven2?', NULL, NULL, NULL, '2015-10-07 06:41:28', NULL, 1, 21.1925707, 72.79973559999996, 7, 1),
(93, 14, 'your?', NULL, NULL, NULL, '2015-10-07 06:45:28', NULL, 1, 21.1925707, 72.79973559999996, 8, 1),
(94, 14, 'aaa', NULL, NULL, NULL, '2015-10-07 06:46:57', NULL, 1, 21.1925707, 72.79973559999996, 9, 1),
(95, 14, 'help', NULL, NULL, NULL, '2015-10-07 06:50:20', NULL, 1, 21.1925707, 72.79973559999996, 10, 1),
(96, 14, 'assignment1??', NULL, NULL, NULL, '2015-10-07 06:53:47', NULL, 1, 21.1925707, 72.79973559999996, 11, 1),
(97, 14, 'title', NULL, NULL, NULL, '2015-10-07 06:57:05', NULL, 1, 21.1925707, 72.79973559999996, 12, 1),
(100, 14, 'ACME', NULL, NULL, NULL, '2015-10-07 07:16:38', NULL, 1, 21.2013013, 72.8082875, 13, 1),
(101, 14, 'bhjhhgj', NULL, NULL, NULL, '2015-10-08 03:46:22', NULL, 1, 21.190008, 72.796362, 45, 1),
(102, 14, 'ghjgjgj', NULL, NULL, NULL, '2015-10-08 03:48:39', NULL, 1, 21.192571, 72.799736, 46, 1),
(103, 14, 'Friday presentation?', NULL, NULL, NULL, '2015-10-08 04:07:21', NULL, 1, 0, 0, 47, 1),
(104, 14, 'test?', NULL, NULL, NULL, '2015-10-08 05:09:48', NULL, 1, 0, 0, 49, 1),
(105, 15, 'How many days are there in a week ?', NULL, NULL, NULL, '2015-10-09 06:07:22', NULL, 1, 0, 0, 1, 1),
(106, 8, 'jkjhkjhkk', NULL, NULL, NULL, '2015-10-09 08:43:02', NULL, 1, 21.192571, 72.799736, 49, 1),
(107, 8, 'jjgjgjjjjgjgj', NULL, NULL, NULL, '2015-10-10 05:58:13', NULL, 1, 21.190008, 72.796362, 45, 1),
(108, 8, 'image', 'uploads/4ce879a9-7f60-4254-b6a5-167eea8afcc7.jpg', NULL, NULL, '2015-10-10 06:17:49', NULL, 1, 20.769026, 72.977774, 39, 2),
(109, 8, 'video', NULL, NULL, NULL, '2015-10-10 06:23:37', NULL, 1, 21.192571, 72.799736, 37, 3),
(110, 8, 'video1', NULL, NULL, 'uploads/mov_bbb.mp4', '2015-10-10 06:33:54', NULL, 1, 21.192571, 72.799736, 38, 3),
(111, 8, 'jujujyuiyui', NULL, NULL, 'uploads/mov_bbb.mp4', '2015-10-10 07:10:23', NULL, 1, 21.192571, 72.799736, 29, 3),
(112, 8, 'iyuiuiyiy', NULL, 'uploads/mov_bbb.mp4', NULL, '2015-10-10 07:24:06', NULL, 1, 21.186081, 72.786427, 34, 4),
(113, 8, 'audio testing', NULL, 'uploads/Hamari Adhuri Kahani.mp3', NULL, '2015-10-12 04:38:38', NULL, 1, 21.192571, 72.799736, 41, 4),
(114, 8, 'testing', NULL, NULL, NULL, '2015-10-12 04:54:52', NULL, 1, 0, 0, 42, 1),
(115, 8, 'could you help me?', NULL, NULL, NULL, '2015-10-12 05:01:01', NULL, 1, 0, 0, 43, 1),
(118, 16, 'first?', NULL, NULL, NULL, '2015-10-12 05:27:08', NULL, 1, 23.022505, 72.571362, 1, 1),
(122, 16, 'jjg', 'uploads/0b8342fc-2656-4ea6-a495-fc3dc6e16f2f.jpg', NULL, NULL, '2015-10-12 08:30:17', NULL, 1, 21.192571, 72.799736, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `roleId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Contains list of roles' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `name`) VALUES
(1, 'admin'),
(2, 'teacher'),
(3, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `true_answers`
--

CREATE TABLE IF NOT EXISTS `true_answers` (
  `trueAnswerId` int(11) NOT NULL AUTO_INCREMENT,
  `questionId` int(11) DEFAULT NULL,
  `answerId` int(11) DEFAULT NULL,
  PRIMARY KEY (`trueAnswerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Contains list of true answer' AUTO_INCREMENT=52 ;

--
-- Dumping data for table `true_answers`
--

INSERT INTO `true_answers` (`trueAnswerId`, `questionId`, `answerId`) VALUES
(1, 1, 1),
(2, 71, 23),
(3, 71, 24),
(4, 71, 25),
(5, 71, 26),
(6, 72, 27),
(7, 73, 31),
(8, 80, 58),
(9, 81, 60),
(10, 82, 66),
(11, 83, 70),
(12, 84, 74),
(13, 85, 76),
(14, 84, 74),
(15, 86, 84),
(16, 87, 91),
(17, 88, 93),
(18, 89, 98),
(19, 90, 102),
(20, 91, 104),
(21, 92, 108),
(22, 93, 113),
(23, 94, 116),
(24, 95, 120),
(25, 96, 124),
(26, 97, 131),
(27, 98, NULL),
(28, 99, NULL),
(29, 100, 149),
(30, 101, 152),
(31, 102, 156),
(32, 103, 161),
(33, 104, 166),
(34, 105, 168),
(35, 106, 174),
(36, 107, 176),
(37, 108, 180),
(38, 109, 184),
(39, 110, 188),
(40, 111, 192),
(41, 112, 196),
(42, 113, 200),
(43, 114, 204),
(44, 115, 209),
(45, 116, 213),
(46, 117, 217),
(47, 118, 221),
(48, 119, 224),
(49, 120, 228),
(50, 121, 232),
(51, 122, 236);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `role` int(11) NOT NULL DEFAULT '0',
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `rollNo` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  `isActive` int(1) NOT NULL DEFAULT '1' COMMENT '1= ACTIVE, 0=DEACTIVE',
  `deviceToken` varchar(255) DEFAULT NULL,
  `deviceType` varchar(255) DEFAULT NULL,
  `lastLoginDate` datetime DEFAULT NULL,
  `gender` int(10) unsigned DEFAULT NULL COMMENT '0 - Male | 1 - Female',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Contains list of user with role' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `role`, `firstName`, `lastName`, `email`, `password`, `address`, `mobile`, `grade`, `rollNo`, `created`, `modified`, `isActive`, `deviceToken`, `deviceType`, `lastLoginDate`, `gender`) VALUES
(1, 1, 'Charmi', 'Gheewala', 'cg.narola@narolainfotech.com', 'a8b4fab1bed511ab6850908c72c547c9', 'df sfg gs g gs ', '4789652322', '2', '1', '2015-09-18 12:24:58', '2015-09-28 13:14:20', 1, 'errorGettingToken', 'ios', '2015-10-13 08:39:04', NULL),
(3, 3, 'ankita', 'Pandya', 'r@gmail.com', 'sqCh2wqKcA1O7TIR', 'adajan', '54645661168', 'a', '1', '2015-09-25 04:08:11', NULL, 1, NULL, NULL, NULL, 1),
(5, 3, 'xyz', 'abc', 's@gmail.com', 'DKFpoEuSSmFn0QXe', 'bhatar', '75675675688', 'B', '2', '2015-09-25 05:15:25', NULL, 1, NULL, NULL, NULL, 0),
(6, 3, 'anp', 'pandya', 'anp.narola@narolainfotech.com', 'a8b4fab1bed511ab6850908c72c547c9', 'adajan', '9044789445', 'A', '3', '2015-09-25 09:26:16', NULL, 1, '4536ffde00defrf436', 'ios', '2015-09-26 08:42:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE IF NOT EXISTS `user_answers` (
  `userAnswerId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `assignmentId` int(11) DEFAULT NULL,
  `questionId` int(11) DEFAULT NULL,
  `answerId` int(11) DEFAULT NULL,
  `isTrue` int(11) NOT NULL DEFAULT '0',
  `startTime` timestamp NULL DEFAULT NULL,
  `endTime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`userAnswerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Contains list of answers given by user' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`userAnswerId`, `userId`, `assignmentId`, `questionId`, `answerId`, `isTrue`, `startTime`, `endTime`) VALUES
(1, 1, 1, 1, 2, 0, '2015-10-13 04:48:29', '2015-10-13 04:48:36'),
(2, 1, 1, 1, 3, 0, '2015-10-13 04:48:29', '2015-10-13 04:48:38'),
(3, 1, 1, 1, 4, 0, '2015-10-13 04:48:29', '2015-10-13 04:48:41'),
(4, 1, 1, 1, 1, 1, '2015-10-13 04:48:29', '2015-10-13 04:48:44'),
(5, 1, 1, 2, 1, 1, '2015-10-13 04:48:48', '2015-10-13 04:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_assignments`
--

CREATE TABLE IF NOT EXISTS `user_assignments` (
  `userAssignId` int(11) NOT NULL AUTO_INCREMENT,
  `assignmentId` int(11) DEFAULT NULL,
  `assignedUserId` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT '0',
  `isCompleted` int(11) NOT NULL DEFAULT '0',
  `assignedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userAssignId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Contain list of assignment with assigned student' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_assignments`
--

INSERT INTO `user_assignments` (`userAssignId`, `assignmentId`, `assignedUserId`, `score`, `isCompleted`, `assignedDate`) VALUES
(1, 1, 1, 0, 0, '2015-10-02 18:30:00'),
(2, 2, 1, 0, 0, '2015-10-02 18:30:00'),
(3, 8, 3, 0, 0, '2015-10-10 04:30:42');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
