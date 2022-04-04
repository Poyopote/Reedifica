-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  lun. 04 avr. 2022 à 08:58
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `reedifica_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `ability`
--

DROP TABLE IF EXISTS `ability`;
CREATE TABLE IF NOT EXISTS `ability` (
  `id_ability` int(11) NOT NULL AUTO_INCREMENT,
  `name_ability` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bio_ability` text NOT NULL,
  `symbole` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ability`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ability`
--

INSERT INTO `ability` (`id_ability`, `name_ability`, `bio_ability`, `symbole`) VALUES
(1, 'Feu', '<h2>3 niveaux de puissance</h2>', '001.png');

-- --------------------------------------------------------

--
-- Structure de la table `actu`
--

DROP TABLE IF EXISTS `actu`;
CREATE TABLE IF NOT EXISTS `actu` (
  `id_actu` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `content` text NOT NULL,
  `media` varchar(20) NOT NULL,
  PRIMARY KEY (`id_actu`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `name_role` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bio_role` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `name_role`, `bio_role`) VALUES
(1, 'Administrateur', 'Maître du jeu, de l\'histoire et de ses règles.'),
(2, 'Moderateur', 'Un modérateur ou modératrice de communauté, assure une mission de prévention et de surveillance sur le contenu des échanges entre les membres. Son rôle lui permet d\'évincer les personnes qui ne respectent pas les règles de la communauté.\r\nIl lui est aussi possible de créer des événements, des mondes. Mais n\'est pas au-dessus de l\'administrateur qui lui peut tout faire.'),
(3, 'Joueur', 'Jouer un personnage né tout droit de votre imaginaire dans l\'univers incroyable de réédifica.'),
(4, 'Guide', 'Soutien des modérateurs exclusifs pour les joueurs. Aucune capacité supplémentaire, mais permettent d\'indiquer si le joueur est expérimenté et peut servir d\'aide pour les autres joueurs.');

-- --------------------------------------------------------

--
-- Structure de la table `rp`
--

DROP TABLE IF EXISTS `rp`;
CREATE TABLE IF NOT EXISTS `rp` (
  `id_rp` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_story` int(11) NOT NULL,
  `date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `avant` int(11) NOT NULL,
  `apres` int(11) NOT NULL,
  PRIMARY KEY (`id_rp`),
  KEY `id_user` (`id_user`),
  KEY `id_story` (`id_story`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `story`
--

DROP TABLE IF EXISTS `story`;
CREATE TABLE IF NOT EXISTS `story` (
  `id_story` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_under_world` int(11) NOT NULL,
  `bio` text NOT NULL,
  `date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_story`),
  KEY `id_user` (`id_user`),
  KEY `id_under_world` (`id_under_world`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `story`
--

INSERT INTO `story` (`id_story`, `title`, `id_user`, `id_under_world`, `bio`, `date`) VALUES
(1, 'natation', 2, 5, 'salut', '2022-04-03 19:57:46'),
(2, 'Cubesat', 1, 2, 'je voyage', '2022-04-04 09:24:38'),
(3, 'Cubesat 2', 1, 2, 'Super aventure avec monsieur Roques', '2022-04-04 09:25:55');

-- --------------------------------------------------------

--
-- Structure de la table `under_world`
--

DROP TABLE IF EXISTS `under_world`;
CREATE TABLE IF NOT EXISTS `under_world` (
  `id_under_world` int(11) NOT NULL AUTO_INCREMENT,
  `id_world` int(11) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bio` text NOT NULL,
  `media` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_under_world`),
  KEY `id_world` (`id_world`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `under_world`
--

INSERT INTO `under_world` (`id_under_world`, `id_world`, `title`, `bio`, `media`, `id_user`) VALUES
(1, 1, 'Le bureau des rencontres', 'bla bla', '_rose_texture_2.png', 2),
(2, 3, 'Le Lac', 'htytryry', 'lac.jpg', 1),
(3, 2, 'Grotte de cristal', 'Maison de Rénata, elle accueille toujours les Bonnes âmes. Ici, tu peux découvrir ton avenir.', 'lac.jpg', 2),
(4, 3, 'Sable rouge', '', 'Matte painting 98.jpg', 1),
(5, 3, 'La Jungle', '', 'Matte painting 95.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `image` varchar(50) NOT NULL,
  `grade` enum('Novise','Apprenti','Accompli','Soutien') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mdp` char(60) NOT NULL,
  `email` varchar(319) NOT NULL,
  `date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `nom`, `prenom`, `image`, `grade`, `mdp`, `email`, `date`, `description`) VALUES
(1, 'Voltamaster', 'X', 'Valto', 'Voltamaster.jpg', 'Accompli', '$2y$10$DIHIo97eHPsA7OHoXOaKM.1ay0v9H7iZsfgG7CHJ1gntyyJLizfqK', 'exemple@email.fr', '2022-03-17 00:00:00', 'je suis génial'),
(2, 'DameBleu', '', 'Rénata', 'Damebleu.jpg', 'Soutien', '$2y$10$.8md5emsNx6b4o5yMb3p2.6Fl997rEme3vvp6QcNpxKWw67jKx0wC', '', '2022-04-02 21:17:13', '');

-- --------------------------------------------------------

--
-- Structure de la table `userxability`
--

DROP TABLE IF EXISTS `userxability`;
CREATE TABLE IF NOT EXISTS `userxability` (
  `id_user` int(11) NOT NULL,
  `id_ability` int(11) NOT NULL,
  KEY `id_user` (`id_user`),
  KEY `id_ability` (`id_ability`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `userxrole`
--

DROP TABLE IF EXISTS `userxrole`;
CREATE TABLE IF NOT EXISTS `userxrole` (
  `id_statut` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  KEY `id_statut` (`id_statut`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `userxrole`
--

INSERT INTO `userxrole` (`id_statut`, `id_user`) VALUES
(1, 1),
(3, 1),
(2, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `world`
--

DROP TABLE IF EXISTS `world`;
CREATE TABLE IF NOT EXISTS `world` (
  `id_world` int(11) NOT NULL AUTO_INCREMENT,
  `name_world` varchar(25) NOT NULL,
  `bio_world` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `media` varchar(30) NOT NULL,
  PRIMARY KEY (`id_world`),
  KEY `id_user` (`id_user`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `world`
--

INSERT INTO `world` (`id_world`, `name_world`, `bio_world`, `id_user`, `media`) VALUES
(1, 'Le Bercail', 'Lieu de départ pour tous les aventuriers. C\'est notre maison mère.', 1, '696364.jpg'),
(2, 'Champ de bataille', 'Lieu d\'affrontement contre les ténèbres. Ici, c\'est la survie qui prime.\r\nUn conseil, trouve-toi de bons alliés et partez à l\'aventure ensemble.', 1, 'bataille_vue1.jpg'),
(3, 'Bivouac', '', 2, 'Matte painting 94.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
