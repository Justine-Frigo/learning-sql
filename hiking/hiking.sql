-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 18 juin 2024 à 18:20
-- Version du serveur : 11.3.2-MariaDB
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hiking`
--
CREATE DATABASE IF NOT EXISTS `hiking` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hiking`;

-- --------------------------------------------------------

--
-- Structure de la table `hiking`
--

CREATE TABLE `hiking` (
  `id` int(11) NOT NULL,
  `name` varchar(400) NOT NULL,
  `difficulty` char(30) NOT NULL,
  `distance` int(11) NOT NULL,
  `duration` time NOT NULL,
  `height_difference` int(11) NOT NULL,
  `available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `hiking`
--

INSERT INTO `hiking` (`id`, `name`, `difficulty`, `distance`, `duration`, `height_difference`, `available`) VALUES
(1, 'Aurère', 'Hard', 18, '06:30:00', 1200, 1),
(2, 'Col des Boeufs', 'Hard', 19, '07:30:00', 1300, 0),
(3, 'Roche Ecrite', 'Medium', 19, '06:30:00', 1100, 0),
(4, 'Grand Bassin', 'Hard', 14, '06:00:00', 1050, 0),
(14, 'Chapelle', 'Hard', 8, '05:00:00', 700, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `firstname`, `lastname`, `password`) VALUES
(1, 'Justine', 'justine@gmail.com', 'Justine', 'Frigo', '$2y$10$1PMbE8RYRBgrvfjed64MI.uRftBO6JWzhVGl60leMV/hsVKMwLkbW'),
(2, 'Pierre', 'pierre@gmail.com', 'Pierre', 'Mauriello', '$2y$10$gqd1FrcxyIqCBXIDVCk1/eqcAZp/DtL9Aj5NrMeKyq5qe0tm1PGbm'),
(3, 'Caroline', 'caroline@gmail.com', 'Caroline', 'Deconinck', '$2y$10$CWcolf9/x6ROPxKrQo6ffu7taDwXwRmD/ZetNsC4/Y/UFAy5e1Y4.'),
(4, 'Jordan', 'jordan@gmail.com', 'Jordan', 'Masy', '$2y$10$um5hoOMV16ZJaEvrQnd8AO3DZf7RXPPw7X/HaHHjvKHVIigZIci4W'),
(5, 'Tom', 'tom@gmail.com', 'Tom', 'Delinte', '$2y$10$mCA7TOFUQb9xgQeAPuDS3OkAYcxETqQE7YQWqnTaGHOWXwwr6uwKG');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `hiking`
--
ALTER TABLE `hiking`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `hiking`
--
ALTER TABLE `hiking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
