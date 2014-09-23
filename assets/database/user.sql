-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 23, 2014 at 08:44 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `name`, `email`, `username`, `activation_code`, `password`, `contactno`, `status`) VALUES
(40, 'Kaley', 'prachanda.gurung@gmail.com', 'cool', 'Fha77Gaf3iHIgTJaFzJs8E5KCFMTZ3OAqmdd11Y3r3Chaupdxw', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', '9807867543', 1),
(36, 'email', 'emocentmagar@gmail.com', 'email', '7kGQDVnP5KC9gaOczxlyt4VDDK9B7hYZh9s4jK6ThgSZ4R3jQn', '2b02ec7e9d05c189d93cec36f91e8a0afb652b4d', '1232131232', 0),
(41, 'lalita', 'prachanda.gurung@gmail.com', 'lalita', 'o1RLntXsPBtGQpRCkNfPdLeeYUeQYszXRas8okuqAQUTJuQTyV', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', '9806621721', 0),
(42, 'mitaaab', 'prachanda.gurung@gmail.com', 'meetab', 's989DFVhZS9yGqWrVqbwsxC0mP5xuvOC6xiAbfZ9PNNaNnnMH6', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', '9813100099', 1),
(37, 'prachanda', 'prachanda.gurung@gmail.com', 'prachanda', 'Ybf6vTMH1Ma2qF93gWjEUrLL2y746aeWfZeYA2M4xLfaPBPcPi', '57ba84e52900341f62b8ea91bfee3ac3235e8870', '1234567890', 0),
(39, 'santaa', 'prachanda.gurung@gmail.com', 'santaa', 'dbMBiw08wCw5nvL3jIM4RhqRDqO1vcZErULjZBOumi6loW94X4', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', '9806532137', 0),
(34, 'prachanda', 'prachanda.gurung@gmail.com', 'username', 'dwL0pVIBzJTglPIZcVL4zDqlrVw3YHOANxgClpa7gl3Jb2dERo', '58d3974f9d580cd37976b740270610d6b694a2e2', '1823812638', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
