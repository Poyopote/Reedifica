-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  jeu. 28 avr. 2022 à 10:29
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
-- Base de données :  `pt2021_2022_ladour`
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
-- Structure de la table `langue`
--

DROP TABLE IF EXISTS `langue`;
CREATE TABLE IF NOT EXISTS `langue` (
  `id_lang` int(11) NOT NULL AUTO_INCREMENT,
  `fr` text NOT NULL,
  `en` text NOT NULL,
  PRIMARY KEY (`id_lang`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`id_lang`, `fr`, `en`) VALUES
(1, 'Accueil', 'Home'),
(2, 'Histoire', 'History'),
(3, 'Il &eacute;tait une fois...', 'Once upon a time...'),
(4, 'Nouveaut&eacute;', 'New'),
(5, 'Exploration', 'Explore'),
(6, 'Membres', 'Members'),
(7, 'Guide', 'Guide'),
(8, 'Tutoriel', 'Tutorial'),
(9, 'R&eacute;glementation', 'Regulations'),
(10, 'F.A.Q', 'F.A.Q'),
(11, 'Connexion', 'Login'),
(12, 'Inscription', 'Sign up'),
(13, 'Profil', 'Profile'),
(14, 'D&eacute;connexion', 'Sign out'),
(15, 'Bienvenue', 'Welcome'),
(16, 'R&eacute;.&eacute;difica ouvre enfin ses portes. Le site o&ugrave; tu peux lib&eacute;rer ton imagination pour le partager &agrave; tous. <strong>Connecte-toi / inscris-toi</strong> et viens rejoindre la liste de nos <strong>Membres</strong>. D&eacute;couvre <strong>l\'histoire</strong> de R&eacute;.&eacute;difica, puis part &agrave; <strong>l\'exploration</strong> et raconte-nous l\'histoire ton personnage ! Tu es perdu, <strong>Guide </strong>est l&agrave; pour toi.', 'Re.edifica finally opens its doors. The site where you can free your imagination to share it with everyone. <strong>Log in/register</strong> and join the list of our <strong>Members</strong>. Discover <strong>the history</strong> of Re.edifica, then go <strong>exploring</strong> and tell us the story of your character! You are lost, <strong>Guide </strong>is here for you.<br> We recommend speaking French.'),
(17, 'Histoire - contexte', 'History - context'),
(18, 'Notre histoire', 'Our history'),
(19, '<p>Promis, &ccedil;a ne sera pas long. Notre site r&eacute;&eacute;difica a vu le jour en avril 2022, pour un projet d\'&eacute;tude. Son nom lui vient de r&eacute;&eacute;difica qui signifie reconstruire, car nous cr&eacute;ons ensemble une histoire, l\'Histoire de R&eacute;&eacute;difica.</p>\r\n<p>L\'univers pr&eacute;sent&eacute; est tout droit sorti de la BD Chronique of Celestiens. Cette &oelig;uvre, toujours en cours, pr&eacute;sente la vie d\'un groupe de C&eacute;lestiens (Combattant de la lumi&egrave;re).</p>\r\n<p>On y d&eacute;couvre leurs p&eacute;rip&eacute;ties. Comment de solides amiti&eacute;s vont na&icirc;tre ? De puissants pouvoirs seront d&eacute;velopp&eacute;s ou encore leurs interventions &eacute;piques, afin de d&eacute;jouer les sinistres plans des antagonistes</p>', '<p>I promise, it won\'t be long. Our website re&eacute;difica was created in April 2022, for a study project. Its name comes from re&eacute;difica which means to rebuild, because we create together a story, the History of R&eacute;&eacute;difica.</p>\r\n<p>The universe presented is straight out of the comic book Chronicle of Celestians. This work, still in progress, presents the life of a group of Celestians (Fighters of the Light).</p>\r\n<p>We discover their adventures. How strong friendships will be born? Powerful powers will be developed or their epic interventions, in order to thwart the sinister plans of the antagonists.</p>'),
(20, 'Et réédifica dans tout ça ? Nous avons décidé pour ce forum de présenter un des arcs narratifs antérieur à l\'arc principal et c\'est pour cela que vous êtes là !', 'And reedifica in all this? We decided for this forum to present one of the story arcs prior to the main arc and that\'s why you are here!'),
(21, 'L\'arc du Pacificateur', 'The Peacemaker\'s Arc'),
(22, 'Dans notre univers, toute chose à sa place. Tout est ordonné. L\'équilibre persiste et dans le domaine de la magie, ce sont les illustres qui en sont les ministères. Grâce à eux, la magie et dans son harmonie complète, mais cette sérénité ne persista pas. Arena - Illustre de la destruction, rompu l\'ordre, sous les conseils d\'un être encore mystérieux à ce jour. Elle prit l\'objet le plus convoité au Panthéon des illustres et libéra Les Ténèbres, dévorant sur tout l\'univers.', 'In our universe, everything has its place. Everything is ordered. Balance persists and in the realm of magic, it is the illustrious ones who are the ministries. With their help, magic is in complete harmony, but this serenity does not persist. Arena - Illustrious of destruction, broke the order, under the advice of a being still mysterious to this day. She took the most coveted object in the Pantheon of Illustrious and released The Darkness, devouring over the entire universe.'),
(23, '<p>Si les autres illustrent l\'ont abandonn&eacute; dans sa folie. Piter - Illustre de l\'offrande, persiste &agrave; vouloir la sauver. Il tenta seul, mais en vain. Il d&eacute;cida alors de s\'enfuir... Attrist&eacute;, d&eacute;sesp&eacute;r&eacute;, vagabond, il trouva sur sa route, le peuple des C&eacute;lestiens. Un peuple bienveillant, qui ignorerait le statut que portait cet homme.</p>\r\n<p>Il fut accueilli, restaur&eacute; et se fit des amis loin de son tr&ocirc;ne. Mais la r&eacute;alit&eacute; le rattrape, les t&eacute;n&egrave;bres sont en route, en direction de la contr&eacute;e qu\'il a accueilli. Personne ne doit mourir, ils se les jur&eacute;s. Il partit au front et comprit tr&egrave;s vite qu\'il n\'&eacute;tait plus tout seul.</p>\r\n<p>C\'est l&agrave; qu\'une id&eacute;e lui vient. Il sait que les lois de la magie l\'interdit de se confronter aux t&eacute;n&egrave;bres, mais en revanche, ce n\'est pas le cas des autres. C\'est ainsi que na&icirc;t le don, celui de repousser les t&eacute;n&egrave;bres. Capable de ma&icirc;triser n\'importe quel type de magie, de les combiner, de les fusionner, d\'en cr&eacute;er de nouveaux et tout cela &agrave; la seule force de la volont&eacute;.</p>\r\n<p>Maintenant, les C&eacute;lestiens sont munis du don, mais ils sont peu nombreux. Pour pallier, Le don fut &Agrave; la port&eacute;e de tous ceux qui en &eacute;taient dignes. On appela le don, le don du C&eacute;lestien car ils &eacute;taient les premiers &agrave; l\'avoir obtenu. Piter prit le nom du pacificateur, cr&eacute;ateur du mouvement. &Agrave; pr&eacute;sent, la paix est peut-&ecirc;tre possible.</p>', '<p>If the others illustrate have abandoned him in his madness. Piter - Illustrious of the offering, persists in wanting to save her. He tried alone, but in vain. He then decided to run away... Saddened, desperate, wandering, he found, on his way, the Celestial people. A benevolent people, who would ignore the status that this man wore.</p>\r\n<p>He was welcomed, restored and made friends far from his throne. But reality caught up with him, the darkness was on its way, towards the land he had welcomed. No one must die, they swore to each other. He went to the front and soon realized that he was no longer alone.</p>\r\n<p>That\'s when an idea came to him. He knew that the laws of magic forbade him to confront the darkness, but on the other hand, this was not the case for the others. This is how the gift of repelling darkness is born. Able to master any type of magic, to combine them, to merge them, to create new ones, and all of this by sheer force of will.</p>\r\n<p>Now, Celestians are equipped with the gift, but they are few in number. To compensate, the gift was made available to all those who were worthy of it. The gift was called the Celestial gift because they were the first to obtain it. Piter took the name of the peacemaker, creator of the movement. Now peace may be possible.</p>'),
(24, 'Votre histoire', 'Your story'),
(25, 'Tu viens d\'obtenir le don, on t\'a envoyé au bercail afin de rejoindre les rangs des Célestins combattants. Nous avons besoin de toi pour faire reculer les ténèbres. Sur ta route, de nombreuses créatures émaneront des ombres.', 'You\'ve just been given the gift, sent into the fold to join the ranks of the fighting Celestials. We need you to push back the darkness. On your way, many creatures will emanate from the shadows.'),
(26, 'Tu fais partie de la première ère des Célestins. Quand tu commences, tu as 1 pouvoir au choix. Lorsque tu montes en grade, tu obtiens de nouveau pouvoir. Au maximum 3, de quoi te rendre très puissant.', 'You are part of the first Celestine era. When you start, you have 1 power to choose from. When you go up in rank, you get new powers. At most 3, to make you very powerful.'),
(27, '<ul>\r\n<li>Feu : Utile quand il fait froid. Permet de s\'&eacute;clairer quand il fait nuit et surtout br&ucirc;ler tes ennemis !</li>\r\n<li>Foudre : Parfait pour des attaques &agrave; distance. En plus de faire tr&egrave;s mal, d&eacute;placement instantan&eacute; sur 250 m.</li>\r\n<li>Glace : Utile quand il fait chaud. Permet de geler tes ennemis, de les ralentir, de cr&eacute;er des icebergs et par cons&eacute;quent faire sombrer n\'importe quel Titanic.</li>\r\n<li>Nature : Si tu es v&eacute;g&eacute;tarien, tu vas aimer, faire pousser des l&eacute;gumes et des fruits. Mais &eacute;galement invoque de la terre (Racines, lianes, Ronces, Feuilles tranchantes, Spores toxiques et pour tes alli&eacute;s Plante m&eacute;dicinale).</li>\r\n<li>Spectral : Traverser la mati&egrave;re, drainer l\'&eacute;nergie vital (la vie) des autres. Encaisser les attaques physiques.</li>\r\n<li>Vent : G&eacute;n&egrave;re de l\'oxyg&egrave;ne. Capacit&eacute; de vole. Cr&eacute;ateur de bourrasque et de tornade.</li>\r\n</ul>', '<ul>\r\n<li>Fire : Useful when it\'s cold. Allows you to light up when it\'s dark and especially to burn your enemies!</li>\r\n<li>Lightning : Perfect for long distance attacks. In addition to hitting a lot, instantaneous movement on 250 m.</li>\r\n<li>Ice : Useful when it\'s hot. Allows you to freeze your enemies, slow them down, create icebergs and therefore sink any Titanic.</li>\r\n<li>Nature : If you are a vegetarian, you will like, grow vegetables and fruits. But also summon earth (Roots, creepers, reeds, sharp leaves, toxic spores and for your allie\'s medicinal plant).</li>\r\n<li>Spectral : To go through matter, to drain the vital energy (life) of others. Take physical attacks.</li>\r\n<li>Wind : Generates oxygen. Ability to fly. Creator of gust of wind and tornado.</li>\r\n</ul>'),
(28, 'D\'autres pouvoirs sont en cours de ajout.', 'Other powers are being added.'),
(29, 'Une histoire à écrire.', 'A story to be written.');

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
  `avant` int(11) DEFAULT NULL,
  `apres` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rp`),
  KEY `id_user` (`id_user`),
  KEY `id_story` (`id_story`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `rp`
--

INSERT INTO `rp` (`id_rp`, `id_user`, `id_story`, `date`, `avant`, `apres`) VALUES
(1, 2, 1, '2022-04-24 01:09:27', NULL, NULL),
(2, 1, 2, '2022-04-27 13:13:58', NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `story`
--

INSERT INTO `story` (`id_story`, `title`, `id_user`, `id_under_world`, `bio`, `date`) VALUES
(1, 'La femme bleu ?', 2, 1, '', '2022-04-24 01:55:30'),
(2, 'C koi sa enkor !', 1, 1, 'Mon m&eacute;tier, je vole, je pille et je fume. C&#039;est pas l&eacute;gal, mais &ccedil;a paye mon loyer.  Si j&#039;avais su qu&#039;un truc comme &ccedil;a allait&hellip;. J&#039;vous jure ! J&#039;&eacute;tais dans ma bagnole en train de fuir la police quand c&#039;est arriv&eacute;...', '2022-04-28 11:25:57');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `under_world`
--

INSERT INTO `under_world` (`id_under_world`, `id_world`, `title`, `bio`, `media`, `id_user`) VALUES
(1, 1, 'Le bureau des rencontres', '[curriculum vitae] Lieu de paix et d\'harmonie. Ce lieu accueille toutes les histoires personnelles des membres.', 'Vision Oréan.jpg', 2),
(2, 3, 'L\'étang', 'L\'étang soigne tout, même les blessures de guerre.', 'étant.jpg', 1),
(3, 2, 'Grotte de cristal', 'Maison de Rénata, elle accueille toujours les Bonnes âmes. Ici, tu peux découvrir ton avenir et éprouver ton présent.', 'PhotoBASHING 1.jpg', 2),
(4, 2, 'Sable rouge', 'Zone d\'affrontements principal. Représente un point stratégique pour une paix durable.', 'bataille_vue2.jpg', 1),
(5, 3, 'La Jungle', 'Lieu prisé des combattants, dans une jungle luxuriante et dangereuse. Et des alchimistes, en quête de matériaux pour leurs potions.', 'Matte painting 95.jpg', 2),
(6, 1, 'L\'Observatoire', 'C\'est ici que nous étudions l\'espace et l\'univers, pour élaborer un plan d\'attaque contre les ténèbres', 'observatoire_vue2.jpg', 1);

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
  `grade` enum('Novise','Apprenti','Accompli','Soutien') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Novise',
  `mdp` char(60) NOT NULL,
  `email` varchar(319) NOT NULL,
  `date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `don` enum('CC','CN','DP') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `nom`, `prenom`, `image`, `grade`, `mdp`, `email`, `date`, `description`, `don`) VALUES
