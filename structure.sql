-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 10 Décembre 2016 à 02:30
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ced`
--

-- --------------------------------------------------------

--
-- Structure de la table `screen`
--

CREATE TABLE `screen` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `model` tinytext COLLATE utf8_unicode_ci,
  `size` tinytext COLLATE utf8_unicode_ci,
  `resolution` tinytext COLLATE utf8_unicode_ci,
  `revision` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finition` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `technologie` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `connector` tinytext COLLATE utf8_unicode_ci,
  `connector_position` tinytext COLLATE utf8_unicode_ci,
  `grade` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `screen`
--

INSERT INTO `screen` (`id`, `date`, `model`, `size`, `resolution`, `revision`, `finition`, `technologie`, `connector`, `connector_position`, `grade`, `user`) VALUES
(1, '2016-12-10 02:25:46', 'LP133WX2', '13.3', '1280 x 800', 'TLA1', 'Mat', 'LED', '40', 'Bas Droite', 'A', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `pwd_hash` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `last_con` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `last_ip` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `pwd_hash`, `email`, `last_con`, `last_ip`) VALUES
(2, 'Compte', 'Admin', 'admin', '87c45b34c7447dd9ed4a0ea248e17653c5a3e59b', 'admin@admin.com', '2016-11-15 02:26:54', '::1');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `screen`
--
ALTER TABLE `screen`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `screen`
--
ALTER TABLE `screen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
