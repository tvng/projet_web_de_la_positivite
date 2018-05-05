-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 05 mai 2018 à 13:17
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
(10);

-- --------------------------------------------------------

--
-- Structure de la table `apply_to`
--

DROP TABLE IF EXISTS `apply_to`;
CREATE TABLE IF NOT EXISTS `apply_to` (
  `ID_user` int(11) NOT NULL,
  `ID_job` int(11) NOT NULL,
  UNIQUE KEY `ID_user` (`ID_user`,`ID_job`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `apply_to`
--

INSERT INTO `apply_to` (`ID_user`, `ID_job`) VALUES
(10, 1),
(10, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 3),
(15, 3),
(16, 3);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `ID_comment` int(50) NOT NULL AUTO_INCREMENT,
  `ID_author` int(50) NOT NULL,
  `ID_post` int(50) NOT NULL,
  `comment_date` date NOT NULL,
  `comment_time` time NOT NULL,
  `comment_text` text NOT NULL,
  KEY `ID_comment` (`ID_comment`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`ID_comment`, `ID_author`, `ID_post`, `comment_date`, `comment_time`, `comment_text`) VALUES
(1, 9, 1, '2018-05-31', '06:00:00', 'SORRY POUR TOI!'),
(2, 10, 11, '2018-05-30', '00:31:00', 'Coucou admin!'),
(3, 10, 5, '2018-05-05', '01:15:52', 'put your hands up');

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
(1, 2),
(14, 14),
(14, 11),
(13, 14),
(11, 13),
(10, 9),
(14, 9),
(15, 11);

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `ID_event` int(11) NOT NULL AUTO_INCREMENT,
  `author` int(11) NOT NULL,
  `date_post` date NOT NULL,
  `time_post` time NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(50) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`ID_event`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`ID_event`, `author`, `date_post`, `time_post`, `date`, `time`, `location`, `text`) VALUES
(1, 9, '2018-04-11', '06:10:23', '2018-04-19', '13:00:00', 'Ma maison toi même tu sais', 'Enorme before à 13h avant le solstice de rien du tout'),
(2, 14, '2018-05-04', '02:52:43', '2018-05-05', '14:00:00', 'P429', 'On va kiffer comme jamais'),
(3, 16, '2018-05-05', '10:00:41', '2018-06-09', '09:00:00', 'Paris 13ème ', 'Venez nombreux à la CDMGE!');

-- --------------------------------------------------------

--
-- Structure de la table `invitation`
--

DROP TABLE IF EXISTS `invitation`;
CREATE TABLE IF NOT EXISTS `invitation` (
  `ID_user1` int(11) NOT NULL,
  `status1` tinyint(1) NOT NULL,
  `text` text NOT NULL,
  `ID_user2` int(11) NOT NULL,
  `status2` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `invitation`
--

INSERT INTO `invitation` (`ID_user1`, `status1`, `text`, `ID_user2`, `status2`) VALUES
(10, 1, 'salut', 9, 0),
(10, 1, '', 15, 0),
(10, 1, '', 9, 0),
(10, 1, '', 15, 0);

-- --------------------------------------------------------

--
-- Structure de la table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `ID_job` int(11) NOT NULL AUTO_INCREMENT,
  `author` int(11) NOT NULL,
  `date_post` date NOT NULL,
  `time_post` time NOT NULL,
  `company` varchar(50) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`ID_job`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `job`
--

INSERT INTO `job` (`ID_job`, `author`, `date_post`, `time_post`, `company`, `text`) VALUES
(1, 9, '2018-04-11', '11:12:27', 'Dior', 'On cherche un expert en débouchage de bouteilles d\'alcool pour nos soirées arrosées'),
(2, 10, '2018-05-17', '10:09:17', 'Piscine de Paris', 'Nous aimerions engager un maître nageur ayant une expérience avec les gens bourrés en soirée'),
(3, 14, '2018-05-04', '03:52:40', 'La confrérie du yaourt', 'En recherche de gouteurs de yaourts aux gouts originaux'),
(5, 16, '2018-05-05', '10:06:03', 'Riot Games', 'Nous recherchons des développeurs en graphisme pour notre site web ');

-- --------------------------------------------------------

--
-- Structure de la table `like_post`
--

DROP TABLE IF EXISTS `like_post`;
CREATE TABLE IF NOT EXISTS `like_post` (
  `ID_liker` int(15) NOT NULL,
  `ID_liked` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `like_post`
--

INSERT INTO `like_post` (`ID_liker`, `ID_liked`) VALUES
(9, 1),
(9, 2),
(13, 2),
(15, 2),
(10, 2),
(10, 4),
(11, 2),
(13, 15);

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
(1, 1),
(14, 1),
(14, 1);

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
  `visibility` varchar(20) NOT NULL DEFAULT 'Everyone',
  `location` varchar(50) DEFAULT NULL,
  `emotion` varchar(20) DEFAULT NULL,
  `text` text NOT NULL,
  `ID_media` int(11) DEFAULT NULL,
  `media_link` varchar(500) DEFAULT NULL,
  `nb_like` int(11) DEFAULT '0',
  PRIMARY KEY (`ID_post`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`ID_author`, `ID_post`, `date`, `time`, `visibility`, `location`, `emotion`, `text`, `ID_media`, `media_link`, `nb_like`) VALUES
(10, 1, '2018-05-01', '02:18:32', 'Everyone', 'Paris', 'Sad', 'Si seulement on m\'avait pas spoil Infinity war', 1, NULL, 0),
(10, 2, '2018-05-09', '02:31:00', 'Everyone', NULL, NULL, 'Wouah', NULL, NULL, 0),
(9, 3, '2018-04-17', '09:00:00', 'Friends only', NULL, NULL, 'Salut, batman meurt !!', NULL, NULL, 0),
(10, 4, '2018-05-17', '14:00:00', 'Myself only', 'Emoland', 'Sad', 'only me', NULL, NULL, 0),
(9, 5, '2018-04-27', '09:00:00', 'Everyone', NULL, NULL, 'everyone', NULL, NULL, 0),
(10, 10, '2018-05-03', '05:48:06', 'Myself only', '4Chan?', 'happy', 'Kawaii', NULL, '10_uploads/fire_emblem_if___aqua_fanmade_dark_coloration_by_melodycrystel-d8t3tjv.png', 0),
(12, 11, '2018-05-04', '10:33:41', 'Everyone', 'Paris', 'happy', 'On croise les doigts', NULL, '12_uploads/Choix de vie douteux.PNG', 0),
(12, 13, '2018-05-04', '01:28:09', 'Friends only', 'Jonkoping', 'happy', 'On senjaille', NULL, 'user12/posts/21175206_1660329130707521_1625748609_n.jpg', 0),
(13, 15, '2018-05-05', '10:20:23', 'Friends only', 'Où le vent me porte', 'sad', 'Mon travail, une joie sans limite', NULL, 'user13/posts/Lemeilleur.jpg', 0),
(17, 16, '2018-05-05', '01:01:06', 'Friends only', '', 'happy', 'Mon fils est faché', NULL, 'user17/posts/gavin fache.jpg', 0);

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
  `profile_pic` varchar(500) DEFAULT '../resources/pp_base.png',
  `header_pic` varchar(500) DEFAULT '../resources/header_base.png',
  `CV_link` varchar(500) DEFAULT NULL,
  `creation_date` date NOT NULL,
  KEY `ID_user` (`ID_user`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID_user`, `name`, `first_name`, `email`, `password`, `type`, `pseudo`, `profile_pic`, `header_pic`, `CV_link`, `creation_date`) VALUES
(10, 'ouioui', 'non', 'oui@gmail.com', '$2y$10$bR8ZdFxuRH0FfaP1FS6ADu3YosX6x5Nmsmyh1x8Y0XeG9vzCNlZqm', 'student', 'OUI', '../resources/pp_base.png', '../resources/header_base.png', NULL, '2018-05-02'),
(9, 'ange', 'gavriel', 'faker@edu.ece.fr', '$2y$10$ArlVCOLCb3Jtepo1zf8maeUjO0iMJNbQbc5lpCeXFFFK.0bIeTibm', 'student', 'lucifer', 'user9/profile/ballcart.jpg', 'user9/profile/stock.png', 'user9/profile/2017-2018-Projet-Java-ING3-Hopital.pdf', '2018-05-01'),
(11, 'Vercly', 'Henri', 'henriverclytte@gmail.com', '$2y$10$/Vx.MRm0TIxGHHzvbAll8eZjT6nyuy4SYlVJ4NMzL.HoNJ6MKgbs6', 'student', 'LeMeilleur', '../resources/pp_base.png', '../resources/header_base.png', NULL, '2018-05-04'),
(12, 'Hallinight', 'Jon', 'jh@yahoo.fr', '$2y$10$.dj8kp3C5IGYRjVIxW2dSeIWXRXW/Js8ByH9tsfFL5WfG.zFbvy0W', 'professor', 'Allumeur', 'user12/profile/Anna_FE13_Artwork.png', 'user12/profile/Résultats TOEIC Avril 2018 H VERCLYTTE001.jpg', NULL, '2018-05-04'),
(13, 'Remy', 'Remi', 'remi@gmail.com', '$2y$10$KSax8WXXVRU5dIz1PF60veeOFHTABdGVEmx61h7/UkpimnXf7bFEO', 'student', 'Remhi', '../resources/pp_base.png', '../resources/header_base.png', NULL, '2018-05-04'),
(14, 'Bolloré', 'Vincent', 'VB@edu.ece.fr', '$2y$10$cyUukr1Po7PVDDGMq/vmjOUT8ajbrc/EiAppflbxSjGys2mdj2cam', 'professor', 'CanalMoins', '../resources/pp_base.png', '../resources/header_base.png', 'user14/profile/Henri Verclytte CV.pdf', '2018-05-04'),
(15, 'Doe', 'John', 'JD@laposte.net', '$2y$10$gtD1JIjqIVigEOwPnQKDn.p9SCz3zCUtCHLHtHS6IDlQVCl9qo9hy', 'student', 'JohnDoe', '../resources/pp_base.png', '../resources/header_base.png', NULL, '2018-05-04'),
(16, 'Crapaud', 'Jean Michel', 'Jeanmiche@gmail.com', '$2y$10$kh2JfAoFmT1HurycQjNITOGvddGRDXUhrbB6JvDEYg9cBfTqe3uLm', 'student', 'Pablito', 'user16/profile/CarapateurPortrait.png', 'user16/profile/riot-games.jpg', 'user16/profile/Emploi du temps de VERCLYTTE Henri 07 05.pdf', '2018-05-05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
