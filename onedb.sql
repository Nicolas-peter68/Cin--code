-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 18 jan. 2021 à 13:39
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `onedb`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteur_film`
--

DROP TABLE IF EXISTS `acteur_film`;
CREATE TABLE IF NOT EXISTS `acteur_film` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_film` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `acteur_film`
--

INSERT INTO `acteur_film` (`id`, `id_film`, `id_acteur`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `artistes`
--

DROP TABLE IF EXISTS `artistes`;
CREATE TABLE IF NOT EXISTS `artistes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `naissance` varchar(30) NOT NULL,
  `biographie` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `artistes`
--

INSERT INTO `artistes` (`id`, `nom`, `prenom`, `naissance`, `biographie`) VALUES
(1, 'Sanders', 'Rupert', '16 Mars 1971', 'Rupert Sanders, né le 16 mars 1971 à Westminster, est un réalisateur anglais.'),
(2, 'Johansson', 'Scarlett', '22 Novembre 1984', 'Scarlett Johansson est une actrice, réalisatrice, scénariste, productrice de cinéma et chanteuse américano-danoise, née le 22 novembre 1984 à Manhattan (New York)1.\r\n\r\nRévélée à l\'âge de quatorze ans, grâce à sa prestation dans L\'Homme qui murmurait à l\'oreille des chevaux (1998) de Robert Redford, elle tient les rôles principaux de plusieurs films indépendants acclamés par la critique : Ghost World (2001), Lost in Translation et La Jeune Fille à la perle (2003). Ces deux derniers longs-métrages lui valent deux nominations aux Golden Globes2. Par la suite, elle tourne à trois reprises avec Woody Allen, dans le thriller Match Point (2005), la comédie Scoop (2006) et la comédie dramatique Vicky Cristina Barcelona (2008). Parallèlement, elle se diversifie en jouant dans le blockbuster The Island (2005), le thriller historique Deux sœurs pour un roi (2008) ou encore la comédie romantique Ce que pensent les hommes (2009).');

-- --------------------------------------------------------

--
-- Structure de la table `artiste_role`
--

DROP TABLE IF EXISTS `artiste_role`;
CREATE TABLE IF NOT EXISTS `artiste_role` (
  `N°` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `id_artiste` int(11) NOT NULL,
  PRIMARY KEY (`N°`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `artiste_role`
--

INSERT INTO `artiste_role` (`N°`, `id_role`, `id_artiste`) VALUES
(1, 2, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateurs` int(11) NOT NULL,
  `id_films` int(11) NOT NULL,
  `texte` varchar(50) NOT NULL,
  `creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) NOT NULL,
  `genre` varchar(30) NOT NULL,
  `id_artiste` int(11) NOT NULL,
  `synopsis` varchar(1000) NOT NULL,
  `annee` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id`, `titre`, `genre`, `id_artiste`, `synopsis`, `annee`) VALUES
(1, 'Ghost in the Shell', 'Science-fiction', 1, 'Dans un futur proche, le major Mira Killian est unique en son genre. En effet, il y a un an, cette jeune femme a été sauvée d\'un terrible accident en transférant son cerveau dans un corps synthétique aux capacités cybernétiques. À la suite de l\'opération, elle a tout oublié de son passé. Elle a ensuite rejoint une unité d\'élite anti-terroriste, la section 9, pour lutter aux côtés de Batou contre les plus dangereux criminels. Lorsque sévit une menace d\'un nouveau genre, capable de pirater et de contrôler les esprits, le Major s\'avère être la seule à pouvoir la combattre. Alors qu\'elle s\'apprête à affronter ce nouvel ennemi, elle découvre qu\'on lui a menti ; sa vie n\'a pas été sauvée, mais on la lui a volée. Rien ne l\'arrêtera pour découvrir son véritable passé, trouver les responsables et les empêcher de recommencer avec d\'autres cobayes. Pour ce faire, l\'individu qu\'elle est chargée de neutraliser pourrait lui être finalement d\'une aide précieuse.', 2017);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fonction` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `fonction`) VALUES
(1, 'Acteur'),
(2, 'Réalisateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `motdepasse` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
