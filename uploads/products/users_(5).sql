-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2015 at 05:27 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `ref_id` varchar(50) NOT NULL,
  `fb_id` bigint(20) NOT NULL,
  `twitter_id` bigint(20) NOT NULL,
  `google_id` bigint(20) NOT NULL,
  `linkedin_id` varchar(20) NOT NULL,
  `instagram_id` varchar(25) NOT NULL,
  `tumblr_id` varchar(25) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `via_login` varchar(25) NOT NULL,
  `facebook_verify` varchar(10) DEFAULT '0',
  `facebook_email` varchar(25) NOT NULL,
  `twitter_verify` varchar(5) DEFAULT '0',
  `twitter_email` varchar(25) NOT NULL,
  `google_verify` varchar(10) DEFAULT '0',
  `google_email` varchar(25) NOT NULL,
  `email_verify` varchar(10) DEFAULT '0',
  `linkedin_verify` varchar(10) DEFAULT '0',
  `linkedin_email` varchar(30) NOT NULL,
  `instagram_verify` varchar(25) DEFAULT '0',
  `instagram_email` varchar(25) NOT NULL,
  `tumblr_verify` varchar(20) DEFAULT '0',
  `tumblr_email` varchar(25) NOT NULL,
  `phone_verify` varchar(10) NOT NULL DEFAULT '0',
  `email_verification_code` varchar(50) DEFAULT '0',
  `phone_verification_code` int(10) NOT NULL,
  `referral_code` varchar(15) NOT NULL,
  `trips_referral_code` varchar(15) NOT NULL,
  `list_referral_code` varchar(15) NOT NULL,
  `referral_amount` int(10) NOT NULL,
  `timezone` varchar(11) NOT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `newpass` varchar(34) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `newpass_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `newpass_time` datetime DEFAULT NULL,
  `last_ip` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_login` int(31) NOT NULL,
  `created` int(31) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `photo_status` int(11) NOT NULL,
  `shortlist` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `ref_id`, `fb_id`, `twitter_id`, `google_id`, `linkedin_id`, `instagram_id`, `tumblr_id`, `coupon_code`, `username`, `password`, `email`, `via_login`, `facebook_verify`, `facebook_email`, `twitter_verify`, `twitter_email`, `google_verify`, `google_email`, `email_verify`, `linkedin_verify`, `linkedin_email`, `instagram_verify`, `instagram_email`, `tumblr_verify`, `tumblr_email`, `phone_verify`, `email_verification_code`, `phone_verification_code`, `referral_code`, `trips_referral_code`, `list_referral_code`, `referral_amount`, `timezone`, `banned`, `ban_reason`, `newpass`, `newpass_key`, `newpass_time`, `last_ip`, `last_login`, `created`, `modified`, `photo_status`, `shortlist`) VALUES
(2, 1, '8c319f28d81d1527a9428e9a5c2195f5', 738003329578819, 0, 0, '0', '', '', '83635', 'smart', '$1$9GC4Qanp$R8mhX.Wal6XAHAnCdj9pu1', 'smartinfosys2013@gmail.com', '', 'yes', 'smartinfosystesting@gmail', '0', '', 'yes', 'smartinfosysseo@gmail.com', 'no', '', '', '0', '', '0', '', 'no', 'fa19a7a0bee2332302e5cf988eab420e', 7744, '8c319f28d81d152', '', '', 0, 'UTC', 0, NULL, NULL, NULL, NULL, '116.74.111.104', 1440249096, 1419316475, '2015-08-22 13:11:36', 1, '13,13');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
