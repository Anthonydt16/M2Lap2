-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 24 Septembre 2021 à 16:38
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `m2ltpfinal`
--

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE IF NOT EXISTS `formation` (
  `idForma` varchar(50) NOT NULL,
  `intitule` varchar(50) NOT NULL,
  `descriptif` varchar(50) NOT NULL,
  `duree` varchar(50) NOT NULL,
  `dateOuvertinscriptions` date NOT NULL,
  `dateClotureInscriptions` date NOT NULL,
  `DateDebutFormation` varchar(50) NOT NULL,
  `EffectifMax` varchar(50) NOT NULL,
  PRIMARY KEY (`idForma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`idForma`, `intitule`, `descriptif`, `duree`, `dateOuvertinscriptions`, `dateClotureInscriptions`, `DateDebutFormation`, `EffectifMax`) VALUES
('1', 'Formation d''entrée ', 'Formation de mise à niveau', '1 mois', '2005-08-10', '2005-08-15', '02/01/2003', '200'),
('2', 'Camp d''entrainement', 'Il y a de bonne douches la bas', '1 jour', '2020-03-01', '2020-03-31', '04/01/2005', '2000'),
('3', 'formation professionnelle', 'devenir professionnel', '6 mois', '2010-04-24', '2010-05-25', '01/05/2020', '5');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
