-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 18, 2021 at 06:27 AM
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
-- Table structure for table `backup_materials`
--

DROP TABLE IF EXISTS `backup_materials`;
CREATE TABLE IF NOT EXISTS `backup_materials` (
  `material_name` varchar(200) NOT NULL,
  `material_id` varchar(20) NOT NULL,
  `color` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backup_materials`
--

INSERT INTO `backup_materials` (`material_name`, `material_id`, `color`, `quantity`) VALUES
('navy blue', 'FAB001', 'blue', 200),
('viscose', 'FAB002', 'gray', 150),
('Polyester', 'FAB003', 'PLUM TC', 150),
('65% polyester', 'FAB004', 'BLUE TC', 175),
('LINNING CHARCOLE DOT', 'FAB005', 'CARCILE FOR DARK COLORS', 150),
('45% COTTON', 'FAB006', 'BLUE TC', 175);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bom`
--

INSERT INTO `bom` (`bom_id`, `material_id`, `required_qty`, `style_id`, `unit`, `waste`, `moq`, `is_issued`) VALUES
(1, 'FAB01', 500, 'sty01', 'PCs', 34, 3, 1),
(2, 'FAB02', 100, 'sty01', 'Meters', 34, 4, 0),
(5, '395', 1, 'sty01', 'PCs', 0, 0, 0),
(3, 'FAB01', 500, 'sty01', 'PCs', 34, 3, 1),
(4, 'FAB02', 100, 'sty01', 'Meters', 34, 4, 0),
(6, '20', 2, 'sty01', '', 0, 0, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `damagestock`
--

INSERT INTO `damagestock` (`damage_stock_id`, `damage_qty`, `material_id`, `is_recover`, `material_name`, `Date`) VALUES
(65, 45, 'FAB01', 0, 'FABRIC', '2020-12-12'),
(64, 50, 'FAB01', 0, 'FABRIC', '2020-12-09');

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
('FAB01', 'CORTTON BLUE', 'BLUE', 'http://[::1]/ims/images/material/Cot-Lin-Cadet-Blue11.jpg', 'FABRIC', -500),
('BTN02', '2 HOLE BUTTON', 'BROWN', 'http://[::1]/ims/images/material/1055DB_800x1.jpg', 'BUTTON', 20),
('BTN01', '3 HOLE BUTTON', 'GREEN', 'http://[::1]/ims/images/material/71aC5lt1uCL__AC_SX425_11.jpg', 'BUTTON', 50),
('FAB02', 'RED COLOR CILK FABRIC', 'RED', 'http://[::1]/ims/images/material/il_570xN_1838487459_rpds.jpg', 'FABRIC', 20),
('THD01', 'RED COLOR THREAD', 'RED', 'http://[::1]/ims/images/material/Sewing-Threads-Polyester-Machine-Embroidery-Hand-Red-Thread-Craft-Patch-Steering-wheel-Sewing-Supplies_jpg_640x640.jpg', 'THREAD', 100);

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
-- Table structure for table `new_order2`
--

DROP TABLE IF EXISTS `new_order2`;
CREATE TABLE IF NOT EXISTS `new_order2` (
  `material_name` varchar(200) NOT NULL,
  `gate_pass_no` varchar(50) NOT NULL,
  `style` varchar(100) NOT NULL,
  `material_id` varchar(50) NOT NULL,
  `sample_name` varchar(200) NOT NULL,
  `sample_details` varchar(500) NOT NULL,
  `color` varchar(100) NOT NULL,
  `roll_no` varchar(100) NOT NULL,
  `required_qty` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  PRIMARY KEY (`gate_pass_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_order2`
--

INSERT INTO `new_order2` (`material_name`, `gate_pass_no`, `style`, `material_id`, `sample_name`, `sample_details`, `color`, `roll_no`, `required_qty`, `description`) VALUES
('viscose', '003', 'jacket', 'FAB005', 'navy jacket', 'new one', 'blue', '100', 500, 0),
('viscose', '001', 'jacket', 'FAB005', 'navy jacket', 'new one', 'blue', '100', 500, 0),
('viscose', '005', 'jacket', 'FAB005', 'navy jacket', 'new one', 'blue', '100', 500, 0);

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
('', '20', 100, 'FAB02', 0);

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
('STC5fc60fcb4', '2020-12-22', 20, 'FAB2'),
('STC5fd05d5d1', '2020-12-09', 50, 'BTN01'),
('STC5fd05f203', '2020-12-09', 20, 'BTN02'),
('STC5fd05f5a4', '2020-12-09', 80, 'FAB02'),
('STC5fd05f864', '2020-12-09', 100, 'THD01');

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
('sty01', 'shirt', 1800),
('sty03', 'shirt', 900);

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
('ADMIN3', 'Hameesha', 'hameesha@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'STAFF', '2020-11-26', '767097577', 'Gintota', ''),
('ADMIN4', 'ravindu', 'ravindu@gmail.com', '7b21848ac9af35be0ddb2d6b9fc3851934db8420', 'ADMIN', '2020-11-27', '767097577', 'Gintota', ''),
('STAFF6', 'Ruwan', 'ruwan@gmail.com', '7b21848ac9af35be0ddb2d6b9fc3851934db8420', 'STAFF', '2020-04-29', '0717307044', 'agalawatta', ''),
('ADMIN5', 'watasha', 'watasha@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'ADMIN', '1997-11-18', '767097577', 'matara', 'Screenshot (1).png'),
('ADMIN2', 'kasun', 'kasun@gmail.com', '7b21848ac9af35be0ddb2d6b9fc3851934db8420', 'STAFF', '2020-12-05', '767097577', 'Gintota', ''),
('Admin01', 'manura', 'manura', '81dc9bdb52d04dc20036dbd8313ed055', 'ADMIN', '2020-11-04', '0767878789', 'sd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_requests`
--

DROP TABLE IF EXISTS `user_requests`;
CREATE TABLE IF NOT EXISTS `user_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_requests`
--

INSERT INTO `user_requests` (`id`, `user_name`, `email`, `role`, `status`) VALUES
(1, 'Kasun', 'kasun@gmail.com', 'admin', 1),
(2, 'Santy', 'santy@gmail.com', 'staff', 1),
(3, '@#@%#$#$^', 'ABC@abc.com', 'staff', 1),
(4, 'Kasun', 'kasun@gmail.com', 'admin', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
