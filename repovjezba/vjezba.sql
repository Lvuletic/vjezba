-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 05, 2015 at 09:06 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vjezba`
--
CREATE DATABASE IF NOT EXISTS `vjezba` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `vjezba`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(65) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `imeprezime` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `phone`, `email`, `password`) VALUES
(7, 'Marko Markic', '0919876543', 'marko@gmail.com', '$2a$08$1vphmVis2EkoDxbEpWlbuePek02lngz99bAfDScnLgGQGRxgrcEei'),
(8, 'Jura Juric', '0983456789', 'jjuric@gmail.com', '$2a$08$yWU0QPgSBvhUj78Ow4ihsesKhpCdzMOxWvpo9/XyRn70SfTdVcApe'),
(9, 'Franjo Franjic', '0953568964', 'franjo@gmail.com', '$2a$08$e2W86WOHxspyGbI4R/VeA.znF2uCPKCjMsJck90ZckvQjjnlOtYJW'),
(10, 'Ana Anic', '0952345678', 'ana@gmail.com', '$2a$08$2C4ON.WPDRQDpOvzkqm66.91uYAaW1LDQR49FnPJibJflv8g6kUkS'),
(11, 'Ivo Ivic', '0911234567', 'ivo@gmail.com', '$2a$08$ZhkplYdbmq9Qf0SE0Arxoesdv8E.tLG4lnWI9uujC06yHYdP5/CUa');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_code` int(5) NOT NULL AUTO_INCREMENT,
  `customer` varchar(30) NOT NULL,
  `address_delivery` varchar(30) NOT NULL,
  `total_price` decimal(7,2) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`order_code`),
  KEY `ime_kupca` (`customer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_code`, `customer`, `address_delivery`, `total_price`, `date`) VALUES
(3, 'Luka', 'Rijeka', '174.97', '2015-03-04'),
(4, 'Ante', 'Zagreb', '91.90', '2015-03-04'),
(5, 'Marija', 'Vinkovci', '174.28', '2015-03-04'),
(6, 'Zlata', 'Dubrovnik', '238.24', '2015-03-04'),
(7, 'Ivan', 'Pula', '108.44', '2015-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE IF NOT EXISTS `order_item` (
  `order_code` int(5) NOT NULL,
  `product_code` int(5) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `quantity` int(3) NOT NULL,
  `total_price` decimal(7,2) NOT NULL,
  PRIMARY KEY (`order_code`,`product_code`),
  KEY `product` (`product_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_code`, `product_code`, `price`, `quantity`, `total_price`) VALUES
(3, 1690, '7.99', 3, '23.97'),
(3, 3256, '75.50', 2, '151.00'),
(4, 8479, '15.65', 3, '46.95'),
(4, 8976, '8.99', 5, '44.95'),
(5, 1234, '123.00', 1, '123.00'),
(5, 7864, '9.99', 2, '19.98'),
(5, 8479, '15.65', 2, '31.30'),
(6, 3256, '75.50', 2, '151.00'),
(6, 6576, '25.75', 3, '77.25'),
(6, 7864, '9.99', 1, '9.99'),
(7, 6576, '25.75', 2, '51.50'),
(7, 7864, '9.99', 1, '9.99'),
(7, 8479, '15.65', 3, '46.95');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `code` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`code`, `name`, `price`) VALUES
(1234, 'perilica', '123.00'),
(1690, 'pasteta', '7.99'),
(3256, 'vino', '75.50'),
(6576, 'mljeveno meso', '25.75'),
(7864, 'kruh', '9.99'),
(8479, 'cokolada', '15.65'),
(8976, 'jogurt', '8.99');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order` FOREIGN KEY (`order_code`) REFERENCES `orders` (`order_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product` FOREIGN KEY (`product_code`) REFERENCES `product` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
