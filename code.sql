-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 20 jan. 2021 à 14:19
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
-- Base de données : `crud`
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `acteur_film`
--

INSERT INTO `acteur_film` (`id`, `id_film`, `id_acteur`) VALUES
(1, 1, 2),
(2, 5, 5),
(3, 2, 4),
(4, 6, 6),
(5, 7, 7),
(6, 8, 8);

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `artistes`
--

INSERT INTO `artistes` (`id`, `nom`, `prenom`, `naissance`, `biographie`) VALUES
(1, 'Sanders', 'Rupert', '16 Mars 1971', 'Rupert Sanders, né le 16 mars 1971 à Westminster, est un réalisateur anglais.'),
(2, 'Johansson', 'Scarlett', '22 Novembre 1984', 'Scarlett Johansson est une actrice, réalisatrice, scénariste, productrice de cinéma et chanteuse américano-danoise, née le 22 novembre 1984 à Manhattan (New York)1.\r\n\r\nRévélée à l\'âge de quatorze ans, grâce à sa prestation dans L\'Homme qui murmurait à l\'oreille des chevaux (1998) de Robert Redford, elle tient les rôles principaux de plusieurs films indépendants acclamés par la critique : Ghost World (2001), Lost in Translation et La Jeune Fille à la perle (2003). Ces deux derniers longs-métrages lui valent deux nominations aux Golden Globes2. Par la suite, elle tourne à trois reprises avec Woody Allen, dans le thriller Match Point (2005), la comédie Scoop (2006) et la comédie dramatique Vicky Cristina Barcelona (2008). Parallèlement, elle se diversifie en jouant dans le blockbuster The Island (2005), le thriller historique Deux sœurs pour un roi (2008) ou encore la comédie romantique Ce que pensent les hommes (2009).'),
(4, 'Woodley', 'Shailene', '15 novembre 1991', 'Née à Simi Valley, en Californie, est la fille aînée de Lori Victor, conseillère pédagogique d\'un collège, et de Lonnie Woodley, directeur d\'école2. Elle a un jeune frère, prénommé Tanner Woodley (né en 1994). Dès l\'âge de 4 ans, elle a lancé sa carrière de mannequin. En 2006, ses parents ont divorcé.\r\n\r\nShailene Woodley est diplômée du lycée simi Valley High School5. Avant d\'obtenir le rôle principal dans la série La Vie secrète d\'une ado ordinaire, la jeune femme comptait intégrer l\'université de New York, afin d\'étudier l\'architecture d\'intérieur.'),
(5, 'Pitt', 'Brad', '18 décembre 1963', 'Repéré dans une publicité pour Levi\'s, Brad Pitt sort de l\'anonymat grâce à un petit rôle dans le film Thelma et Louise de Ridley Scott. En très peu de temps, il devient une véritable star et sa collaboration avec le réalisateur David Fincher donne naissance aux films culte Seven, Fight Club et L\'Étrange Histoire de Benjamin Button. Il tourne dans de nombreux autres succès comme Entretien avec un vampire de Neil Jordan, Ocean\'s Eleven et ses suites de Steven Soderbergh, Troie de Wolfgang Petersen et Inglourious Basterds de Quentin Tarantino. Au cours de sa carrière, il reçoit six nominations aux Oscars et cinq nominations aux Golden Globes, dont un remporté pour L\'Armée des douze singes de Terry Gilliam en 1996. '),
(6, 'Pratt', 'Christopher', '21 juin 1979', 'Dans un premier temps connu aux États-Unis grâce aux rôles qu\'il incarne à la télévision comme celui de Bright Abbott dans Everwood et d\'Andy Dwyer dans Parks and Recreation, il joue aussi des rôles secondaires au cinéma comme dans Wanted : Choisis ton destin, Le Stratège, Ten Years, Cinq ans de réflexion, Zero Dark Thirty et Her. Il prend par la suite part à plusieurs films comiques tels que Hot Babes et Delivery Man.'),
(7, 'Sheridan', 'Tye', '11 novembre 1996', 'Tye Sheridan est né à Elkhart, une petite ville de l\'est du Texas, au nord de Houston. Fils aîné de Bryan et Stephanie Sheridan, il a également une sœur nommée Madison.\r\n\r\nIl fréquente le système scolaire indépendant d\'Elkhart depuis la maternelle, et, chaque année, a toujours obtenu de bons résultats. En plus de la réussite scolaire, il a pratiqué plusieurs sports tels que le baseball ou le football américain. '),
(8, 'Damon', 'Matt', '8 octobre 1970', 'Matthew Paige Damon naît à Cambridge, dans le Massachusetts. Son père, Kent Damon, est agent immobilier, travaillant également pour les impôts1. Sa mère, Nancy Carlsson-Paige, est professeure d\'éducation physique à l\'université Lesley. Matt a un frère aîné, Kyle, qui est sculpteur. Son père était d\'origine anglaise et écossaise et sa mère est d\'origine finlandaise et suédoise. La famille vivait à Newton jusqu\'à ce que ses parents divorcent en 1973, lorsque Matt et son frère s\'installèrent avec sa mère à Cambridge (Massachusetts). À l’âge de dix ans, il rencontre un cousin lointain : Ben Affleck. Ils deviennent très vite de très bons amis et fréquentent la même école secondaire. Dans sa jeunesse, Matt Damon suit des cours de théâtre et après des études littéraires à Harvard qu’il abandonne en 1992, il se produit sur les planches où il connaît son premier succès dans la pièce The Speed of Darkness de Steve Tesich. '),
(9, 'Itō', 'Tomohiko', '20 octobre 1978', 'Tomohiko Itō (伊藤 智彦, Itō Tomohiko) est un réalisateur japonais de film d\'animation. Il est notamment connu pour avoir réalisé les 2 saisons de Sword Art Online ainsi que le film Sword Art Online: Ordinal Scale, ou encore le storyboard de Death Note1. '),
(10, 'Schwentke', 'Robert', '15 février 1968', 'Diplômé du Columbia College Hollywood de Los Angeles en 1992, l\'Allemand Robert Schwentke fait ses premières armes en tant que réalisateur l\'année suivante avec son court métrage Heaven!.\r\n\r\nLe cinéaste attend toutefois pratiquement dix ans avant de repasser derrière la caméra, cette fois dans son pays natal. Il écrit et réalise le thriller Tattoo (2002) suivi très rapidement de Eierdiebe (2003), l\'histoire d\'un homme atteint d\'un cancer des testicules et dont il a lui-même souffert au milieu des années 1990. '),
(11, 'Ayer', 'David', '18 janvier 1968', 'Alors qu\'il est adolescent, ses parents le chassent de la maison familiale. Il vit alors avec son cousin à Los Angeles. Ses expériences dans les quartiers sud de la ville (South Los Angeles) seront une source d\'inspiration pour ses films, dont l\'action se situe très souvent dans cette ville.\r\n\r\nÀ 18 ans, il s\'engage dans l\'US Navy, comme officier sonar sur un sous-marin militaire. Après cela, David Ayer décide de devenir scénariste, notamment sous l\'impulsion de son ami et mentor Wesley Strick. Pour son premier scénario de long métrage, il puise son inspiration dans son expérience dans la Marine et écrit U-571, qui est réalisé par Jonathan Mostow et sort en 2000. Le film relance le genre des films de sous-marin. '),
(12, 'Gunn', 'James', '5 août 1970', 'James Gunn nait et grandit à Saint-Louis, dans le Missouri. Il a quatre frères, Sean, Bryan, Matt (tous trois travaillent dans le cinéma comme acteur ou scénariste) et Patrick, et une sœur, Beth. À l\'âge de 12 ans, il commence à faire films amateurs en 8 mm avec son frère Sean.\r\nAprès avoir fréquenté l\'Université Columbia, il rejoint la société Troma Entertainment de Lloyd Kaufman, spécialisée dans la production de films trash de série B, voire de nanars volontaires. En 1996, il participe à l\'écriture de Tromeo and Juliet. Après avoir travaillé sur d\'autres films Troma Entertainment, il quitte l\'entreprise et écrit le scénario de la comédie de super-héros The Specials (2000), mis en scène par Craig Mazin.'),
(13, 'Spielberg', 'Steven', '18 décembre 1946', 'Issu de la deuxième génération du Nouvel Hollywood dans les années 1970, il réalise le premier blockbuster de l\'histoire du cinéma, Les Dents de la mer (1975). Il enchaîne ensuite les succès internationaux : E.T., l\'extra-terrestre (1982), la série Indiana Jones (1981-2008), Jurassic Park (1993), La Liste de Schindler (1993), Il faut sauver le soldat Ryan (1998), Ready Player One (2018), tout en développant ses activités de gestionnaire. Fondateur de la société de production Amblin Entertainment et cofondateur du studio DreamWorks SKG, il produit de nombreux films à grand succès (Poltergeist, Gremlins, Retour vers le futur, Qui veut la peau de Roger Rabbit, la trilogie Men in Black ou encore Transformers). Il a également financé et distribué des œuvres plus exigeantes ou moins grand public telles que Lettres d\'Iwo Jima de Clint Eastwood, American Beauty de Sam Mendes et Hollywood Ending de Woody Allen. '),
(14, 'Scott', 'Ridley', '30 novembre 1937', 'Il est révélé à la fin des années 1970 et durant les années 1980 par trois blockbusters : Alien, le huitième passager (1979), Blade Runner (1982) et Legend (1985).\r\n\r\nDurant les années 1990, ses films connaissent moins de succès. Se détachent en 1992 Thelma et Louise et 1492 : Christophe Colomb.\r\n\r\nMais au début des années 2000, il fait un retour au premier plan remarqué en relançant le péplum avec Gladiator (2000). Il enchaîne ensuite avec des grosses productions : Hannibal (2001), La Chute du faucon noir (2002), Kingdom of Heaven (2005), alternant également avec des films plus modestes : Les Associés (2003) et Une grande année (2006). Il conclut cette décennie en menant trois gros projets avec l\'acteur Russell Crowe : American Gangster (2007), Mensonges d\'État (2008), Robin des Bois (2010) qui déçoivent commercialement.');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `artiste_role`
--

