-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2019 at 10:19 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `election`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

DROP TABLE IF EXISTS `admin_table`;
CREATE TABLE IF NOT EXISTS `admin_table` (
  `admin_id` int(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'sddsd', 'sdsdsd', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Naran', 'Upreti', 'sandesh_uprety@yahoo.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

DROP TABLE IF EXISTS `candidates`;
CREATE TABLE IF NOT EXISTS `candidates` (
  `candidate_id` int(5) NOT NULL AUTO_INCREMENT,
  `candidate_name` varchar(45) NOT NULL,
  `candidate_state` varchar(45) NOT NULL,
  `candidatevotes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`candidate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidate_id`, `candidate_name`, `candidate_state`, `candidatevotes`) VALUES
(70, 'Hari Poudel', 'Kathmandu', 11),
(71, 'Aashis Rimal', 'Kathmandu', 39),
(72, 'Naran Upreti', 'Chitwan', 26),
(73, 'Kedar Ghimire', 'Lalitpur', 106),
(74, 'Sangam Deuja', 'Bhaktapur', 26),
(75, 'Srijana Shahi', 'Bhaktapur', 78),
(76, 'Rabina Pandey', 'Chitwan', 13),
(77, 'Keshav Silwal', 'Makwanpur', 36),
(78, 'Sandesh Poudel', 'Lalitpur', 22),
(79, 'Bhuwan Regmi', 'Makwanpur', 104);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `stateno` int(5) NOT NULL AUTO_INCREMENT,
  `statename` varchar(45) NOT NULL,
  PRIMARY KEY (`stateno`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`stateno`, `statename`) VALUES
(60, 'Kathmandu'),
(61, 'Chitwan'),
(62, 'Lalitpur'),
(63, 'Makwanpur'),
(64, 'Bhaktapur');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

DROP TABLE IF EXISTS `voters`;
CREATE TABLE IF NOT EXISTS `voters` (
  `voterid` int(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`voterid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`voterid`, `first_name`, `last_name`, `email`, `password`) VALUES
(17, 'User', 'User', 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee'),
(18, 'Naran', 'Upreti', 'sandesh_uprety@yahoo.com', 'b0baee9d279d34fa1dfd71aadb908c3f'),
(19, 'Naran', 'Upreti', 'naran.upreti@yahoo.com', 'b0baee9d279d34fa1dfd71aadb908c3f');

-- --------------------------------------------------------

--
-- Table structure for table `voting_table`
--

DROP TABLE IF EXISTS `voting_table`;
CREATE TABLE IF NOT EXISTS `voting_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voter_id` int(11) NOT NULL,
  `state_name` varchar(50) NOT NULL,
  `candidateName` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `voter_id` (`voter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voting_table`
--

INSERT INTO `voting_table` (`id`, `voter_id`, `state_name`, `candidateName`) VALUES
(19, 19, 'Kathmandu', 'Hari Poudel');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
