-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 20, 2014 at 10:04 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `futsalnepal`
--
CREATE DATABASE IF NOT EXISTS `futsalnepal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `futsalnepal`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `image` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `image`, `email`) VALUES
(2, 'prabesh', 'eccb32ae41bbf25c4a245187af0cfa2075d19394', '', 'prachanda.gurung@gma');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schedule_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `schedule_id`, `user_id`, `booking_date`) VALUES
(31, 400, 11, '2014-10-12'),
(32, 401, 11, '2014-10-12'),
(33, 30, 0, '2014-10-18'),
(34, 37, 0, '2014-10-18'),
(35, 29, 0, '2014-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `futsal_arena`
--

CREATE TABLE IF NOT EXISTS `futsal_arena` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arena` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `location` varchar(40) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `futsal_arena`
--

INSERT INTO `futsal_arena` (`id`, `arena`, `city`, `location`, `price`) VALUES
(1, 'pokhara futsal pvt. ltd', 'pokhara', 'palikhe chowk', 1500),
(2, 'battle field', 'pokhara', 'lake side', 1200),
(3, 'langhari futsal', 'kathmandu', 'langhari', 1000),
(4, 'imadol enter', 'kathmandu', 'imadol', 1300);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(0);

-- --------------------------------------------------------

--
-- Table structure for table `profile_image`
--

CREATE TABLE IF NOT EXISTS `profile_image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `profile_image`
--

INSERT INTO `profile_image` (`image_id`, `image_name`, `username`) VALUES
(1, 'secondarytile.png', 'lalita'),
(2, 'phptojpg.jpg', 'pracanda');

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
  `book_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `scheduler`
--

