-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 02 Mai 2018 à 07:59
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `admin` (
  `ID_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `apply_to`
--

CREATE TABLE `apply_to` (
  `ID_user` int(11) NOT NULL,
  `ID_job` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `ID_comment` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `connect_with`
--

CREATE TABLE `connect_with` (
  `ID_user1` int(11) NOT NULL,
  `ID_user2` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `connect_with`
--

INSERT INTO `connect_with` (`ID_user1`, `ID_user2`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `ID_event` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `date_post` date NOT NULL,
  `time_post` time NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(50) NOT NULL,
  `text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`ID_event`, `ID_user`, `date_post`, `time_post`, `date`, `time`, `location`, `text`) VALUES
(1, 1, '2018-04-11', '06:10:23', '2018-04-19', '13:00:00', 'Ma maison toi même tu sais', 'Enorme before à 13h avant le solstice de rien du tout');

-- --------------------------------------------------------

--
-- Structure de la table `job`
--

CREATE TABLE `job` (
  `ID_job` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `date_post` date NOT NULL,
  `time_post` time NOT NULL,
  `company` varchar(50) NOT NULL,
  `text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `job`
--

INSERT INTO `job` (`ID_job`, `ID_user`, `date_post`, `time_post`, `company`, `text`) VALUES
(1, 2, '2018-04-11', '11:12:27', 'Dior', 'On cherche un expert en débouchage de bouteilles d\'alcool pour nos soirées arrosées');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `ID_media` int(11) NOT NULL,
  `ID_post` int(11) NOT NULL,
  `media_link` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `participate`
--

CREATE TABLE `participate` (
  `ID_user` int(11) NOT NULL,
  `ID_event` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `participate`
--

INSERT INTO `participate` (`ID_user`, `ID_event`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `post_comment`
--

CREATE TABLE `post_comment` (
  `ID_post` int(11) NOT NULL,
  `ID_comment` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `ID_author` int(11) NOT NULL,
  `ID_post` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `visibility` varchar(20) NOT NULL,
  `location` varchar(50) DEFAULT NULL,
  `emotion` varchar(20) DEFAULT NULL,
  `text` text NOT NULL,
  `ID_media` int(11) DEFAULT NULL,
  `nb_like` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `publication`
--

INSERT INTO `publication` (`ID_author`, `ID_post`, `date`, `time`, `visibility`, `location`, `emotion`, `text`, `ID_media`, `nb_like`) VALUES
(10, 1, '2018-05-01', '02:18:32', 'Everyone', 'Paris', 'Sad', 'Si seulement on m\'avait pas spoil Infinity war', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `shared_post`
--

CREATE TABLE `shared_post` (
  `ID_user` int(11) NOT NULL,
  `ID_post` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID_user` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `profile_pic` varchar(50) DEFAULT NULL,
  `header_pic` varchar(50) DEFAULT NULL,
  `creation_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`ID_user`, `name`, `first_name`, `email`, `password`, `type`, `pseudo`, `profile_pic`, `header_pic`, `creation_date`) VALUES
(10, 'ouioui', 'non', 'oui@gmail.com', '$2y$10$bR8ZdFxuRH0FfaP1FS6ADu3YosX6x5Nmsmyh1x8Y0XeG9vzCNlZqm', 'student', 'OUI', '', '', '2018-05-02'),
(9, 'ange', 'gavriel', 'faker@edu.ece.fr', '$2y$10$ArlVCOLCb3Jtepo1zf8maeUjO0iMJNbQbc5lpCeXFFFK.0bIeTibm', 'student', 'lucifer', '', '', '2018-05-01');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_user`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID_comment`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`ID_event`);

--
-- Index pour la table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`ID_job`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD KEY `ID_media` (`ID_media`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`ID_post`);

--
-- Index pour la table `shared_post`
--
ALTER TABLE `shared_post`
  ADD UNIQUE KEY `ID_post` (`ID_post`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD KEY `ID_user` (`ID_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `ID_comment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `ID_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `job`
--
ALTER TABLE `job`
  MODIFY `ID_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `ID_media` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `ID_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