(1, 'Voltamaster', 'X', 'Valto', 'Voltamaster.jpg', 'Accompli', '$2y$10$DIHIo97eHPsA7OHoXOaKM.1ay0v9H7iZsfgG7CHJ1gntyyJLizfqK', 'exemple@email.fr', '2022-04-28 11:25:30', 'Je me présente, je suis Robin BLUE. On me connaît sous le nom de Valto X.', 'CN'),
(2, 'DameBleu', '', 'Rénata', 'Damebleu.jpg', 'Soutien', '$2y$10$.8md5emsNx6b4o5yMb3p2.6Fl997rEme3vvp6QcNpxKWw67jKx0wC', '', '2022-04-24 23:22:26', 'Tu es seul, désespéré, en proie au doute, laisse-moi donc t\'aider.', NULL),
(3, 'Bel Apollon', 'Vieira', 'Oliver', 'Bel Apollon.jpg', 'Novise', '$2y$10$AzPQNl68DriwNyVuH4ar8e0IUIeN5crr33DN0TVyYzyfdQOo9x2hC', 'jean.dupont@gmail.fr', '2022-04-24 22:47:50', 'Acteur, Danseur & Chorégraphe, Mannequin, Je sais, j\'ai tous les talents. Est-ce que je vous ai déjà dit que je savais faire Jouer du piano comme personne.\r\nQuoi, moi, vantard ? Cela faisait longtemps...', 'DP');

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
(1, 'Le Bercail', 'Lieu de départ pour tous les aventuriers. C\'est notre maison mère.', 1, 'observatoire_vue1.jpg'),
(2, 'Champ de bataille', 'Lieu d\'affrontement contre les ténèbres. Ici, c\'est la survie qui prime.\r\nUn conseil, trouve-toi de bons alliés et partez à l\'aventure ensemble.', 1, 'bataille_vue1.jpg'),
(3, 'Bivouac', 'Les ténèbres n\'ont pas encore fait route. Il existe encore des lieux où la lumière est permanente. Ces zones de repos ont été prises pour lieu d\'entraînement afin d\'aguerrir de nouveaux pouvoirs.', 2, 'Matte_painting_94.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
