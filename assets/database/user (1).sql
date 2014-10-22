-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2014 at 10:14 AM
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `image` varchar(20) NOT NULL,
  `activation_code` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `contactno` varchar(14) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `username`, `image`, `activation_code`, `password`, `contactno`, `status`) VALUES
(40, 'Kaley', 'prachanda.gurung@gmail.com', 'cool', '40.png', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', '9807867543', 1),
(42, 'mitaaab', 'prachanda.gurung@gmail.com', 'meetab', '', 's989DFVhZS9yGqWrVqbwsxC0mP5xuvOC6xiAbfZ9PNNaNnnMH6', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', '9813100099', 1),
(43, 'prachanda gurung', 'prachanda.gurung@gmail.com', 'pracanda', '43.png', 'q50jNS3ncsa5dXHrbske04nfV9bMi39tGzJc5lxthNGrPjIMoT', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', '9875644123', 1),
(44, 'mahatma', 'prachanda.gurung@gmail.com', 'mahatma', '', 'FvujmPA6y9cQ3cmXnDUiNvRdHSYyFN2VrRvU8ligCg9SvPpeXq', '6e5fd925c494844c2c56656d18a4f6623768512f', '9803412345', 1),
(45, 'lalit thapa', 'prachanda.gurung@gmail.com', 'lalita', '', 'HdK2pRUN9wenuBvXvz0N3LBA0SvWA9EyQmBHdjRS5FSlZx6Mc6', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', '9806621721', 1),
(46, 'suyog khoste', 'prachanda.gurung@gmail.com', 'suyog', '', 'CqA3qGehHmctsPbA5EDiMzMiUaqZTdWY8X2JXwXdiMJf65NCON', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', '9806642985', 1),
(47, 'asfd', 'czinka62@yahoo.com', 'prakan', '', '1lXc2d8ouCoasix3oDJ3GRQfWn8czahZ0LENK0laj4oZTXMCu4', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', '1234345677', 0),
(48, 'Chandra Gurung', 'prachanda.gurung@gmail.com', 'khotte', '48.jpg', 'EsEWtlAmOiEziLzymVWoZsc5MI35RLfpXvUu9GpTREBxJUz07m', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', '9807442985', 1),
(49, 'suyog kc', 'prachanda.gurung@gmail.com', 'kraz', '', 'WEn6DUiMoVTTCFabBgQZj3eJodSiEqFh1njoSwFe5C2Yrn0S0R', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', '98065765', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
