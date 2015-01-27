-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 27 jan 2015 kl 13:56
-- Serverversion: 5.6.20
-- PHP-version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `login`
--
CREATE DATABASE IF NOT EXISTS `login` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `login`;

-- --------------------------------------------------------

--
-- Tabellstruktur `inlog`
--

DROP TABLE IF EXISTS `inlog`;
CREATE TABLE IF NOT EXISTS `inlog` (
`id` int(11) NOT NULL,
  `anvnam` varchar(20) NOT NULL,
  `losord` varchar(20) NOT NULL,
  `iv` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `klass` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumpning av Data i tabell `inlog`
--

INSERT INTO `inlog` (`id`, `anvnam`, `losord`, `iv`, `mail`, `klass`) VALUES
(1, 'ida', 'ida', 'matematik5c', 'ida@gmail.com', ''),
(2, 'per', 'per', '', '', '');

-- --------------------------------------------------------

--
-- Tabellstruktur `iv`
--

DROP TABLE IF EXISTS `iv`;
CREATE TABLE IF NOT EXISTS `iv` (
`id` int(11) NOT NULL,
  `kurs` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumpning av Data i tabell `iv`
--

INSERT INTO `iv` (`id`, `kurs`) VALUES
(1, 'matematik5c'),
(2, 'biologi2');

-- --------------------------------------------------------

--
-- Tabellstruktur `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
`id` int(11) NOT NULL,
  `namn` varchar(20) NOT NULL,
  `enamn` varchar(30) NOT NULL,
  `anvnam` varchar(20) NOT NULL,
  `losord` varchar(20) NOT NULL,
  `IV` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumpning av Data i tabell `login`
--

INSERT INTO `login` (`id`, `namn`, `enamn`, `anvnam`, `losord`, `IV`) VALUES
(1, '', '', 'ida', 'ida', ''),
(2, '', '', 'per', 'per', '');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `inlog`
--
ALTER TABLE `inlog`
 ADD PRIMARY KEY (`id`);

--
-- Index för tabell `iv`
--
ALTER TABLE `iv`
 ADD PRIMARY KEY (`id`);

--
-- Index för tabell `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `inlog`
--
ALTER TABLE `inlog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT för tabell `iv`
--
ALTER TABLE `iv`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT för tabell `login`
--
ALTER TABLE `login`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
