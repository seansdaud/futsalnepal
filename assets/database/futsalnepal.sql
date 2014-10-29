-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2014 at 09:37 AM
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
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `image`) VALUES
(1, 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'dsfkgjnb@ads', '1.jpg'),
(2, 'prabesh', 'eccb32ae41bbf25c4a245187af0cfa2075d19394', 'prachanda.gurung@gma', '0'),
(6, 'krazz', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', 'suyogkrazz@gmail.com', '6.png');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `schedule_id`, `user_id`, `booking_date`) VALUES
(20, 1403, 1, '2014-10-20'),
(21, 1402, 1, '2014-10-19'),
(22, 1417, 1, '2014-10-21'),
(23, 1423, 1, '2014-10-27');

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
-- Table structure for table `scheduler`
--

CREATE TABLE IF NOT EXISTS `scheduler` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `start_time` text NOT NULL,
  `end_time` text NOT NULL,
  `time_diff` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `book_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1471 ;

--
-- Dumping data for table `scheduler`
--

INSERT INTO `scheduler` (`id`, `start_time`, `end_time`, `time_diff`, `admin_id`, `day`, `price`, `book_status`) VALUES
(1366, '12:00am', '01:00am', 5, 2, 1, '0', 0),
(1367, '12:00am', '01:00am', 5, 2, 2, '0', 0),
(1368, '12:00am', '01:00am', 5, 2, 3, '0', 0),
(1369, '12:00am', '01:00am', 5, 2, 4, '0', 0),
(1370, '12:00am', '01:00am', 5, 2, 5, '0', 0),
(1371, '12:00am', '01:00am', 5, 2, 6, '0', 0),
(1372, '12:00am', '01:00am', 5, 2, 7, '0', 0),
(1373, '01:00am', '2:00am', 5, 2, 1, '0', 0),
(1374, '01:00am', '2:00am', 5, 2, 2, '0', 0),
(1375, '01:00am', '2:00am', 5, 2, 3, '0', 0),
(1376, '01:00am', '2:00am', 5, 2, 4, '0', 0),
(1377, '01:00am', '2:00am', 5, 2, 5, '0', 0),
(1378, '01:00am', '2:00am', 5, 2, 6, '0', 0),
(1379, '01:00am', '2:00am', 5, 2, 7, '0', 0),
(1380, '2:00am', '3:00am', 5, 2, 1, '0', 0),
(1381, '2:00am', '3:00am', 5, 2, 2, '0', 0),
(1382, '2:00am', '3:00am', 5, 2, 3, '0', 0),
(1383, '2:00am', '3:00am', 5, 2, 4, '0', 0),
(1384, '2:00am', '3:00am', 5, 2, 5, '0', 0),
(1385, '2:00am', '3:00am', 5, 2, 6, '0', 0),
(1386, '2:00am', '3:00am', 5, 2, 7, '0', 0),
(1387, '3:00am', '4:00am', 5, 2, 1, '0', 0),
(1388, '3:00am', '4:00am', 5, 2, 2, '0', 0),
(1389, '3:00am', '4:00am', 5, 2, 3, '0', 0),
(1390, '3:00am', '4:00am', 5, 2, 4, '0', 0),
(1391, '3:00am', '4:00am', 5, 2, 5, '0', 0),
(1392, '3:00am', '4:00am', 5, 2, 6, '0', 0),
(1393, '3:00am', '4:00am', 5, 2, 7, '0', 0),
(1394, '4:00am', '5:00am', 5, 2, 1, '0', 0),
(1395, '4:00am', '5:00am', 5, 2, 2, '0', 0),
(1396, '4:00am', '5:00am', 5, 2, 3, '0', 0),
(1397, '4:00am', '5:00am', 5, 2, 4, '0', 0),
(1398, '4:00am', '5:00am', 5, 2, 5, '0', 0),
(1399, '4:00am', '5:00am', 5, 2, 6, '0', 0),
(1400, '4:00am', '5:00am', 5, 2, 7, '0', 0),
(1450, '12:00am', '01:00am', 3, 1, 1, '65765', 0),
(1451, '12:00am', '01:00am', 3, 1, 2, '0', 0),
(1452, '12:00am', '01:00am', 3, 1, 3, '0', 0),
(1453, '12:00am', '01:00am', 3, 1, 4, '0', 0),
(1454, '12:00am', '01:00am', 3, 1, 5, '0', 0),
(1455, '12:00am', '01:00am', 3, 1, 6, '0', 0),
(1456, '12:00am', '01:00am', 3, 1, 7, '0', 0),
(1457, '01:00am', '2:00am', 3, 1, 1, '0', 0),
(1458, '01:00am', '2:00am', 3, 1, 2, '0', 0),
(1459, '01:00am', '2:00am', 3, 1, 3, '0', 0),
(1460, '01:00am', '2:00am', 3, 1, 4, '0', 0),
(1461, '01:00am', '2:00am', 3, 1, 5, '0', 0),
(1462, '01:00am', '2:00am', 3, 1, 6, '0', 0),
(1463, '01:00am', '2:00am', 3, 1, 7, '0', 0),
(1464, '2:00am', '3:00am', 3, 1, 1, '0', 0),
(1465, '2:00am', '3:00am', 3, 1, 2, '0', 0),
(1466, '2:00am', '3:00am', 3, 1, 3, '0', 0),
(1467, '2:00am', '3:00am', 3, 1, 4, '0', 0),
(1468, '2:00am', '3:00am', 3, 1, 5, '0', 0),
(1469, '2:00am', '3:00am', 3, 1, 6, '0', 0),
(1470, '2:00am', '3:00am', 3, 1, 7, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE IF NOT EXISTS `superadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `username`, `password`, `email`, `image`) VALUES
(1, 'super', '1363d4641c5b52056c9998d640d0757ffed1505a', 'gmail@lalit.com', 'superadmin_image.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `username` text,
  `image` varchar(20) NOT NULL,
  `activation_code` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `contactno` text,
  `status` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `username`, `image`, `activation_code`, `password`, `contactno`, `status`) VALUES
(1, 'Prachanda Gurung', 'suyogkrazz@gmail.com', 'pracanda', '1.png', 'ytbBGvlu37RQFQkMIz6mb1pqAbMTc4obUuRHX129SWXN2SlSqL', '1c9059170910835368500990479a5cf828444d34', '9806642985', 1),
(2, 'suyog krazz', 'suyogkrazz@gmail.com', 'krazz', '2.png', 'x6Bm6rJZPEISE8jq9ZxQbn29Gyk9RoNvKQpy7zzp3LaY8Q1ihH', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', '9814142985', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
