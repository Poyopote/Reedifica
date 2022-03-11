-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 07 mars 2022 à 20:32
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reedifica_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `ability`
--

DROP TABLE IF EXISTS `ability`;
CREATE TABLE IF NOT EXISTS `ability` (
  `id_ability` int NOT NULL AUTO_INCREMENT,
  `name_ability` text NOT NULL,
  `bio_ability` text NOT NULL,
  `symbole` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ability`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `actu`
--

DROP TABLE IF EXISTS `actu`;
CREATE TABLE IF NOT EXISTS `actu` (
  `id_actu` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `content` text NOT NULL,
  `media` varchar(20) NOT NULL,
  PRIMARY KEY (`id_actu`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `id_statut` int NOT NULL AUTO_INCREMENT,
  `name_statut` varchar(25) NOT NULL,
  `bio_statut` text NOT NULL,
  PRIMARY KEY (`id_statut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `story`
--

DROP TABLE IF EXISTS `story`;
CREATE TABLE IF NOT EXISTS `story` (
  `id_story` int NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `id_user` int NOT NULL,
  `id_under_world` int NOT NULL,
  `bio` text NOT NULL,
  PRIMARY KEY (`id_story`),
  KEY `id_user` (`id_user`),
  KEY `id_under_world` (`id_under_world`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

DROP TABLE IF EXISTS `sujet`;
CREATE TABLE IF NOT EXISTS `sujet` (
  `id_sujet` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_story` int NOT NULL,
  `contente` text NOT NULL,
  `avant` int NOT NULL,
  `apres` int NOT NULL,
  PRIMARY KEY (`id_sujet`),
  KEY `id_user` (`id_user`),
  KEY `id_story` (`id_story`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `under world`
--

DROP TABLE IF EXISTS `under world`;
CREATE TABLE IF NOT EXISTS `under world` (
  `id_under_world` int NOT NULL AUTO_INCREMENT,
  `id_world` int NOT NULL,
  `tiltle` varchar(50) NOT NULL,
  `bio` text NOT NULL,
  `media` varchar(30) NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_under_world`),
  KEY `id_world` (`id_world`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `image` varchar(50) NOT NULL,
  `grade` enum('novise','avance','accompli') NOT NULL,
  `mdp` int NOT NULL,
  `email` varchar(319) NOT NULL,
  `date` date NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `userxability`
--

DROP TABLE IF EXISTS `userxability`;
CREATE TABLE IF NOT EXISTS `userxability` (
  `id_user` int NOT NULL,
  `id_ability` int NOT NULL,
  KEY `id_user` (`id_user`),
  KEY `id_ability` (`id_ability`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `userxstatut`
--

DROP TABLE IF EXISTS `userxstatut`;
CREATE TABLE IF NOT EXISTS `userxstatut` (
  `id_statut` int NOT NULL,
  `id_user` int NOT NULL,
  KEY `id_statut` (`id_statut`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `world`
--

DROP TABLE IF EXISTS `world`;
CREATE TABLE IF NOT EXISTS `world` (
  `id_world` int NOT NULL AUTO_INCREMENT,
  `name_world` varchar(25) NOT NULL,
  `bio_world` text NOT NULL,
  `id_user` int NOT NULL,
  `media` varchar(30) NOT NULL,
  PRIMARY KEY (`id_world`),
  KEY `id_user` (`id_user`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `story`
--
ALTER TABLE `story`
  ADD CONSTRAINT `story_ibfk_1` FOREIGN KEY (`id_under_world`) REFERENCES `under world` (`id_under_world`);

--
-- Contraintes pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD CONSTRAINT `sujet_ibfk_1` FOREIGN KEY (`id_story`) REFERENCES `story` (`id_story`);

--
-- Contraintes pour la table `userxability`
--
ALTER TABLE `userxability`
  ADD CONSTRAINT `userxability_ibfk_2` FOREIGN KEY (`id_ability`) REFERENCES `ability` (`id_ability`);

--
-- Contraintes pour la table `userxstatut`
--
ALTER TABLE `userxstatut`
  ADD CONSTRAINT `userxstatut_ibfk_1` FOREIGN KEY (`id_statut`) REFERENCES `statut` (`id_statut`),
  ADD CONSTRAINT `userxstatut_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;