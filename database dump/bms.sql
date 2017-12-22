-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql212.byetcluster.com
-- Generation Time: Dec 22, 2017 at 02:03 AM
-- Server version: 5.6.35-81.0
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ltm_21141417_bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(20) NOT NULL,
  `admin_pass` text NOT NULL,
  `email` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_pass`, `email`) VALUES
(1, 'admin', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', 'sujeetdiwakar@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `author` varchar(30) NOT NULL,
  `isbm` varchar(30) NOT NULL,
  `page` varchar(30) NOT NULL,
  `tchap` varchar(30) NOT NULL,
  `edition` varchar(30) NOT NULL,
  `pub` varchar(30) NOT NULL,
  `price` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `isbm`, `page`, `tchap`, `edition`, `pub`, `price`) VALUES
(1, 'THE C PROGRAMMING', 'DENNIS M. RITCHIE', '0596-0', '272', '8', '2ND EDITION', 'PHI', '125'),
(2, 'Unix', 'W. Richard', '370-0', '576', '16', '2ND EDITION', 'PEARSON', '320'),
(3, 'Mastering c++', 'Rajkumar', '463454-2', '450', '12', '3RD EDITION', 'McGraw Hill', '499'),
(4, 'Introduction to AI', 'W. Patterson', '0777-3', '450', '10', '2ND EDITION', 'PHI', '195'),
(5, 'Let Us C', 'Yashavant Kanetkar', '163-7', '650', '12', '8TH EDITION', 'BPB', '198'),
(6, 'Fundamental of Computer', 'Pradeep kr', '456-0', '345', '10', '2ND EDITION', 'PHI', '490');

-- --------------------------------------------------------

--
-- Table structure for table `books1`
--

DROP TABLE IF EXISTS `books1`;
CREATE TABLE IF NOT EXISTS `books1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `author` varchar(30) NOT NULL,
  `isbm` varchar(30) NOT NULL,
  `page` varchar(30) NOT NULL,
  `tchap` varchar(30) NOT NULL,
  `edition` varchar(30) NOT NULL,
  `pub` varchar(30) NOT NULL,
  `price` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `books1`
--

INSERT INTO `books1` (`id`, `title`, `author`, `isbm`, `page`, `tchap`, `edition`, `pub`, `price`) VALUES
(1, 'THE C PROGRAMMING', 'DENNIS M. RITCHIE', '0596-0', '272', '8', '2ND EDITION', 'PHI', '125'),
(2, 'Unix', 'W. Richard', '370-0', '576', '16', '2ND EDITION', 'PEARSON', '320'),
(3, 'Mastering c++', 'Rajkumar', '463454-2', '450', '12', '3RD EDITION', 'McGraw Hill', '499'),
(4, 'Introduction to AI', 'W. Patterson', '0777-3', '450', '10', '2ND EDITION', 'PHI', '195'),
(5, 'Let Us C', 'Yashavant Kanetkar', '163-7', '650', '12', '8TH EDITION', 'BPB', '198');

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

DROP TABLE IF EXISTS `chapter`;
CREATE TABLE IF NOT EXISTS `chapter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `content` varchar(30) NOT NULL,
  `chap_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`id`, `book_id`, `content`, `chap_no`) VALUES
(1, 1, 'Let us begin with a quick intr', 1),
(2, 1, 'Types, Operators, and Expressi', 2),
(3, 2, 'Introduction\\r\\nIPC stands for', 1),
(4, 3, 'Object-Oriendted Programming p', 1),
(5, 4, 'Artificial Intelligence as we ', 1),
(6, 5, 'C is a programming language de', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `pass` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `user_name`, `pass`) VALUES
(1, 'demo', 'demo@gmail.com', 'demo', '*C142FB215B6E05B7C134B1A653AD4B455157FD79');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
