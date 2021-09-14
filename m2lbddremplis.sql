-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 10 Septembre 2021 à 15:49
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `m2l`
--

-- --------------------------------------------------------

--
-- Structure de la table `bulletin`
--

CREATE TABLE IF NOT EXISTS `bulletin` (
  `idbulletin` varchar(50) NOT NULL,
  `mois` varchar(50) NOT NULL,
  `annee` varchar(50) NOT NULL,
  `bulletinPDF` varchar(50) NOT NULL,
  `idContrat` varchar(50) NOT NULL,
  PRIMARY KEY (`idbulletin`),
  KEY `bulletin_Contrat_FK` (`idContrat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bulletin`
--

INSERT INTO `bulletin` (`idbulletin`, `mois`, `annee`, `bulletinPDF`, `idContrat`) VALUES
('1', 'Mai', '20012', '---', '1'),
('2', 'décembre', '2001', '---', '2');

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

CREATE TABLE IF NOT EXISTS `club` (
  `idClub` varchar(50) NOT NULL,
  `nomClub` varchar(50) NOT NULL,
  `adresseClub` varchar(50) NOT NULL,
  `idLigue` varchar(5) NOT NULL,
  `idCommune` varchar(50) NOT NULL,
  PRIMARY KEY (`idClub`),
  KEY `club_ligue_FK` (`idLigue`),
  KEY `club_Commune0_FK` (`idCommune`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `club`
--

INSERT INTO `club` (`idClub`, `nomClub`, `adresseClub`, `idLigue`, `idCommune`) VALUES
('1', 'Bordeaux Athlé', ' 290 Av. du Maréchal de Lattre', '1', '33000'),
('2', 'Jeunes de Saint?Augustin Bordeaux Métropole', '11 allée des Peupliers', '1', '33000'),
('3', 'Air³ Bordeaux', '9 Rue Bertrand de Goth', '1', '33000'),
('4', 'Girondins de Bordeaux Natation', '60 cours de Luze', '1', '33000'),
('5', 'Ski Club Bordelais Guyenne', '96 Cr de la Martinique', '1', '33000'),
('6', 'Athletic Club de Bobi', '44 Rue Marcel Cachin', '2', '93000'),
('7', 'Pantin Basket Club', '77 Av. de la Division Leclerc', '2', '93000'),
('8', 'Etoile Bobigny', '52 Rue Romain Rolland', '2', '93000'),
('9', 'Fosse De Plongee', '20-38 Rue Auguste Delaune', '2', '93000');

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE IF NOT EXISTS `commune` (
  `idCommune` varchar(50) NOT NULL,
  `Libelle` varchar(50) NOT NULL,
  `idDepartement` varchar(50) NOT NULL,
  PRIMARY KEY (`idCommune`),
  KEY `Commune_Departement_FK` (`idDepartement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commune`
--

INSERT INTO `commune` (`idCommune`, `Libelle`, `idDepartement`) VALUES
('33000', 'Bordeaux', '33'),
('93000', 'Bobigny', '93');

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE IF NOT EXISTS `contrat` (
  `idContrat` varchar(50) NOT NULL,
  `dateDebut` varchar(50) NOT NULL,
  `dateFin` varchar(50) NOT NULL,
  `typeContrat` varchar(50) NOT NULL,
  `nbHeures` varchar(50) NOT NULL,
  `idUser` varchar(50) NOT NULL,
  PRIMARY KEY (`idContrat`),
  KEY `Contrat_utilisateur_FK` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contrat`
--

INSERT INTO `contrat` (`idContrat`, `dateDebut`, `dateFin`, `typeContrat`, `nbHeures`, `idUser`) VALUES
('1', '20/05/2012', '20/05/15', 'CDD', '90', '2'),
('2', '21/12/2001', '----', 'CDI', '20', '1');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
  `idDepartement` varchar(50) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`idDepartement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `departement`
--

INSERT INTO `departement` (`idDepartement`, `libelle`) VALUES
('33', 'Gironde'),
('93', 'Seine-Saint-Denis');

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE IF NOT EXISTS `fonction` (
  `idFonct` varchar(50) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`idFonct`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fonction`
--

INSERT INTO `fonction` (`idFonct`, `libelle`) VALUES
('1', 'secretaire'),
('2', 'intervenant'),
('3', 'Responssable RH'),
('4', 'Responssable Formation');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE IF NOT EXISTS `formation` (
  `idForma` varchar(50) NOT NULL,
  `intitule` varchar(50) NOT NULL,
  `descriptif` varchar(50) NOT NULL,
  `duree` varchar(50) NOT NULL,
  `dateOuvertinscriptions` varchar(50) NOT NULL,
  `dateClotureInscriptions` varchar(50) NOT NULL,
  `DateDebutFormation` varchar(50) NOT NULL,
  `EffectifMax` varchar(50) NOT NULL,
  PRIMARY KEY (`idForma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`idForma`, `intitule`, `descriptif`, `duree`, `dateOuvertinscriptions`, `dateClotureInscriptions`, `DateDebutFormation`, `EffectifMax`) VALUES
('1', 'Formation d''entrée ', 'Formation de mise à niveau', '1 mois', '10/12/2002', '01/01/2003', '02/01/2003', '200'),
('2', 'Camp d''entrainement', 'Il y a de bonne douches la bas', '1 jour', '01/01/2005', '03/01/2005', '04/01/2005', '2000');

-- --------------------------------------------------------

--
-- Structure de la table `inscrire`
--

CREATE TABLE IF NOT EXISTS `inscrire` (
  `idForma` varchar(50) NOT NULL,
  `idUser` varchar(50) NOT NULL,
  `EtatInscrit` tinyint(1) NOT NULL,
  `DateInscription` varchar(50) NOT NULL,
  PRIMARY KEY (`idForma`,`idUser`),
  KEY `INSCRIRE_utilisateur0_FK` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inscrire`
--

INSERT INTO `inscrire` (`idForma`, `idUser`, `EtatInscrit`, `DateInscription`) VALUES
('1', '6', 1, '12/12/2002'),
('2', '1', 1, '01/01/2005');

-- --------------------------------------------------------

--
-- Structure de la table `ligue`
--

CREATE TABLE IF NOT EXISTS `ligue` (
  `idLigue` varchar(5) NOT NULL,
  `nomLigue` varchar(50) NOT NULL,
  `site` varchar(50) NOT NULL,
  `descriptif` varchar(50) NOT NULL,
  PRIMARY KEY (`idLigue`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ligue`
--

INSERT INTO `ligue` (`idLigue`, `nomLigue`, `site`, `descriptif`) VALUES
('1', 'Ligue de bordeaux', '3 rue du hugo ', 'Regroupement de Club de Bordeaux'),
('2', 'Ligue de bobigny', '4 rue du anthone-i-ou-y', 'Regroupement de Club de Bobigny');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUser` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `statut` varchar(50) NOT NULL,
  `typeUser` varchar(50) NOT NULL,
  `idFonct` varchar(50) NOT NULL,
  `idLigue` varchar(5) DEFAULT NULL,
  `idClub` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  KEY `utilisateur_fonction_FK` (`idFonct`),
  KEY `utilisateur_ligue0_FK` (`idLigue`),
  KEY `utilisateur_club1_FK` (`idClub`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `nom`, `prenom`, `login`, `mdp`, `statut`, `typeUser`, `idFonct`, `idLigue`, `idClub`) VALUES
('1', 'anto', 'anto', 'anto', 'anto', 'salarié', '1', '2', '2', '4'),
('2', 'Delacompta', 'sandrine', 'secretaire', 'secretaire', 'salarié', '1', '1', NULL, NULL),
('3', 'Garrido', 'Didier', 'responssableRH', 'responssableRH', 'salarié', '1', '3', NULL, NULL),
('4', 'Nadalle', 'Rafael', 'ResponssableForm', 'ResponssableForm', 'salarié', '1', '1', NULL, NULL),
('5', 'admin', 'admin', 'admin', 'admin', 'Bénévole', '1', '1', NULL, NULL),
('6', 'Igor', 'Igor', 'Igor', 'Igor', 'Bénévole', '1', '2', '1', '8');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `bulletin`
--
ALTER TABLE `bulletin`
  ADD CONSTRAINT `bulletin_Contrat_FK` FOREIGN KEY (`idContrat`) REFERENCES `contrat` (`idContrat`);

--
-- Contraintes pour la table `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `club_ligue_FK` FOREIGN KEY (`idLigue`) REFERENCES `ligue` (`idLigue`),
  ADD CONSTRAINT `club_Commune0_FK` FOREIGN KEY (`idCommune`) REFERENCES `commune` (`idCommune`);

--
-- Contraintes pour la table `commune`
--
ALTER TABLE `commune`
  ADD CONSTRAINT `Commune_Departement_FK` FOREIGN KEY (`idDepartement`) REFERENCES `departement` (`idDepartement`);

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `Contrat_utilisateur_FK` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`idUser`);

--
-- Contraintes pour la table `inscrire`
--
ALTER TABLE `inscrire`
  ADD CONSTRAINT `INSCRIRE_Formation_FK` FOREIGN KEY (`idForma`) REFERENCES `formation` (`idForma`),
  ADD CONSTRAINT `INSCRIRE_utilisateur0_FK` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`idUser`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_fonction_FK` FOREIGN KEY (`idFonct`) REFERENCES `fonction` (`idFonct`),
  ADD CONSTRAINT `utilisateur_ligue0_FK` FOREIGN KEY (`idLigue`) REFERENCES `ligue` (`idLigue`),
  ADD CONSTRAINT `utilisateur_club1_FK` FOREIGN KEY (`idClub`) REFERENCES `club` (`idClub`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
