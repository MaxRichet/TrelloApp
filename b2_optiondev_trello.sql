-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 01 mai 2023 à 20:49
-- Version du serveur : 5.7.36
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `b2_optiondev_trello`
--

-- --------------------------------------------------------

--
-- Structure de la table `boards`
--

DROP TABLE IF EXISTS `boards`;
CREATE TABLE IF NOT EXISTS `boards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `boards`
--

INSERT INTO `boards` (`id`, `owner`, `name`, `created`, `modified`) VALUES
(1, 1, 'projet fil rouge', '2023-04-05 12:46:30', '2023-04-05 12:46:30'),
(2, 5, 'bulubulu', '2023-04-05 12:56:43', '2023-04-05 12:56:43'),
(3, 5, 'balabala', '2023-04-05 12:58:14', '2023-04-05 12:58:14'),
(4, 5, 'bolobolo', '2023-04-05 12:58:22', '2023-04-05 12:58:22'),
(5, 4, 'eeeeeeeeeee', '2023-04-05 12:58:47', '2023-04-05 12:58:47'),
(6, 4, 'fffffffffff', '2023-04-05 12:58:52', '2023-04-05 12:58:52'),
(7, 4, 'hhhhhhhhhhhh', '2023-04-05 12:58:56', '2023-04-05 12:58:56'),
(8, 1, 'Projet trello like', '2023-04-05 12:59:21', '2023-04-05 12:59:21'),
(9, 1, 'recherche stage', '2023-04-05 12:59:28', '2023-04-05 12:59:28'),
(10, 1, 'recherche stage', '2023-04-05 13:22:04', '2023-04-05 13:22:04'),
(12, 1, 'recherche stage', '2023-04-05 13:23:48', '2023-04-05 13:23:48'),
(13, 1, 'bob', '2023-05-01 13:42:12', '2023-05-01 13:42:12');

-- --------------------------------------------------------

--
-- Structure de la table `cards`
--

DROP TABLE IF EXISTS `cards`;
CREATE TABLE IF NOT EXISTS `cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` text,
  `creator` int(11) NOT NULL,
  `assignee` int(11) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cards`
--

INSERT INTO `cards` (`id`, `title`, `description`, `creator`, `assignee`, `deadline`, `category_id`, `created`, `modified`) VALUES
(3, 'webdesign', 'Faire la maquette', 1, NULL, '2023-04-30', 1, '2023-04-11 14:23:48', '2023-04-11 14:36:15'),
(4, 'Développement du site', 'Commencer les premiers éléments react', 1, NULL, '2023-05-27', 1, '2023-04-11 14:24:27', '2023-04-11 14:24:27'),
(5, 'test', 'testtesttest', 1, NULL, '2023-04-28', 3, '2023-04-11 14:36:52', '2023-04-11 14:36:52'),
(6, 'testcard', 'bonjour', 1, NULL, '2023-05-11', 1, '2023-05-01 14:05:18', '2023-05-01 14:05:18');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `board_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `board_id`, `name`, `color`, `created`, `modified`) VALUES
(1, 1, 'En cours', '#ff00f7', '2023-04-11 07:18:35', '2023-04-11 14:23:28'),
(2, 10, 'orange', '#ff7b00', '2023-04-11 07:19:12', '2023-04-11 07:19:12'),
(3, 1, 'recherche stage', '#00ff40', '2023-04-11 08:14:43', '2023-04-11 08:14:43');

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `board_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20230329100212, 'CreateUsers', '2023-03-29 08:16:22', '2023-03-29 08:16:22', 0),
(20230329100637, 'CreateBoards', '2023-03-29 08:16:22', '2023-03-29 08:16:22', 0),
(20230329100737, 'CreateCategories', '2023-03-29 08:16:22', '2023-03-29 08:16:22', 0),
(20230329101050, 'CreateCards', '2023-03-29 08:16:22', '2023-03-29 08:16:22', 0),
(20230329101134, 'CreateLogs', '2023-03-29 08:16:22', '2023-03-29 08:16:22', 0),
(20230329101207, 'CreateUsersBoards', '2023-03-29 08:16:22', '2023-03-29 08:16:22', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(70) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `created`, `modified`) VALUES
(1, 'Max', 'Richet', 'maxrichet78@gmail.com', '$2y$10$iRqoZ9DyDBLL6KzqU5Y9b.EHTStSKnUCU9Wq3PO.5uS0ntvrFanHa', '2023-03-29 14:59:14', '2023-03-29 14:59:14'),
(4, 'William', 'Richet', 'williamrichet78@gmail.com', '$2y$10$Blac5Fh5cVNGAKI12QGw5OXQaSy8a.IbK10X86VAC3cfAjYsNG7me', '2023-04-05 12:55:49', '2023-04-05 12:55:49'),
(5, 'Maud', 'Richet', 'maudrichet78@gmail.com', '$2y$10$1PshSuVIckIjxosOgUYw1eTQ8xnPZ.pOyepHXbrzRmfT4rCzhoTBy', '2023-04-05 12:56:08', '2023-04-05 12:56:08');

-- --------------------------------------------------------

--
-- Structure de la table `users_boards`
--

DROP TABLE IF EXISTS `users_boards`;
CREATE TABLE IF NOT EXISTS `users_boards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `board_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
