-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 02 mai 2018 à 12:44
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `eceperanto`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID_user` int(11) NOT NULL,
  PRIMARY KEY (`ID_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`ID_user`) VALUES
(12);

-- --------------------------------------------------------

--
-- Structure de la table `apply_to`
--

DROP TABLE IF EXISTS `apply_to`;
CREATE TABLE IF NOT EXISTS `apply_to` (
  `ID_user` int(11) NOT NULL,
  `ID_job` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `ID_comment` int(11) NOT NULL AUTO_INCREMENT,
  `ID_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`ID_comment`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `connect_with`
--

DROP TABLE IF EXISTS `connect_with`;
CREATE TABLE IF NOT EXISTS `connect_with` (
  `ID_user1` int(11) NOT NULL,
  `ID_user2` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connect_with`
--

INSERT INTO `connect_with` (`ID_user1`, `ID_user2`) VALUES
(10, 9);

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `ID_event` int(11) NOT NULL AUTO_INCREMENT,
  `ID_user` int(11) NOT NULL,
  `date_post` date NOT NULL,
  `time_post` time NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(50) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`ID_event`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`ID_event`, `ID_user`, `date_post`, `time_post`, `date`, `time`, `location`, `text`) VALUES
(1, 1, '2018-04-11', '06:10:23', '2018-04-19', '13:00:00', 'Ma maison toi même tu sais', 'Enorme before à 13h avant le solstice de rien du tout');

-- --------------------------------------------------------

--
-- Structure de la table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `ID_job` int(11) NOT NULL AUTO_INCREMENT,
  `ID_user` int(11) NOT NULL,
  `date_post` date NOT NULL,
  `time_post` time NOT NULL,
  `company` varchar(50) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`ID_job`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `job`
--

INSERT INTO `job` (`ID_job`, `ID_user`, `date_post`, `time_post`, `company`, `text`) VALUES
(1, 9, '2018-04-11', '11:12:27', 'Dior', 'On cherche un expert en débouchage de bouteilles d\'alcool pour nos soirées arrosées');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `ID_media` int(11) NOT NULL AUTO_INCREMENT,
  `ID_post` int(11) NOT NULL,
  `media_link` varchar(50) NOT NULL,
  KEY `ID_media` (`ID_media`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `participate`
--

DROP TABLE IF EXISTS `participate`;
CREATE TABLE IF NOT EXISTS `participate` (
  `ID_user` int(11) NOT NULL,
  `ID_event` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `participate`
--

INSERT INTO `participate` (`ID_user`, `ID_event`) VALUES
(10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `post_comment`
--

DROP TABLE IF EXISTS `post_comment`;
CREATE TABLE IF NOT EXISTS `post_comment` (
  `ID_post` int(11) NOT NULL,
  `ID_comment` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE IF NOT EXISTS `publication` (
  `ID_author` int(11) NOT NULL,
  `ID_post` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `visibility` varchar(20) NOT NULL,
  `location` varchar(50) DEFAULT NULL,
  `emotion` varchar(20) DEFAULT NULL,
  `text` text NOT NULL,
  `ID_media` int(11) DEFAULT NULL,
  `nb_like` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_post`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`ID_author`, `ID_post`, `date`, `time`, `visibility`, `location`, `emotion`, `text`, `ID_media`, `nb_like`) VALUES
(10, 1, '2018-05-01', '02:18:32', 'Everyone', 'Paris', 'Sad', 'Si seulement on m\'avait pas spoil Infinity war', 1, 0),
(10, 2, '2018-05-09', '02:31:00', 'Everyone', NULL, NULL, 'Wouah', NULL, NULL),
(9, 3, '2018-04-17', '09:00:00', 'Friends', NULL, NULL, 'Salut, batman meurt !!', NULL, NULL),
(10, 4, '2018-05-17', '14:00:00', 'Myself', 'Emoland', 'Sad', 'only me', NULL, NULL),
(9, 5, '2018-04-27', '09:00:00', 'Everyone', NULL, NULL, 'everyone', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `shared_post`
--

DROP TABLE IF EXISTS `shared_post`;
CREATE TABLE IF NOT EXISTS `shared_post` (
  `ID_user` int(11) NOT NULL,
  `ID_post` int(11) NOT NULL,
  UNIQUE KEY `ID_post` (`ID_post`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `profile_pic` varchar(50) DEFAULT '../resources/pp_base.png',
  `header_pic` varchar(50) DEFAULT '../resources/header_base.png',
  `creation_date` date NOT NULL,
  KEY `ID_user` (`ID_user`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID_user`, `name`, `first_name`, `email`, `password`, `type`, `pseudo`, `profile_pic`, `header_pic`, `creation_date`) VALUES
(10, 'ouioui', 'non', 'oui@gmail.com', '$2y$10$bR8ZdFxuRH0FfaP1FS6ADu3YosX6x5Nmsmyh1x8Y0XeG9vzCNlZqm', 'student', 'OUI', '../resources/pp_base.png', '../resources/header_base.png', '2018-05-02'),
(9, 'ange', 'gavriel', 'faker@edu.ece.fr', '$2y$10$ArlVCOLCb3Jtepo1zf8maeUjO0iMJNbQbc5lpCeXFFFK.0bIeTibm', 'student', 'lucifer', '../resources/pp_base.png', '../resources/header_base.png', '2018-05-01'),
(12, 'admin', 'admin', 'admin@gmail.com', '$2y$10$/Tx9Ba4jhiPuzN0tlKdSvO28tkmnbgN6WRVuDoan3ZpcgS0CRn.B.', 'student', 'admin', '../resources/pp_base.png', '../resources/header_base.png', '2018-05-02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
