-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 17 juin 2024 à 17:46
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
-- Base de données : `weatherapp`
--
CREATE DATABASE IF NOT EXISTS `weatherapp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `weatherapp`;

-- --------------------------------------------------------

--
-- Structure de la table `météo`
--

CREATE TABLE `météo` (
  `ville` varchar(255) DEFAULT NULL,
  `haut` int(11) DEFAULT NULL,
  `bas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `météo`
--

INSERT INTO `météo` (`ville`, `haut`, `bas`) VALUES
('Bruxelles', 27, 13),
('Liège', 25, 15),
('Namur', 26, 15),
('Charleroi', 25, 12),
('Bruges', 28, 16),
('Tournai', 30, 14);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
