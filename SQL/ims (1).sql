-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 05, 2020 at 05:32 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `bom`
--

DROP TABLE IF EXISTS `bom`;
CREATE TABLE IF NOT EXISTS `bom` (
  `bom_id` int(11) NOT NULL AUTO_INCREMENT,
  `material_id` varchar(10) NOT NULL,
  `required_qty` int(11) NOT NULL,
  `style_id` char(10) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `waste` int(11) NOT NULL,
  `moq` int(11) NOT NULL,
  `is_issued` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bom_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bom`
--

INSERT INTO `bom` (`bom_id`, `material_id`, `required_qty`, `style_id`, `unit`, `waste`, `moq`, `is_issued`) VALUES
(1, 'FAB1', 50, 'sty01', 'PCs', 34, 3, 0),
(2, 'FAB2', 60, 'sty01', 'Meters', 34, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `damagestock`
--

DROP TABLE IF EXISTS `damagestock`;
CREATE TABLE IF NOT EXISTS `damagestock` (
  `damage_stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `damage_qty` int(11) NOT NULL,
  `material_id` varchar(10) NOT NULL,
  `is_recover` int(1) NOT NULL,
  `material_name` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`damage_stock_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `damagestock`
--

INSERT INTO `damagestock` (`damage_stock_id`, `damage_qty`, `material_id`, `is_recover`, `material_name`, `Date`) VALUES
(10, 11, 'Fab01', 0, 'Button', '2020-11-19'),
(11, 33, 'Btn05', 0, 'Button', '2020-11-20'),
(12, 50, 'Fab01', 0, 'BUTTON', '2020-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
CREATE TABLE IF NOT EXISTS `material` (
  `material_id` varchar(10) NOT NULL,
  `material_description` text NOT NULL,
  `color` varchar(100) NOT NULL,
  `item_image` varchar(500) NOT NULL,
  `material_name` varchar(20) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  PRIMARY KEY (`material_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`material_id`, `material_description`, `color`, `item_image`, `material_name`, `total_quantity`) VALUES
('FAB1', 'CORTTON BLUE', 'BLUE', 'http://[::1]/ims/images/material/Cot-Lin-Cadet-Blue11.jpg', 'FABRIC', 590),
('FAB10', 'Fabric 01', 'yellow', '', 'FABRIC', 100),
('FAB2', 'sample testing 01', 'blue', '', 'FABRIC', 20);

-- --------------------------------------------------------

--
-- Table structure for table `materialtype`
--

DROP TABLE IF EXISTS `materialtype`;
CREATE TABLE IF NOT EXISTS `materialtype` (
  `type` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materialtype`
--

INSERT INTO `materialtype` (`type`) VALUES
('BUTTON'),
('FABRIC'),
('THREAD');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `request_id` char(10) NOT NULL,
  `material_id` varchar(10) NOT NULL,
  `quentity` int(11) NOT NULL,
  `bom_id` char(255) NOT NULL,
  `is_iss` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`request_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `material_id`, `quentity`, `bom_id`, `is_iss`) VALUES
('R01', 'Fab02', 60, 'Fabric XL size', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `stock_id` varchar(12) NOT NULL,
  `date` date DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `material_id` varchar(10) NOT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `date`, `quantity`, `material_id`) VALUES
('STC5fc3adc78', '2020-11-29', 100, 'FAB1'),
('STC5fc5239dc', '2020-11-30', 200, 'FAB1'),
('STC5fc523bbe', '2020-11-30', 100, 'FAB10'),
('STC5fc5fe94c', '2020-12-01', 200, 'FAB1'),
('STC5fc60f7f8', '2020-12-29', 100, 'FAB1'),
('STC5fc60fcb4', '2020-12-22', 20, 'FAB2');

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

DROP TABLE IF EXISTS `style`;
CREATE TABLE IF NOT EXISTS `style` (
  `style_id` char(10) NOT NULL,
  `style_name` varchar(100) NOT NULL,
  `num_of_pieces` int(11) NOT NULL,
  PRIMARY KEY (`style_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `style`
--

INSERT INTO `style` (`style_id`, `style_name`, `num_of_pieces`) VALUES
('sty01', 'shirt', 900);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(8) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `avataar` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `password`, `role`, `DOB`, `mobile`, `address`, `avataar`) VALUES
('ADMIN1', 'Manura', 'manura@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ADMIN', '2020-11-04', '0767878789', 'Galle', NULL),
('staff2', 'madumal', 'madumal@gmail.com', '7b21848ac9af35be0ddb2d6b9fc3851934db8420', 'STAFF', '1996-11-20', '767097577', 'Gintota', ''),
('ADMIN3', 'Hameesha', 'hameesha@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'STAFF', '2020-11-26', '767097577', 'Gintota', ''),
('ADMIN4', 'ravindu', 'ravindu@gmail.com', '7b21848ac9af35be0ddb2d6b9fc3851934db8420', 'ADMIN', '2020-11-27', '767097577', 'Gintota', ''),
('STAFF6', 'Ruwan', 'ruwan@gmail.com', '7b21848ac9af35be0ddb2d6b9fc3851934db8420', 'STAFF', '2020-04-29', '0717307044', 'agalawatta', ''),
('ADMIN5', 'watasha', 'watasha@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'ADMIN', '1997-11-18', '767097577', 'matara', 'Screenshot (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `user_requests`
--

DROP TABLE IF EXISTS `user_requests`;
CREATE TABLE IF NOT EXISTS `user_requests` (
  `user_name` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_requests`
--

INSERT INTO `user_requests` (`user_name`, `email`, `role`) VALUES
('Kasun', 'kasun@gmail.com', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
