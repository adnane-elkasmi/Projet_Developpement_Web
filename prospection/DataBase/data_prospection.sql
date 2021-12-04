-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 22 déc. 2019 à 08:03
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `contactlycee`
--

DROP TABLE IF EXISTS `contactlycee`;
CREATE TABLE IF NOT EXISTS `contactlycee` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Genre` varchar(100) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `Fonction` varchar(100) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `MailForum` varchar(100) NOT NULL,
  `LigneDirecte` varchar(100) NOT NULL,
  `Idlycee` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Idlycee` (`Idlycee`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contactlycee`
--

INSERT INTO `contactlycee` (`Id`, `Genre`, `Nom`, `Prenom`, `Fonction`, `Mail`, `MailForum`, `LigneDirecte`, `Idlycee`) VALUES
(1, 'M', 'FRANTZ', 'Charles-Philippe', 'Secrétaire', 'test@test.fr', 'forumtest@test.fr', '01.34.05.80.90', 2),
(2, 'F', 'VO', 'Christelle', 'Directrice', 'test2@test.fr', 'forumtest2@test.fr', '01.35.43.23.88', 5),
(3, 'F', 'COLLAS', 'Collas', 'CPE', 'colcollas@moissan.fr', 'collas@moissan.fr', '01.74.25.15.87', 6),
(4, 'M', 'FRANTZ', 'Charles-Philippe', 'Secrétaire', 'test@test.fr', 'forumtest@test.fr', '01.34.05.80.90', 1),
(5, 'F', 'VO', 'Christelle', 'Directrice', 'test2@test.fr', 'forumtest2@test.fr', '01.35.43.23.88', 3),
(6, 'M', 'FRANTZ', 'Charles-Philippe', 'Secrétaire', 'test@test.fr', 'forumtest@test.fr', '01.34.05.80.90', 4),
(7, 'F', 'COLLAS', 'Collas', 'CPE', 'colcollas@moissan.fr', 'collas@moissan.fr', '01.74.25.15.87', 7),
(8, 'F', 'VO', 'Christelle', 'Directrice', 'test2@test.fr', 'forumtest2@test.fr', '01.35.43.23.88', 8),
(9, 'F', 'COLLAS', 'Collas', 'CPE', 'colcollas@moissan.fr', 'collas@moissan.fr', '01.74.25.15.87', 9),
(10, 'M', 'FRANTZ', 'Charles-Philippe', 'Secrétaire', 'test@test.fr', 'forumtest@test.fr', '01.34.05.80.90', 10),
(11, 'F', 'VO', 'Christelle', 'Directrice', 'test2@test.fr', 'forumtest2@test.fr', '01.35.43.23.88', 11),
(12, 'F', 'COLLAS', 'Collas', 'CPE', 'colcollas@moissan.fr', 'collas@moissan.fr', '01.74.25.15.87', 12),
(13, 'M', 'FRANTZ', 'Charles-Philippe', 'Secrétaire', 'test@test.fr', 'forumtest@test.fr', '01.34.05.80.90', 13),
(14, 'F', 'VO', 'Christelle', 'Directrice', 'test2@test.fr', 'forumtest2@test.fr', '01.35.43.23.88', 14),
(15, 'F', 'COLLAS', 'Collas', 'CPE', 'colcollas@moissan.fr', 'collas@moissan.fr', '01.74.25.15.87', 15),
(16, 'M', 'FRANTZ', 'Charles-Philippe', 'Secrétaire', 'test@test.fr', 'forumtest@test.fr', '01.34.05.80.90', 16),
(17, 'F', 'VO', 'Christelle', 'Directrice', 'test2@test.fr', 'forumtest2@test.fr', '01.35.43.23.88', 17),
(18, 'F', 'COLLAS', 'Collas', 'CPE', 'colcollas@moissan.fr', 'collas@moissan.fr', '01.74.25.15.87', 18),
(19, 'M', 'FRANTZ', 'Charles-Philippe', 'Secrétaire', 'test@test.fr', 'forumtest@test.fr', '01.34.05.80.90', 19),
(20, 'F', 'VO', 'Christelle', 'Directrice', 'test2@test.fr', 'forumtest2@test.fr', '01.35.43.23.88', 31),
(21, 'F', 'COLLAS', 'Collas', 'CPE', 'colcollas@moissan.fr', 'collas@moissan.fr', '01.74.25.15.87', 21),
(22, 'M', 'KOUROUMA', 'Aboubacar', 'Directeur', 'aboubacar@gmail.com', 'aboubacar-forum@gmail.com', '01.25.05.85.14', 2),
(23, 'F', 'LSE', 'Chirs', 'Directrice', 'chris@gmail.com', 'chris-forum@laposte.net', '01.34.58.99.77', 3);

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Lycee` int(11) NOT NULL,
  `DateForum` varchar(50) NOT NULL,
  `Heure_Debut` varchar(50) NOT NULL,
  `Heure_Fin` varchar(50) NOT NULL,
  `Courrier` varchar(50) NOT NULL,
  `Public` varchar(50) NOT NULL,
  `Annee_du_dernier_forum` int(11) NOT NULL,
  `Type_de_prospection` varchar(50) NOT NULL,
  `Participant1` int(11) NOT NULL DEFAULT '0',
  `Participant2` int(11) NOT NULL DEFAULT '0',
  `CompteRendu` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Lycee` (`Lycee`),
  KEY `Participant1` (`Participant1`),
  KEY `Participant2` (`Participant2`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`Id`, `Lycee`, `DateForum`, `Heure_Debut`, `Heure_Fin`, `Courrier`, `Public`, `Annee_du_dernier_forum`, `Type_de_prospection`, `Participant1`, `Participant2`, `CompteRendu`) VALUES
(1, 4, '2020/02/23', '16h', '23h', 'testcourrier@forum.com', 'tout public', 2019, 'Forum', 4, 3, NULL),
(2, 2, '2019/01/10', '09h', '10h', 'courriertest1@gmail.com', 'ceci n\'est pas tout public', 2017, 'Conférence', 4, 3, 'test2compterendu'),
(3, 1, '2017/09/01', '10h', '22h', 'courriertest2', 'ceci n\'est pas tout public', 2015, 'Forum', 3, 4, 'CSKODSOKDKSOKDSO'),
(4, 6, '2012/01/12', '13h', '18h', '1', '1', 2010, 'Conférence', 3, 4, '1'),
(5, 5, '2012/01/20', '8h30', '12h', '1', '1', 2011, 'Conférence', 4, 0, '1'),
(6, 3, '2012/02/17', '14h', '16h', 'testcourrier', 'toutpublic', 2010, 'Forum', 0, 0, NULL),
(7, 7, '2012/03/03', '9h', '12h', 'testcourrier', 'toutpublic', 2008, 'Salon', 4, 0, NULL),
(8, 8, '2012/03/15', '8h', '12h', 'testcourrier', 'toutpublic', 2009, 'Forum', 0, 0, NULL),
(9, 10, '2012/03/16', '14h', '18h', 'testcourrier', 'toutpublic', 2003, 'Conférence', 3, 0, 'testcompterendu'),
(10, 9, '2010/11/23', '13h', '18h', 'testcourrier', 'toutpublic', 2005, 'Salon', 0, 0, NULL),
(11, 11, '2020/09/09', '16h', '23h', 'testcourrier', 'toutpublic', 2019, 'Salon', 3, 0, NULL),
(46, 31, '2020/12/19', '13h', '13h30', 'courrier@forum.com', 'tout public', 2018, 'Salon', 0, 0, NULL),
(47, 12, '2019/12/19', '13h', '13h30', 'courrier@forum.com', 'tout public', 2018, 'Salon', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `lycee`
--

DROP TABLE IF EXISTS `lycee`;
CREATE TABLE IF NOT EXISTS `lycee` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Code_Postal` varchar(5) NOT NULL,
  `Departement` varchar(2) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `Proche_de` varchar(50) NOT NULL,
  `Standard` varchar(50) NOT NULL,
  `Fax` varchar(50) NOT NULL,
  `Mail_Lycee` varchar(50) NOT NULL,
  `AdressePostale` varchar(100) NOT NULL,
  `Commentaire1` varchar(1000) DEFAULT NULL,
  `Commentaire2` varchar(1000) DEFAULT NULL,
  `Commentaire3` varchar(1000) DEFAULT NULL,
  `Commentaire4` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lycee`
--

INSERT INTO `lycee` (`Id`, `Type`, `Nom`, `Code_Postal`, `Departement`, `Ville`, `Proche_de`, `Standard`, `Fax`, `Mail_Lycee`, `AdressePostale`, `Commentaire1`, `Commentaire2`, `Commentaire3`, `Commentaire4`) VALUES
(1, 'Lycée', 'Camille Claudel', '95490', '95', 'Vauréal', 'Cergy', 'testStandard1', '01.23.65.45.89.75', 'camilleclaudel@gmail.com', '4 Avenue Federico Garcia Lorca', 'sdjsijdi', '1ceci est commentaire 2éééà', '1ceci est commentaire 3éééà', '1ceci est commentaire 4éééà'),
(2, 'Lycée', 'CPP', '95600', '95', 'L\'eau est bonne ', 'Cergy', 'testStandard2', 'fax2', 'cppeaubonne@hotmail.com', '18 RUE DU TONNELIERRRRRRR', '2ceci est commentaire 1éééà', '2ceci est commentaire 2éééà', '2ceci est commentaire 3éééà', '2ceci est commentaire 4éééà'),
(3, 'IUT', 'NomIUT', '87590', '87', 'Villeville', 'Proche de nulle part', 'testStandard3', '02.01.98.77.23', 'iutdevilleville@gmail.com', '20 RUE DU TONNELIER', '3ceci est commentaire 1éééà', '3ceci est commentaire 2éééà', '3ceci est commentaire 3éééà', '3ceci est commentaire 4éééà'),
(4, 'IUT', 'IUTmonVillage', '95201', '95', 'Villagevillage', 'Proche de nulle part', 'testStandard4', '03.05.88.56.33', 'villagepaume@msn.com', '55 RUE DU TONNELIER', '4ceci est commentaire 1éééà', '4ceci est commentaire 2éééà', '4ceci est commentaire 3éééà', '4ceci est commentaire 4éééà'),
(5, 'Lycée', 'Henri-IV', '75005', '75', 'Paris', 'Paris', '1', '1', '1', '23 Rue Clovis', '1', '1', '1', '1'),
(6, 'Lycée', 'Henri Moissan', '77100', '77', 'Meaux', 'Melun', '1', '1', 'henriestbonne@hotmail.com', '20 Cours de Verdun', '1', '1', '1', '1'),
(7, 'Lycée', 'Camille Pissarro', '95300', '95', 'Pontoise', 'Cergy', 'teststandard1', '01.23.43.54.44', 'maillycee', '1 Rue Henri Matisse', 'comm1', 'comm2', 'comm3', 'comm4\r\n'),
(8, 'Lycée', 'Alfred Kastler', '95000', '95', 'Cergy', 'Cergy', 'teststandard1', '01.23.43.54.44', 'maillycee', '26 Avenue de la Palette', 'comm1', 'comm2', 'comm3', 'comm4\r\n'),
(9, 'Lycée', 'Notre-Dame de la Compassion', '95300', '95', 'Pontoise', 'Cergy', 'teststandard1', '01.23.43.54.44', 'maillycee', '8 Place Nicolas Flamel', 'comm1', 'comm2', 'comm3', 'comm4\r\n'),
(10, 'Lycée', 'Camille Clausssdel', '95490', '95', 'Vauréal', 'Cergy', 'teststandard1', '01.23.43.54.44', 'maillycee', '18 RUE DU TONNELIER', 'comm1', 'comm2', 'comm3', 'comm4'),
(11, 'Lycée', 'Camille Classsudel', '95490', '95', 'Vauréal', 'Cergy', 'teststandard1', '01.23.43.54.44', 'maillycee', '66 RUE DU TONNELIER', 'comm1', 'comm2', 'comm3', 'comm4\r\n'),
(12, 'Lycée', 'Camille Clsssaudel', '09487', '09', 'Pauille', 'Pau', 'teststandard1', '01.23.43.54.44', 'maillycee', '18 AVENUE DU TONNELIER', 'comm1', 'comm2', 'comm3', 'comm4\r\n'),
(13, 'Lycée', 'Camille Csssssslaudel', '95490', '95', 'Vauréal', 'Cergy', 'teststandard1', '01.23.43.54.44', 'maillycee', '2718 RUE DU TONNELIER', 'comm1', 'comm2', 'comm3', 'comm4\r\n'),
(31, 'IUT', 'IUT Pau', '09487', '09', 'Pauille', 'Pau', '01.34.64.77.44', '09.33.45.66.77', 'iutpau@pauille.com', '13 RUE DE PAU ', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Lycee` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Privileges` varchar(100) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Campus` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Lycee` (`Lycee`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `Lycee`, `Username`, `Prenom`, `Nom`, `Email`, `Privileges`, `Image`, `Campus`) VALUES
(1, 12, 'frantzchar', 'Charles-Philippe', 'Frantz', 'frantzchar@eisti.eu', 'Student', 'Pictures/imagesTest/calopsittes.jpg', 'Pau'),
(2, 0, 'vohoangmai', 'Christelle', 'Vo', 'vohoangmai@eisti.eu', 'Admin', 'Pictures/imagesTest/arableu.jpg', 'Cergy'),
(3, 6, 'test1', 'testPrénom', 'testNom', 'testmail@eisti.eu', 'Student', 'Pictures/imagesTest/oiseaux.jpg', 'Cergy'),
(4, 6, 'moreladrie', 'Adrien', 'Morel', 'moreladrie@eisti.eu', 'Student', 'Pictures/imagesTest/inseparables.jpg', 'Cergy');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
