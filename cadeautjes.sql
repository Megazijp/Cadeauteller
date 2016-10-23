-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 23 okt 2016 om 15:29
-- Serverversie: 5.6.16
-- PHP-versie: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `cadeautjes`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cadeautjes`
--

CREATE TABLE IF NOT EXISTS `cadeautjes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `van` int(11) NOT NULL,
  `voor` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Gegevens worden uitgevoerd voor tabel `cadeautjes`
--

INSERT INTO `cadeautjes` (`id`, `van`, `voor`) VALUES
(1, 4, 3),
(2, 6, 3),
(3, 0, 7),
(4, 3, 10),
(5, 4, 10),
(6, 3, 0),
(7, 2, 8),
(8, 3, 4),
(9, 3, 4),
(10, 3, 4),
(11, 9, 2),
(12, 5, 11),
(13, 6, 11),
(14, 1, 5),
(15, 1, 2),
(16, 7, 8),
(17, 7, 8),
(18, 4, 8),
(19, 5, 1),
(21, 11, 9),
(22, 3, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lastchanged`
--

CREATE TABLE IF NOT EXISTS `lastchanged` (
  `familie` varchar(5) NOT NULL,
  `tijd` date NOT NULL,
  `laatste` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `lastchanged`
--

INSERT INTO `lastchanged` (`familie`, `tijd`, `laatste`) VALUES
('zijp', '2015-09-29', 0),
('poot', '2015-09-29', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `personen`
--

CREATE TABLE IF NOT EXISTS `personen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naam` varchar(100) NOT NULL,
  `familie` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Gegevens worden uitgevoerd voor tabel `personen`
--

INSERT INTO `personen` (`id`, `naam`, `familie`) VALUES
(0, 'Kitty', 'alle'),
(1, 'Derk', 'poot'),
(2, 'Loes', 'poot'),
(3, 'Paul', 'zijp'),
(4, 'Ingeborg', 'zijp'),
(5, 'Rianne', 'poot'),
(6, 'Pierre', 'poot'),
(7, 'Suzanne', 'zijp'),
(8, 'Dick', 'zijp'),
(9, 'Margot', 'poot'),
(10, 'Mark', 'zijp'),
(11, 'Norah', 'poot');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
