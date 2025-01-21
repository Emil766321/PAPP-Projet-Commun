-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 21 jan. 2025 à 13:58
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `plantes_db`
--

-- --------------------------------------------------------

DROP DATABASE IF EXISTS `plantes_db`;
CREATE DATABASE `plantes_db`;
USE `plantes_db`;

--
-- Structure de la table `plante`
--

CREATE TABLE `plante` (
  `id` int(11) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Type_plante` varchar(30) NOT NULL,
  `Humidité` varchar(30) NOT NULL,
  `Arrosage` varchar(30) NOT NULL,
  `Temperateur_min` varchar(10) NOT NULL,
  `Temperateur_max` varchar(10) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `plante`
--

INSERT INTO `plante` (`id`, `Nom`, `Type_plante`, `Humidité`, `Arrosage`, `Temperateur_min`, `Temperateur_max`, `Description`) VALUES
(1, 'Cactus', 'plante grasse', '40%', 'peu d\'arrosage', '5°C.', '35°C.', 'Le cactus est une plante succulente de la famille des Cactacées, souvent caractérisée par des tiges épaisses et épineuses qui lui permettent de stocker de l\'eau. Il préfère les environnements chauds et ensoleillés, avec un sol bien drainé et peu d\'arrosage. Certaines espèces produisent de belles fleurs colorées, généralement au printemps ou en été. Résistant à la sécheresse, le cactus est idéal pour les climats arides.'),
(2, 'Persil', 'Herbacée, aromatique.', '55%', 'Sol modérément humide, arrosag', ' -10°C.', '21°C.', 'le persil est une plante assez adaptable, mais il préfère des températures modérées, une exposition à la lumière indirecte, et un sol légèrement humide. Lorsqu\'il est bien entretenu, il peut être une plante aromatique très productive.'),
(3, 'Tomate', ' Herbacée, annuelle.', '65%', 'Sol modérément humide, arrosag', '10°C.', '25°C.', 'La tomate préfère une exposition au plein soleil, un sol humide mais bien drainé, et des températures chaudes pour bien se développer.');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Nom d'Utilisateur` varchar(10) NOT NULL,
  `Mot de passe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Nom d'Utilisateur`, `Mot de passe`) VALUES
('COFOP', 'cofopplante');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `plante`
--
ALTER TABLE `plante`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `plante`
--
ALTER TABLE `plante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
