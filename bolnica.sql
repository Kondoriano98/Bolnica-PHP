-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 11, 2019 at 07:44 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bolnica`
--

-- --------------------------------------------------------

--
-- Table structure for table `hirurg`
--

DROP TABLE IF EXISTS `hirurg`;
CREATE TABLE IF NOT EXISTS `hirurg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `korisnicko_ime` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `ime` text NOT NULL,
  `prezime` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hirurg`
--

INSERT INTO `hirurg` (`id`, `korisnicko_ime`, `email`, `lozinka`, `ime`, `prezime`) VALUES
(5, 'Lux98', 'luka.tesic@gmail.com', 'luka123...', 'Luka', 'Tesic'),
(6, 'Petark89', 'petarkostic@gmail.com', 'petar89...', 'Petar', 'Kostic'),
(7, 'Marko', 'marko.markovic070@gmail.com', 'marko123', 'Marko', 'Markovic'),
(8, 'Cvele98', 'cvelemladj@gmail.com', 'cvele123', 'Cvijetin', 'Mladjenovic'),
(9, 'Vladimircak12', 'vladimircakic@gmail.com', 'vladimir123', 'Vladimir', 'Cakic'),
(10, 'ZarkoT', 'zarko@tanasic123gmail.com', 'zarko123', 'Zarko', 'Tanasic'),
(11, 'Mladen', 'mladenv@gmail.com', 'mladen123', 'Mladen', 'Vasic'),
(12, 'FilipK98', 'filipkrstic@gmail.com', 'filip123', 'Filip', 'Krstic');

-- --------------------------------------------------------

--
-- Table structure for table `konzumira`
--

DROP TABLE IF EXISTS `konzumira`;
CREATE TABLE IF NOT EXISTS `konzumira` (
  `trajanje_konzumacije` varchar(255) NOT NULL,
  `pacijent_id` int(11) NOT NULL,
  `lek_id` int(11) NOT NULL,
  PRIMARY KEY (`lek_id`,`pacijent_id`),
  KEY `pacijent_id` (`pacijent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `konzumira`
--

INSERT INTO `konzumira` (`trajanje_konzumacije`, `pacijent_id`, `lek_id`) VALUES
('15 dana', 5, 5),
('3 dana', 12, 5),
('2,5 meseca', 13, 5);

-- --------------------------------------------------------

--
-- Table structure for table `lek`
--

DROP TABLE IF EXISTS `lek`;
CREATE TABLE IF NOT EXISTS `lek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) NOT NULL,
  `vrsta` text NOT NULL,
  `kolicna` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lek`
--

INSERT INTO `lek` (`id`, `naziv`, `vrsta`, `kolicna`) VALUES
(2, 'Rapidol', 'Antibiotik', '450mg'),
(3, 'Kxalol', 'Antidepresiv', '300mg'),
(4, 'Paracetamol', 'Analgetik', '400mg'),
(5, 'Fervex', 'Antibiotik', '500mg'),
(6, 'Citeral', 'Antikoagulans', '550mg');

-- --------------------------------------------------------

--
-- Table structure for table `operacija`
--

DROP TABLE IF EXISTS `operacija`;
CREATE TABLE IF NOT EXISTS `operacija` (
  `pacijent_id` int(11) NOT NULL,
  `hirurg_id` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  PRIMARY KEY (`pacijent_id`,`hirurg_id`),
  KEY `hirurg_id` (`hirurg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `operacija`
--

INSERT INTO `operacija` (`pacijent_id`, `hirurg_id`, `datum`) VALUES
(5, 6, '2019-06-05 06:20:07'),
(8, 10, '2019-06-05 08:24:32'),
(12, 10, '2019-06-01 18:23:17'),
(13, 8, '2019-06-13 15:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `pacijent`
--

DROP TABLE IF EXISTS `pacijent`;
CREATE TABLE IF NOT EXISTS `pacijent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soba_id` int(11) NOT NULL,
  `ime` text NOT NULL,
  `prezime` text NOT NULL,
  `adresa` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `soba_id` (`soba_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pacijent`
--

INSERT INTO `pacijent` (`id`, `soba_id`, `ime`, `prezime`, `adresa`) VALUES
(5, 6, 'Nenad', 'Sevic', 'Zivko Petrovic 6, Beograd'),
(8, 6, 'Mile', 'Svilar', 'Ustanicka 45, Beograd'),
(10, 12, 'Filip', 'Vasic', 'Zemunski kej, Beograd'),
(11, 11, 'Nenad', 'Jezidc', 'Gavrilo Prinicp, 23'),
(12, 10, 'Milan ', 'Vasic', 'Balkanska 23, Novi Sad'),
(13, 6, 'Nemanja ', 'Cvetkovic', 'Ustanicka, Beograd');

-- --------------------------------------------------------

--
-- Table structure for table `soba`
--

DROP TABLE IF EXISTS `soba`;
CREATE TABLE IF NOT EXISTS `soba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `broj` int(11) NOT NULL,
  `sprat` int(11) NOT NULL,
  `vrsta` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `soba`
--

INSERT INTO `soba` (`id`, `broj`, `sprat`, `vrsta`) VALUES
(6, 8, 8, 'Stomatologija'),
(9, 3, 4, 'Sok Soba'),
(10, 1, 1, 'Intezivna nega'),
(11, 2, 4, 'Urologija'),
(12, 2, 6, 'Pedijatrija');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `konzumira`
--
ALTER TABLE `konzumira`
  ADD CONSTRAINT `konzumira_ibfk_1` FOREIGN KEY (`lek_id`) REFERENCES `lek` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konzumira_ibfk_2` FOREIGN KEY (`pacijent_id`) REFERENCES `pacijent` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `operacija`
--
ALTER TABLE `operacija`
  ADD CONSTRAINT `operacija_ibfk_1` FOREIGN KEY (`hirurg_id`) REFERENCES `hirurg` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `operacija_ibfk_2` FOREIGN KEY (`pacijent_id`) REFERENCES `pacijent` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pacijent`
--
ALTER TABLE `pacijent`
  ADD CONSTRAINT `pacijent_ibfk_1` FOREIGN KEY (`soba_id`) REFERENCES `soba` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
