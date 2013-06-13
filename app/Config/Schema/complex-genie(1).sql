-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2013 at 09:15 PM
-- Server version: 5.1.63
-- PHP Version: 5.3.5-1ubuntu7.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `complex-genie`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 62),
(2, 1, NULL, NULL, 'Dashboards', 2, 5),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 1, NULL, NULL, 'Pages', 6, 9),
(5, 4, NULL, NULL, 'display', 7, 8),
(6, 1, NULL, NULL, 'ProfilePictures', 10, 19),
(7, 6, NULL, NULL, 'index', 11, 12),
(8, 6, NULL, NULL, 'view', 13, 14),
(9, 6, NULL, NULL, 'add', 15, 16),
(10, 6, NULL, NULL, 'delete', 17, 18),
(11, 1, NULL, NULL, 'Roles', 20, 31),
(12, 11, NULL, NULL, 'index', 21, 22),
(13, 11, NULL, NULL, 'view', 23, 24),
(14, 11, NULL, NULL, 'add', 25, 26),
(15, 11, NULL, NULL, 'edit', 27, 28),
(16, 11, NULL, NULL, 'delete', 29, 30),
(17, 1, NULL, NULL, 'Users', 32, 59),
(18, 17, NULL, NULL, 'login', 33, 34),
(19, 17, NULL, NULL, 'logout', 35, 36),
(20, 17, NULL, NULL, 'index', 37, 38),
(21, 17, NULL, NULL, 'myProfile', 39, 40),
(22, 17, NULL, NULL, 'view', 41, 42),
(23, 17, NULL, NULL, 'add', 43, 44),
(24, 17, NULL, NULL, 'register', 45, 46),
(25, 17, NULL, NULL, 'edit', 47, 48),
(26, 17, NULL, NULL, 'delete', 49, 50),
(27, 17, NULL, NULL, 'checkUsername', 51, 52),
(28, 17, NULL, NULL, 'changePassword', 53, 54),
(29, 17, NULL, NULL, 'changeProfilePicture', 55, 56),
(30, 17, NULL, NULL, 'initDB', 57, 58),
(31, 1, NULL, NULL, 'AclExtras', 60, 61);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Role', 1, NULL, 1, 4),
(2, NULL, 'Role', 2, NULL, 5, 8),
(3, NULL, 'Role', 3, NULL, 9, 12),
(4, 1, 'User', 1, NULL, 2, 3),
(5, 2, 'User', 2, NULL, 6, 7),
(6, 3, 'User', 3, NULL, 10, 11);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 1, '-1', '-1', '-1', '-1'),
(3, 2, 3, '1', '1', '1', '1'),
(4, 2, 12, '1', '1', '1', '1'),
(5, 2, 20, '1', '1', '1', '1'),
(6, 2, 28, '1', '1', '1', '1'),
(7, 2, 27, '1', '1', '1', '1'),
(8, 2, 21, '1', '1', '1', '1'),
(9, 2, 7, '1', '1', '1', '1'),
(10, 3, 1, '-1', '-1', '-1', '-1'),
(11, 3, 3, '1', '1', '1', '1'),
(12, 3, 12, '1', '1', '1', '1'),
(13, 3, 13, '1', '1', '1', '1'),
(14, 3, 20, '1', '1', '1', '1'),
(15, 3, 28, '1', '1', '1', '1'),
(16, 3, 27, '1', '1', '1', '1'),
(17, 3, 21, '1', '1', '1', '1'),
(18, 3, 7, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `profile_pictures`
--

CREATE TABLE IF NOT EXISTS `profile_pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `profile_picture` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `profile_pictures`
--

INSERT INTO `profile_pictures` (`id`, `user_id`, `profile_picture`, `created`, `modified`) VALUES
(2, 1, 'ff57d3f3fe6f35f96d993c6db.png', '2013-06-12 17:54:52', '2013-06-12 17:54:52'),
(3, 1, '78fe800eb97b55e6a2b5cebec.png', '2013-06-12 17:55:14', '2013-06-12 17:55:14'),
(5, 3, '65750605e1b5155bf102a6c6c.jpg', '2013-06-12 18:20:50', '2013-06-12 18:20:50'),
(6, 3, '5db4c734eb99f772f085cc64e.png', '2013-06-12 18:21:00', '2013-06-12 18:21:00'),
(10, 7, '54609681e49d9b1dda41b7826.jpeg', '2013-06-13 15:50:29', '2013-06-13 15:50:29'),
(11, 7, '175956babd9e583bd76a912ae.jpeg', '2013-06-13 15:50:35', '2013-06-13 15:50:35'),
(12, 7, '8a1a92dc7c65f83ffb3c74843.jpg', '2013-06-13 15:50:50', '2013-06-13 15:50:50'),
(13, 7, '8055ade69aefb95135cc2f9b9.png', '2013-06-13 15:50:56', '2013-06-13 15:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  `user_count` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role` (`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `user_count`, `created`, `modified`, `user_id`, `updated_by`) VALUES
(1, 'administrators', 1, '2013-06-13 18:47:19', '2013-06-13 18:47:19', 0, 0),
(2, 'managers', 1, '2013-06-13 18:47:26', '2013-06-13 18:47:26', 0, 0),
(3, 'users', 1, '2013-06-13 18:47:32', '2013-06-13 18:47:32', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `role_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `profile_picture_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `is_active`, `role_id`, `first_name`, `last_name`, `username`, `gender`, `password`, `email_address`, `date_of_birth`, `profile_picture_id`, `created`, `modified`) VALUES
(1, 1, 1, 'Sandip', 'Ghadge', 'sandip', '', '95b154f4c2baf4f8a127a940df4d3ab34e30cc22', 'sandip.ghadge@wwindia.com', '1990-04-03', 0, '2013-06-13 18:50:02', '2013-06-13 18:50:02'),
(2, 1, 2, 'sagar', 'shinde', 'sagar', '', 'a1fd9d1a865a78655b3da05b417fb0383328bd4a', 'sagar.shinde@wwindia.com', '2013-06-03', 0, '2013-06-13 18:50:53', '2013-06-13 19:31:42'),
(3, 1, 3, 'huzefa', 'madraswala', 'huzefa', '', 'ad02c1c6ae1cdaf387668b842a2e2e6781bd8f41', 'huzefa.madraswala@wwindia.com', '1987-02-04', 0, '2013-06-13 18:51:37', '2013-06-13 19:31:32');
