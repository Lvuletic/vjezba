-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2015 at 06:44 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `praksa`
--
CREATE DATABASE IF NOT EXISTS `praksa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `praksa`;

-- --------------------------------------------------------

--
-- Table structure for table `artikal`
--

CREATE TABLE IF NOT EXISTS `artikal` (
  `sifra` int(5) NOT NULL,
  `naziv` varchar(30) NOT NULL,
  `cijena` decimal(7,2) NOT NULL,
  `kolicina` int(10) NOT NULL,
  PRIMARY KEY (`sifra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikal`
--

INSERT INTO `artikal` (`sifra`, `naziv`, `cijena`, `kolicina`) VALUES
(1234, 'perilica', '550.00', 18),
(1690, 'pasteta', '7.99', 268),
(3256, 'vino', '75.50', 17),
(6576, 'mljeveno meso', '25.75', 45),
(7864, 'kruh', '9.99', 72),
(8479, 'cokolada', '15.65', 19),
(8976, 'jogurt', '8.99', 113);

-- --------------------------------------------------------

--
-- Table structure for table `kupac`
--

CREATE TABLE IF NOT EXISTS `kupac` (
  `sifra` int(5) NOT NULL,
  `imeprezime` varchar(30) NOT NULL,
  `telefon` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `lozinka` varchar(8) NOT NULL,
  PRIMARY KEY (`sifra`),
  KEY `imeprezime` (`imeprezime`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kupac`
--

INSERT INTO `kupac` (`sifra`, `imeprezime`, `telefon`, `email`, `lozinka`) VALUES
(2779, 'Marko Markic', '0919876543', 'marko@gmail.com', 'Marko00'),
(4752, 'Jura Juric', '0983456789', 'jjuric@gmail.com', 'Jura11'),
(6098, 'Franjo Franjic', '0953568964', 'franjo@gmail.com', 'franjo77'),
(7658, 'Ana Anic', '0952345678', 'ana@gmail.com', 'ana99'),
(9876, 'Ivo Ivic', '0911234567', 'ivo@gmail.com', 'ivo73');

-- --------------------------------------------------------

--
-- Table structure for table `narudzba`
--

CREATE TABLE IF NOT EXISTS `narudzba` (
  `sifra_N` int(5) NOT NULL AUTO_INCREMENT,
  `ime_kupca` varchar(30) NOT NULL,
  `adresa_dostava` varchar(30) NOT NULL,
  `ukupna_cijena` decimal(7,2) NOT NULL,
  `datum` varchar(12) NOT NULL,
  PRIMARY KEY (`sifra_N`),
  KEY `ime_kupca` (`ime_kupca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `narudzba`
--

INSERT INTO `narudzba` (`sifra_N`, `ime_kupca`, `adresa_dostava`, `ukupna_cijena`, `datum`) VALUES
(24, 'franjo franjic', 'rijeka', '574.00', '2015-02-28'),
(25, 'ana anic', 'zagreb', '574.00', '2015-02-28'),
(26, 'jura juric', 'opatija', '1650.00', '2015-02-28'),
(27, 'matej matejic', 'novigrad', '36.00', '2015-02-28'),
(28, 'zlata zlatic', 'vinkovci', '50.00', '2015-03-01'),
(29, 'iva ivic', 'vukovar', '50.28', '2015-03-01'),
(30, 'vedran vedric', 'sisak', '226.50', '2015-03-01'),
(31, 'francek', 'dubrovnik', '77.25', '2015-03-01'),
(32, 'borna bornic', 'split', '23.97', '2015-03-01'),
(33, 'jadranka', 'zadar', '26.97', '2015-03-01'),
(34, 'alica', 'krk', '651.25', '2015-03-01'),
(35, 'luka lukic', 'karlovac', '659.24', '2015-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `stavka_narudzba`
--

CREATE TABLE IF NOT EXISTS `stavka_narudzba` (
  `sifra_S` int(5) NOT NULL AUTO_INCREMENT,
  `sifra_N` int(5) NOT NULL,
  `sifra_A` int(5) NOT NULL,
  `ukupna_cijena` decimal(7,2) NOT NULL,
  `naziv_A` varchar(30) NOT NULL,
  PRIMARY KEY (`sifra_S`),
  KEY `sifra_N` (`sifra_N`),
  KEY `sifra_A` (`sifra_A`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `stavka_narudzba`
--

INSERT INTO `stavka_narudzba` (`sifra_S`, `sifra_N`, `sifra_A`, `ukupna_cijena`, `naziv_A`) VALUES
(1, 24, 1690, '8.00', 'pasteta'),
(2, 24, 1234, '550.00', 'perilica'),
(3, 24, 8479, '16.00', 'cokolada'),
(4, 25, 1690, '8.00', 'pasteta'),
(5, 25, 1234, '550.00', 'perilica'),
(6, 25, 8479, '16.00', 'cokolada'),
(7, 26, 1234, '550.00', 'perilica'),
(8, 26, 1234, '550.00', 'perilica'),
(9, 26, 1234, '550.00', 'perilica'),
(10, 27, 8976, '9.00', 'jogurt'),
(11, 27, 8976, '9.00', 'jogurt'),
(12, 27, 8976, '9.00', 'jogurt'),
(13, 27, 8976, '9.00', 'jogurt'),
(14, 28, 8976, '9.00', 'jogurt'),
(15, 28, 8479, '16.00', 'cokolada'),
(16, 28, 8479, '16.00', 'cokolada'),
(17, 28, 7864, '10.00', 'kruh'),
(18, 29, 8976, '8.99', 'jogurt'),
(19, 29, 8479, '15.65', 'cokolada'),
(20, 29, 8479, '15.65', 'cokolada'),
(21, 29, 7864, '9.99', 'kruh'),
(22, 30, 3256, '75.50', 'vino'),
(23, 30, 3256, '75.50', 'vino'),
(24, 30, 3256, '75.50', 'vino'),
(25, 31, 6576, '25.75', 'mljeveno meso'),
(26, 31, 6576, '25.75', 'mljeveno meso'),
(27, 31, 6576, '25.75', 'mljeveno meso'),
(28, 32, 1690, '7.99', 'pasteta'),
(29, 32, 1690, '7.99', 'pasteta'),
(30, 32, 1690, '7.99', 'pasteta'),
(31, 33, 8976, '8.99', 'jogurt'),
(32, 33, 8976, '8.99', 'jogurt'),
(33, 33, 8976, '8.99', 'jogurt'),
(34, 34, 3256, '75.50', 'vino'),
(35, 34, 1234, '550.00', 'perilica'),
(36, 34, 6576, '25.75', 'mljeveno meso'),
(37, 35, 3256, '75.50', 'vino'),
(38, 35, 6576, '25.75', 'mljeveno meso'),
(39, 35, 1690, '7.99', 'pasteta'),
(40, 35, 1234, '550.00', 'perilica');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stavka_narudzba`
--
ALTER TABLE `stavka_narudzba`
  ADD CONSTRAINT `sifra_artikl` FOREIGN KEY (`sifra_A`) REFERENCES `artikal` (`sifra`),
  ADD CONSTRAINT `sifra_narudzba` FOREIGN KEY (`sifra_N`) REFERENCES `narudzba` (`sifra_N`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