INSERT INTO `scheduler` (`id`, `start_time`, `end_time`, `time_diff`, `admin_id`, `day`, `price`, `book_status`) VALUES
(1, '6:00am', '7:00am', 4, 1, 1, '2221', 0),
(2, '6:00am', '7:00am', 4, 1, 2, '3435', 0),
(3, '6:00am', '7:00am', 4, 1, 3, '0', 0),
(4, '6:00am', '7:00am', 4, 1, 4, '0', 0),
(5, '6:00am', '7:00am', 4, 1, 5, '0', 0),
(6, '6:00am', '7:00am', 4, 1, 6, '0', 0),
(7, '6:00am', '7:00am', 4, 1, 7, '0', 0),
(8, '7:00am', '8:00am', 4, 1, 1, '0', 0),
(9, '7:00am', '8:00am', 4, 1, 2, '0', 0),
(10, '7:00am', '8:00am', 4, 1, 3, '0', 0),
(11, '7:00am', '8:00am', 4, 1, 4, '0', 0),
(12, '7:00am', '8:00am', 4, 1, 5, '0', 0),
(13, '7:00am', '8:00am', 4, 1, 6, '0', 0),
(14, '7:00am', '8:00am', 4, 1, 7, '0', 0),
(15, '8:00am', '9:00am', 4, 1, 1, '0', 0),
(16, '8:00am', '9:00am', 4, 1, 2, '0', 0),
(17, '8:00am', '9:00am', 4, 1, 3, '0', 0),
(18, '8:00am', '9:00am', 4, 1, 4, '0', 0),
(19, '8:00am', '9:00am', 4, 1, 5, '0', 0),
(20, '8:00am', '9:00am', 4, 1, 6, '0', 0),
(21, '8:00am', '9:00am', 4, 1, 7, '0', 0),
(22, '9:00am', '10:00am', 4, 1, 1, '0', 0),
(23, '9:00am', '10:00am', 4, 1, 2, '0', 0),
(24, '9:00am', '10:00am', 4, 1, 3, '0', 0),
(25, '9:00am', '10:00am', 4, 1, 4, '0', 0),
(26, '9:00am', '10:00am', 4, 1, 5, '0', 0),
(27, '9:00am', '10:00am', 4, 1, 6, '0', 0),
(28, '9:00am', '10:00am', 4, 1, 7, '0', 0),
(29, '12:00am', '01:00am', 10, 2, 1, '1234', 35),
(30, '12:00am', '01:00am', 10, 2, 2, '123', 33),
(31, '12:00am', '01:00am', 10, 2, 3, '0', 0),
(32, '12:00am', '01:00am', 10, 2, 4, '0', 0),
(33, '12:00am', '01:00am', 10, 2, 5, '0', 0),
(34, '12:00am', '01:00am', 10, 2, 6, '0', 0),
(35, '12:00am', '01:00am', 10, 2, 7, '0', 0),
(36, '01:00am', '2:00am', 10, 2, 1, '0', 0),
(37, '01:00am', '2:00am', 10, 2, 2, '0', 34),
(38, '01:00am', '2:00am', 10, 2, 3, '0', 0),
(39, '01:00am', '2:00am', 10, 2, 4, '0', 0),
(40, '01:00am', '2:00am', 10, 2, 5, '0', 0),
(41, '01:00am', '2:00am', 10, 2, 6, '0', 0),
(42, '01:00am', '2:00am', 10, 2, 7, '0', 0),
(43, '2:00am', '3:00am', 10, 2, 1, '0', 0),
(44, '2:00am', '3:00am', 10, 2, 2, '12', 0),
(45, '2:00am', '3:00am', 10, 2, 3, '0', 0),
(46, '2:00am', '3:00am', 10, 2, 4, '0', 0),
(47, '2:00am', '3:00am', 10, 2, 5, '0', 0),
(48, '2:00am', '3:00am', 10, 2, 6, '0', 0),
(49, '2:00am', '3:00am', 10, 2, 7, '0', 0),
(50, '3:00am', '4:00am', 10, 2, 1, '0', 0),
(51, '3:00am', '4:00am', 10, 2, 2, '0', 0),
(52, '3:00am', '4:00am', 10, 2, 3, '0', 0),
(53, '3:00am', '4:00am', 10, 2, 4, '0', 0),
(54, '3:00am', '4:00am', 10, 2, 5, '0', 0),
(55, '3:00am', '4:00am', 10, 2, 6, '0', 0),
(56, '3:00am', '4:00am', 10, 2, 7, '0', 0),
(57, '4:00am', '5:00am', 10, 2, 1, '0', 0),
(58, '4:00am', '5:00am', 10, 2, 2, '0', 0),
(59, '4:00am', '5:00am', 10, 2, 3, '0', 0),
(60, '4:00am', '5:00am', 10, 2, 4, '0', 0),
(61, '4:00am', '5:00am', 10, 2, 5, '0', 0),
(62, '4:00am', '5:00am', 10, 2, 6, '0', 0),
(63, '4:00am', '5:00am', 10, 2, 7, '0', 0),
(64, '5:00am', '6:00am', 10, 2, 1, '0', 0),
(65, '5:00am', '6:00am', 10, 2, 2, '0', 0),
(66, '5:00am', '6:00am', 10, 2, 3, '0', 0),
(67, '5:00am', '6:00am', 10, 2, 4, '0', 0),
(68, '5:00am', '6:00am', 10, 2, 5, '0', 0),
(69, '5:00am', '6:00am', 10, 2, 6, '0', 0),
(70, '5:00am', '6:00am', 10, 2, 7, '0', 0),
(71, '6:00am', '7:00am', 10, 2, 1, '0', 0),
(72, '6:00am', '7:00am', 10, 2, 2, '0', 0),
(73, '6:00am', '7:00am', 10, 2, 3, '0', 0),
(74, '6:00am', '7:00am', 10, 2, 4, '0', 0),
(75, '6:00am', '7:00am', 10, 2, 5, '0', 0),
(76, '6:00am', '7:00am', 10, 2, 6, '0', 0),
(77, '6:00am', '7:00am', 10, 2, 7, '0', 0),
(78, '7:00am', '8:00am', 10, 2, 1, '0', 0),
(79, '7:00am', '8:00am', 10, 2, 2, '0', 0),
(80, '7:00am', '8:00am', 10, 2, 3, '0', 0),
(81, '7:00am', '8:00am', 10, 2, 4, '0', 0),
(82, '7:00am', '8:00am', 10, 2, 5, '0', 0),
(83, '7:00am', '8:00am', 10, 2, 6, '0', 0),
(84, '7:00am', '8:00am', 10, 2, 7, '0', 0),
(85, '8:00am', '9:00am', 10, 2, 1, '0', 0),
(86, '8:00am', '9:00am', 10, 2, 2, '0', 0),
(87, '8:00am', '9:00am', 10, 2, 3, '0', 0),
(88, '8:00am', '9:00am', 10, 2, 4, '0', 0),
(89, '8:00am', '9:00am', 10, 2, 5, '0', 0),
(90, '8:00am', '9:00am', 10, 2, 6, '0', 0),
(91, '8:00am', '9:00am', 10, 2, 7, '0', 0),
(92, '9:00am', '10:00am', 10, 2, 1, '0', 0),
(93, '9:00am', '10:00am', 10, 2, 2, '0', 0),
(94, '9:00am', '10:00am', 10, 2, 3, '0', 0),
(95, '9:00am', '10:00am', 10, 2, 4, '0', 0),
(96, '9:00am', '10:00am', 10, 2, 5, '0', 0),
(97, '9:00am', '10:00am', 10, 2, 6, '0', 0),
(98, '9:00am', '10:00am', 10, 2, 7, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE IF NOT EXISTS `superadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `image` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `username`, `password`, `image`, `email`) VALUES
(1, 'super', '1363d4641c5b52056c9998d640d0757ffed1505a', 'superadmin_image.jpg', 'gmail@lalit.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `activation_code` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `contactno` varchar(14) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`),
  UNIQUE KEY `Id` (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `name`, `email`, `username`, `activation_code`, `password`, `contactno`, `status`) VALUES
