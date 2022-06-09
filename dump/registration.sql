-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 10:58 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur_s`
--

CREATE TABLE IF NOT EXISTS `administrateur_s` (
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(255) NOT NULL,
  `prenom` varchar(234) NOT NULL,
  `prof` varchar(245) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `administrateur_s`
--

INSERT INTO `administrateur_s` (`nom`, `password`, `id`, `adresse`, `prenom`, `prof`) VALUES
('apc_e_learning', '54bd48a34c0745002a25920edd83fe3476b7439f49e343e8c82e07a54aa6bb3b', 11, 'apc_e_learning@gmail.com', 'apc', 'INFORMATIQUE');

-- --------------------------------------------------------

--
-- Table structure for table `autres_doc`
--

CREATE TABLE IF NOT EXISTS `autres_doc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matiere` varchar(255) NOT NULL,
  `classe` varchar(234) NOT NULL,
  `descriptions` varchar(245) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `nom` longblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `autres_doc`
--

INSERT INTO `autres_doc` (`id`, `matiere`, `classe`, `descriptions`, `reference`, `nom`) VALUES
(1, 'MathÃ©matique', 'TroisiÃ¨me', 'session 2021', 'Td', 0x436f7272656374696f6e2054442047656e6965204c6f67696369656c2e706466);

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `niveau` varchar(234) NOT NULL,
  `message` text NOT NULL,
  `datepost` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id`, `nom`, `niveau`, `message`, `datepost`) VALUES
(3, 'ssd', 'sdsd', 'ddfdf', '2022-02-27 22:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `corriges`
--

CREATE TABLE IF NOT EXISTS `corriges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` longblob NOT NULL,
  `region` varchar(234) NOT NULL,
  `etablissement` varchar(245) NOT NULL,
  `classe` varchar(255) NOT NULL,
  `departement` varchar(245) NOT NULL,
  `matiere` varchar(255) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `id_parent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `corriges`
--

INSERT INTO `corriges` (`id`, `nom`, `region`, `etablissement`, `classe`, `departement`, `matiere`, `descriptions`, `id_parent`) VALUES
(1, 0x50524f4a455420444520474c2028434f564f49545552414745292e706466, '', 'CollÃ¨ge Notre Dame de Dschang', 'Terminale C', '', 'Physique', 'session 2021 evaluation 4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `documentations`
--

CREATE TABLE IF NOT EXISTS `documentations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` longblob NOT NULL,
  `region` varchar(243) NOT NULL,
  `etablissement` varchar(243) NOT NULL,
  `classe` varchar(243) NOT NULL,
  `matiere` varchar(243) NOT NULL,
  `descriptions` varchar(243) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `reponse`
--

CREATE TABLE IF NOT EXISTS `reponse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) NOT NULL,
  `nom` varchar(234) NOT NULL,
  `email` varchar(245) NOT NULL,
  `message` text NOT NULL,
  `datepost` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `tutoriels`
--

CREATE TABLE IF NOT EXISTS `tutoriels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `videos` text NOT NULL,
  `classe` varchar(234) NOT NULL,
  `matiere` varchar(255) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(243) NOT NULL,
  `password` varchar(243) NOT NULL,
  `niveau` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(234) NOT NULL,
  `num_tel` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_abonner`
--

CREATE TABLE IF NOT EXISTS `user_abonner` (
  `id_parent` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(234) NOT NULL,
  PRIMARY KEY (`id_parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_ad`
--

CREATE TABLE IF NOT EXISTS `user_ad` (
  `USER_LOGIN` varchar(255) NOT NULL,
  `USER_PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_ad`
--

INSERT INTO `user_ad` (`USER_LOGIN`, `USER_PASSWORD`) VALUES
('apc_e_learning', 'a3a8aa94e4218dacd9d8ae8e55f2f2664fb0cf8192c1dc7689d86aefa00bbc74');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
