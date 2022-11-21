-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2016 at 01:43 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbgadget`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `ID` int(11) NOT NULL,
  `Product` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'Laptops'),
(2, 'Computer Set'),
(3, 'Hard Disk'),
(4, 'CCTV'),
(5, 'Mouse'),
(6, 'Keyboard'),
(11, 'Memory');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `item` text NOT NULL,
  `amount` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `dateOrdered` varchar(100) NOT NULL,
  `dateDelivered` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `contact`, `address`, `email`, `item`, `amount`, `status`, `dateOrdered`, `dateDelivered`) VALUES
(5, 'Peter Paul Segura', '256-2842 / 233-6066', '049, Maracas, Lahug, Cebu City', 'deewylperez_03@yahoo.com', '(3) Product 202, (1) Product 202, ', '200', 'confirmed', '10/04/14 08:05:35 AM', '10/04/14 08:15:25 AM'),
(6, 'sdf sdf', '33', 'sdfsdf', 'a@yahoo.com', '(1) Product 101, ', '300', 'confirmed', '10/04/14 09:23:34 PM', '10/04/14 09:31:04 PM'),
(7, 'sdf sdf', 'sd33', 'sdf', 'sdf@yahoo.com', '(1) Product 101, ', '0', 'confirmed', '10/06/14 11:15:59 AM', '06/14/15 09:52:56 AM'),
(8, 'sdf dsf', '33', 'dsfsdfsdf', 'a@yahoo.com', '(1) wer, ', '0', 'confirmed', '10/18/14 11:34:45 AM', '06/14/15 09:52:38 AM'),
(9, 'john hohn', '234', 'dsdfdg', 'a@yahoo.com', '(1) Product 202, ', '100', 'confirmed', '06/14/15 09:53:36 AM', '06/14/15 09:53:56 AM'),
(10, 'a a', 'e424', 'dsdfdg', 'a@yahoo.com', '(1) Product 202, (2) Product 101, ', '400.5', 'confirmed', '06/14/15 10:02:11 AM', '02/24/16 08:42:55 PM');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(11) NOT NULL,
  `imgUrl` text NOT NULL,
  `Product` text NOT NULL,
  `Description` text NOT NULL,
  `Price` double NOT NULL,
  `Category` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `imgUrl`, `Product`, `Description`, `Price`, `Category`) VALUES
(80, 'Hydrangeas.jpg', 'Product 101', 'This is a sample description', 300.5, 'Hard Disk'),
(81, 'Penguins.jpg', 'wer', 'dsf', 3400, 'Keyboard'),
(82, 'C360_2014-07-23-12-19-43-367.jpg', 'Product 202', 'Quick description', 100, 'Laptops');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'administrator', 'bobby'),
(2, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