(47, 'asfd', 'czinka62@yahoo.com', 'asfds', '1lXc2d8ouCoasix3oDJ3GRQfWn8czahZ0LENK0laj4oZTXMCu4', '187af39110f572f5d9c675c00b38fc906e68b423', '1234345677', 0),
(40, 'Kaley', 'prachanda.gurung@gmail.com', 'cool', 'Fha77Gaf3iHIgTJaFzJs8E5KCFMTZ3OAqmdd11Y3r3Chaupdxw', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', '9807867543', 1),
(45, 'lalit thapa', 'prachanda.gurung@gmail.com', 'lalita', 'HdK2pRUN9wenuBvXvz0N3LBA0SvWA9EyQmBHdjRS5FSlZx6Mc6', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', '9806621721', 1),
(44, 'mahatma', 'prachanda.gurung@gmail.com', 'mahatma', 'FvujmPA6y9cQ3cmXnDUiNvRdHSYyFN2VrRvU8ligCg9SvPpeXq', '6e5fd925c494844c2c56656d18a4f6623768512f', '9803412345', 1),
(42, 'mitaaab', 'prachanda.gurung@gmail.com', 'meetab', 's989DFVhZS9yGqWrVqbwsxC0mP5xuvOC6xiAbfZ9PNNaNnnMH6', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', '9813100099', 1),
(43, 'prachanda gurung', 'prachanda.gurung@gmail.com', 'pracanda', 'q50jNS3ncsa5dXHrbske04nfV9bMi39tGzJc5lxthNGrPjIMoT', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', '9875644123', 1),
(46, 'suyog khoste', 'prachanda.gurung@gmail.com', 'suyog', 'CqA3qGehHmctsPbA5EDiMzMiUaqZTdWY8X2JXwXdiMJf65NCON', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', '9806642985', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
