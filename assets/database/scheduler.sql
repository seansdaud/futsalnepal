-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2014 at 11:25 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `futsalnepal`
--

-- --------------------------------------------------------

--
-- Table structure for table `scheduler`
--

CREATE TABLE IF NOT EXISTS `scheduler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` text NOT NULL,
  `end_time` text NOT NULL,
  `time_diff` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `scheduler`
--

INSERT INTO `scheduler` (`id`, `start_time`, `end_time`, `time_diff`, `admin_id`, `day`, `price`) VALUES
(15, '12:00am', '01:00am', 2, 1, 1, '123'),
(16, '12:00am', '01:00am', 2, 1, 2, '2'),
(17, '12:00am', '01:00am', 2, 1, 3, '323'),
(18, '12:00am', '01:00am', 2, 1, 4, '111'),
(19, '12:00am', '01:00am', 2, 1, 5, '0'),
(20, '12:00am', '01:00am', 2, 1, 6, '0'),
(21, '12:00am', '01:00am', 2, 1, 7, '0'),
(22, '01:00am', '2:00am', 2, 1, 1, '4'),
(23, '01:00am', '2:00am', 2, 1, 2, '5'),
(24, '01:00am', '2:00am', 2, 1, 3, '6'),
(25, '01:00am', '2:00am', 2, 1, 4, '0'),
(26, '01:00am', '2:00am', 2, 1, 5, '0'),
(27, '01:00am', '2:00am', 2, 1, 6, '0'),
(28, '01:00am', '2:00am', 2, 1, 7, '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
