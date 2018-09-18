-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 18, 2018 at 07:11 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pwd`) VALUES
(1, 'Kamranhanif27@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `pageID` int(11) NOT NULL AUTO_INCREMENT,
  `pageTitle` varchar(255) DEFAULT NULL,
  `pageStatus` varchar(255) DEFAULT NULL,
  `pageContent` varchar(255) DEFAULT NULL,
  `pageCategory` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pageID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT 'postImg/postdefault.jpg',
  `tag` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `publishDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `content`, `image`, `tag`, `category`, `publishDate`, `user_id`) VALUES
(46, 'Kamran', 'Content of the post', '../postImg/5b9e8f44792fa2.99832753.jpg', 'html, css, js', 'Web Development', '2018-09-16 21:43:40', 31);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `jobTitle` varchar(255) DEFAULT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `userStatus` tinyint(1) DEFAULT NULL,
  `profilePic` varchar(255) DEFAULT '"uploads/profiledefault.png"',
  `user_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `jobTitle`, `userName`, `email`, `userStatus`, `profilePic`, `user_password`) VALUES
(46, 'adfad', 'adfadfad', 'Desiner', 'fadfadfadf', 'kamran@gmail.com', NULL, '../uploads/Kami.jpg', '$2y$10$0VNhUDYaQhbejCUYmrOOguRTqKRGcS4MdqL6pM0ELArCarjw6v2F2'),
(31, 'Kamran', 'Hanif', 'Web Developer', 'Kami112', 'Kamranhanif27@gmail.com', NULL, '../uploads/Kami.jpg', '$2y$10$qccfWhBu13BBkuT6Dou6kej6xHCBQfJbL2gn1CJRaeW9YOi.p263.'),
(35, 'Taha', 'Baheej', 'Student', 'TB7', 'taha.baheej3@gmail.com', NULL, '../uploads/profiledefault.png', '$2y$10$RpNhused3apwHv84cENJ9.jVNa8CN41LXzW2I51jQX.UeZQLpZvla'),
(36, 'Mehran', 'Hanif', 'Student', 'mehran11', 'mehran@gmail.com', NULL, '../uploads/profiledefault.png', '$2y$10$RQyP5j64JKsUqCcbmpaj7eriECGCZ1zcB6VR1dHvgIetcl5w5f.46'),
(47, 'qerqerqer', 'qerqerqer', 'Desiner', 'qerqerqererer', 'kamran@gmail.com', NULL, '../uploads/profiledefault.png', '$2y$10$RUG51uGn67u5WzLetRzR0u63YoFzPWkeLzMd1pNglotb37TJKU0j6');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
