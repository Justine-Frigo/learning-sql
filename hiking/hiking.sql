-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 17 juin 2024 à 20:44
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
(5, 'Chapelle', 'Hard', 8, '05:00:00', 700, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `hiking`
--
ALTER TABLE `hiking`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `hiking`
--
ALTER TABLE `hiking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
