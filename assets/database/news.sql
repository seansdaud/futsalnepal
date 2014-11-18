-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2014 at 07:58 AM
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
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `image` text NOT NULL,
  `content` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `day` int(11) NOT NULL,
  `month` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `content`, `admin_id`, `date`, `day`, `month`) VALUES
(21, 'title', '546af6812bc79.jpg', '<p>$this-&gt;input-&gt;post(&#39;id&#39;)</p>', 9, '2014-11-18', 18, 'Nov'),
(22, 'seconf', '546af6b38fd99.jpg', '<p>$this-&gt;input-&gt;post(&#39;id&#39;)</p>\r\n', 6, '2014-11-18', 18, 'Nov'),
(23, 'prabesh', '546af8d6e86e2.jpg', '<p>die(&#39;here&#39;);</p>', 6, '2014-11-18', 18, 'Nov'),
(24, 'alter', '546af8e89f444.jpg', '<p>die(&#39;here&#39;);</p>', 6, '2014-11-18', 18, 'Nov'),
(25, 'fourth', '546af97eb8406.jpg', '<p>die(&#39;here&#39;);</p>', 6, '2014-11-18', 18, 'Nov'),
(26, 'fifth', '546af9966266b.jpg', '<p>die(&#39;here&#39;);</p>', 6, '2014-11-18', 18, 'Nov');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
