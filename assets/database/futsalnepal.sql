-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2014 at 09:59 AM
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
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'dsfkgjnb@ads'),
(2, 'prabesh', 'eccb32ae41bbf25c4a245187af0cfa2075d19394', 'prachanda.gurung@gma');

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
-- Table structure for table `superadmin`
--

CREATE TABLE IF NOT EXISTS `superadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `username`, `password`, `email`) VALUES
(1, 'super', '8451ba8a14d79753d34cb33b51ba46b4b025eb81', 'gmail@lalit.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `contactno` varchar(14) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `Id` (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `name`, `email`, `username`, `password`, `contactno`) VALUES
(10, 'mitab', 'chakre@gmail.com', 'chakre', '3c8732409c42604c9e5a9b56b2410d0d6f1febf9', '9800088877'),
(8, 'lalita thapa', 'emocent.magar@gmail.com', 'emo', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', '2147483647'),
(9, 'suyog khoste', 'khoste@gmail.com', 'khoste', '074544ad077ef70ea84820b5c3f3e61166217f18', '2147483647'),
(7, 'Prachanda Gurung', 'czinka62@yahoo.com', 'prachanda', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', '2147483647');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