INSERT INTO `artiste_role` (`N°`, `id_role`, `id_artiste`) VALUES
(1, 2, 1),
(2, 1, 2),
(3, 2, 4);

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
  `affiche` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id`, `titre`, `genre`, `id_artiste`, `synopsis`, `annee`, `affiche`) VALUES
(1, 'Ghost in the Shell', 'Science-fiction', 1, 'Dans un futur proche, le major Mira Killian est unique en son genre. En effet, il y a un an, cette jeune femme a été sauvée d\'un terrible accident en transférant son cerveau dans un corps synthétique aux capacités cybernétiques. À la suite de l\'opération, elle a tout oublié de son passé. Elle a ensuite rejoint une unité d\'élite anti-terroriste, la section 9, pour lutter aux côtés de Batou contre les plus dangereux criminels. Lorsque sévit une menace d\'un nouveau genre, capable de pirater et de contrôler les esprits, le Major s\'avère être la seule à pouvoir la combattre. Alors qu\'elle s\'apprête à affronter ce nouvel ennemi, elle découvre qu\'on lui a menti ; sa vie n\'a pas été sauvée, mais on la lui a volée. Rien ne l\'arrêtera pour découvrir son véritable passé, trouver les responsables et les empêcher de recommencer avec d\'autres cobayes. Pour ce faire, l\'individu qu\'elle est chargée de neutraliser pourrait lui être finalement d\'une aide précieuse.', 2017, 'Ghost_in_the_shell.jpg'),
(2, 'Divergente 3 : Au-delà du mur', 'Science-fiction', 10, 'Sous le choc, Tris et Quatre doivent fuir et franchir le mur encerclant Chicago. Pour la première fois, ils quittent la seule ville et famille qu\'ils aient connues. Au delà du mur se trouve un monde hostile qu\'ils vont devoir affronter. Tris et Quatre doivent rapidement déterminer en qui ils peuvent avoir confiance alors qu\'une bataille menaçant l\'humanité toute entière est sur le point d\'éclater.', 2016, 'Divergente3.jpg'),
(5, 'Fury', 'Guerre', 11, 'En avril 1945, les Alliés mènent leur ultime offensive en Europe. À bord d\'un tank Sherman, le sergent Wardaddy et ses quatre hommes s\'engagent dans une mission à très haut risque bien au-delà des lignes ennemies. Face à un adversaire dont le nombre et la puissance de feu les dépassent, Wardaddy et son équipage vont devoir tout tenter pour frapper l\'Allemagne nazie en plein coeur.', 2014, 'fury.jpg'),
(6, 'Les Gardiens de la Galaxie', 'Science-fiction', 12, 'Peter Quill est un aventurier traqué par tous les chasseurs de primes pour avoir volé un mystérieux globe convoité par le puissant Ronan, dont les agissements menacent l\'univers tout entier. Lorsqu\'il découvre le véritable pouvoir de ce globe et la menace qui pèse sur la galaxie, il conclut une alliance fragile avec quatre extraterrestres disparates.', 2014, 'Gardiens de la galaxie.jpg'),
(7, 'Ready Player One', 'Science-fiction', 13, 'En 2045, le monde est en proie à de nombreux soucis : crise énergétique, désastres causés par le changement climatique, la famine, la pauvreté, la guerre, etc. Dans ce monde chaotique, l\'Oasis est un système mondial de réalité virtuelle, accessible par l\'intermédiaire de casques de réalité virtuelle et de dispositifs haptiques tels que des gants et des combinaisons. Conçu à l\'origine comme un MMORPG, il est devenu au fil du temps une société virtuelle dont toute l\'humanité se sert comme exutoire.', 2018, 'Ready_player_one.jpg'),
(8, 'Seul sur Mars', 'Science-fiction', 14, 'Lors d\'une expédition sur Mars, l\'astronaute Mark Watney est laissé pour mort par ses coéquipiers, une tempête les ayant obligés à décoller en urgence. Mark a survécu et il est désormais seul, sans moyen de repartir, sur une planète hostile. Il va devoir faire appel à son intelligence et son ingéniosité pour tenter de survivre et trouver un moyen de contacter la Terre.', 2015, 'Seul_sur_mars.jpg'),
(9, 'Sword Art Online:Ordinal Scale', 'Science-fiction', 9, 'Le film se passe en 2026, 4 ans après la sortie du Nerve Gear, un casque qui permet de guider un avatar dans un monde virtuel. Une nouvelle machine qui se veut concurrente au Nerve Gear, l\'Augma vient d\'être développé et son principe ne repose pas sur le full dive, mais sur la réalité augmentée pour immerger les joueurs dans le jeu. Il est sécurisé, ergonomique et laisse les utilisateurs l\'utiliser quand ils sont conscients, il bat les records du Nerve Gear. Un des jeux proposés se nomme « Ordinal Scale », un jeu de rôle massivement multijoueur en réalité augmentée (abrégé en ARMMORPG). Asuna et ses amis y jouent depuis un moment, mais quand Kirito décide de les rejoindre, ils vont se rendre compte que le jeu n\'est pas aussi amusant qu\'il en a l\'air, notamment à cause d\'anciens directeurs de SAO qui ont décidé de saboter le jeu.', 2017, 'sword_art_online.jpg');

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
