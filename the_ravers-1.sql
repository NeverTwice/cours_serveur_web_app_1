-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 08 Avril 2015 à 13:31
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `the_ravers`
--

-- --------------------------------------------------------

--
-- Structure de la table `forum_bbs`
--

CREATE TABLE IF NOT EXISTS `forum_bbs` (
  `forum_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` mediumint(5) NOT NULL,
  `forum_name` varchar(100) NOT NULL,
  `forum_description` text NOT NULL,
  `forum_order` mediumint(8) NOT NULL,
  `forum_last_post_id` mediumint(8) NOT NULL,
  `user_post` tinyint(8) NOT NULL,
  `user_annonce` tinyint(8) NOT NULL,
  `user_topic` tinyint(8) NOT NULL,
  `user_view` tinyint(8) NOT NULL,
  PRIMARY KEY (`forum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `forum_cat`
--

CREATE TABLE IF NOT EXISTS `forum_cat` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `name_cat` varchar(150) NOT NULL,
  `ordre_cat` char(3) NOT NULL,
  `visible` char(1) NOT NULL,
  PRIMARY KEY (`id_cat`),
  UNIQUE KEY `ordre_cat` (`ordre_cat`),
  UNIQUE KEY `ordre_cat_2` (`ordre_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `forum_posts`
--

CREATE TABLE IF NOT EXISTS `forum_posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_creator` int(11) NOT NULL,
  `post_text` text NOT NULL,
  `post_time` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `forum_topic`
--

CREATE TABLE IF NOT EXISTS `forum_topic` (
  `id_topic` int(11) NOT NULL AUTO_INCREMENT,
  `id_forum` int(11) NOT NULL,
  `topic_title` char(100) NOT NULL,
  `topic_creator` int(11) NOT NULL,
  `topic_seen` mediumint(8) NOT NULL,
  `topic_gender` varchar(30) NOT NULL,
  `topic_time` int(11) NOT NULL,
  `topic_last_post` int(11) NOT NULL,
  `topic_first_post` int(11) NOT NULL,
  `topic_post` mediumint(8) NOT NULL,
  PRIMARY KEY (`id_topic`),
  UNIQUE KEY `topic_post` (`topic_post`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `utilisateurs_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `genre` char(1) NOT NULL,
  `city` varchar(10) NOT NULL,
  `commentary` text NOT NULL,
  `avatar` varchar(40) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL,
  PRIMARY KEY (`utilisateurs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`utilisateurs_id`, `nom`, `prenom`, `email`, `mdp`, `genre`, `city`, `commentary`, `avatar`, `creation_date`, `update_date`) VALUES
(6, 'pfojej', 'kefjpzj', 'def@hotmail.fr', '616aa8334176d14b52bcef722a8f2fd7', '', '', '', '', '2015-03-20 19:07:08', '0000-00-00 00:00:00'),
(7, 'opkg', 'pokg', 'lucasj-77@hotmail.fr', '616aa8334176d14b52bcef722a8f2fd7', '', '', '', '', '2015-04-02 09:04:31', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
