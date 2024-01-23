- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 23 jan. 2024 à 16:19
-- Version du serveur : 5.7.40
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `flxcars`
--

-- --------------------------------------------------------

--
-- Structure de la table `annees`
--

DROP TABLE IF EXISTS `annees`;
CREATE TABLE IF NOT EXISTS `annees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annees`
--

INSERT INTO `annees` (`id`, `nom`) VALUES
(1, 1900),
(2, 1901),
(3, 1902),
(4, 1903),
(5, 1904),
(6, 1905),
(7, 1906),
(8, 1907),
(9, 1908),
(10, 1909),
(11, 1910),
(12, 1911),
(13, 1912),
(14, 1913),
(15, 1914),
(16, 1915),
(17, 1916),
(18, 1917),
(19, 1918),
(20, 1919),
(21, 1920),
(22, 1921),
(23, 1922),
(24, 1923),
(25, 1924),
(26, 1925),
(27, 1926),
(28, 1927),
(29, 1928),
(30, 1929),
(31, 1930),
(32, 1931),
(33, 1932),
(34, 1933),
(35, 1934),
(36, 1935),
(37, 1936),
(38, 1937),
(39, 1938),
(40, 1939),
(41, 1940),
(42, 1941),
(43, 1942),
(44, 1943),
(45, 1944),
(46, 1945),
(47, 1946),
(48, 1947),
(49, 1948),
(50, 1949),
(51, 1950),
(52, 1951),
(53, 1952),
(54, 1953),
(55, 1954),
(56, 1955),
(57, 1956),
(58, 1957),
(59, 1958),
(60, 1959),
(61, 1960),
(62, 1961),
(63, 1962),
(64, 1963),
(65, 1964),
(66, 1965),
(67, 1966),
(68, 1967),
(69, 1968),
(70, 1969),
(71, 1970),
(72, 1971),
(73, 1972),
(74, 1973),
(75, 1974),
(76, 1975),
(77, 1976),
(78, 1977),
(79, 1978),
(80, 1979),
(81, 1980),
(82, 1981),
(83, 1982),
(84, 1983),
(85, 1984),
(86, 1985),
(87, 1986),
(88, 1987),
(89, 1988),
(90, 1989),
(91, 1990),
(92, 1991),
(93, 1992),
(94, 1993),
(95, 1994),
(96, 1995),
(97, 1996),
(98, 1997),
(99, 1998),
(100, 1999),
(101, 2000),
(102, 2001),
(103, 2002),
(104, 2003),
(105, 2004),
(106, 2005),
(107, 2006),
(108, 2007),
(109, 2008),
(110, 2009),
(111, 2010),
(112, 2011),
(113, 2012),
(114, 2013),
(115, 2014),
(116, 2015),
(117, 2016),
(118, 2017),
(119, 2018),
(120, 2019),
(121, 2020),
(122, 2021),
(123, 2022),
(124, 2023),
(125, 2024),
(126, 2025),
(127, 2026);

-- --------------------------------------------------------

--
-- Structure de la table `constructeurs`
--

DROP TABLE IF EXISTS `constructeurs`;
CREATE TABLE IF NOT EXISTS `constructeurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_pays` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `constructeurs`
--

INSERT INTO `constructeurs` (`id`, `nom`, `image`, `id_pays`, `id_groupe`) VALUES
(1, 'Ford', 'ford.jpg', 4, 3),
(2, 'Bmw', 'bmw.jpg', 2, 4),
(3, 'Mercedes-Benz', 'mercedes_benz.jpg', 2, 5),
(4, 'Renault', 'renault.jpg', 1, 7),
(5, 'Peugeot', 'peugeot.jpg', 1, 1),
(6, 'Alfa Romeo', 'alfa_romeo', 3, 1),
(7, 'Mitsubishi', 'mitsubishi.jpg', 5, 7),
(8, 'Dacia', 'dacia.jpg', 6, 7),
(9, 'Audi', 'audi.jpg', 2, 2),
(10, 'Maserati', 'maserati.jpg', 3, 1),
(14, 'Aston Martin', 'aston_martin.jpg', 7, 0),
(11, 'Nissan', 'nissan.jpg', 5, 7),
(12, 'Ferrari', 'ferrari.jpg', 3, 0),
(13, 'Land Rover', 'land_rover.jpg', 7, 8),
(15, 'Chevrolet', 'chevrolet.jpg', 4, 6),
(16, 'Gmc', 'gmc.jpg', 4, 6),
(18, 'Rolls Royce', 'rolls_royce.jpg', 7, 4),
(19, 'Toyota', 'toyota.jpg', 5, 9);

-- --------------------------------------------------------

--
-- Structure de la table `fiches`
--

DROP TABLE IF EXISTS `fiches`;
CREATE TABLE IF NOT EXISTS `fiches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_constructeur` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_modele` text NOT NULL,
  `id_annee` int(11) NOT NULL,
  `id_segment` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `motorisation` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=143 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fiches`
--

INSERT INTO `fiches` (`id`, `id_constructeur`, `id_type`, `id_modele`, `id_annee`, `id_segment`, `nom`, `resume`, `description`, `motorisation`, `date`, `id_user`, `image`) VALUES
(142, 11, 3, '12', 118, 3, '370z III', 'zaehae zrherzaeh aezrherz aehae zrherzae haezr herzaeh aezrherza ehaez rherza ehaezr herzaehaez rherza ehaezrher', 'herherhreh', 'gzegzegthjej', '2023-08-15 10:36:23', 8, '142_1_370_III'),
(139, 1, 1, '7', 120, 3, 'Focus 4', 'zaehaezrher', 'herherhreh', 'gzegzegthjej', '2023-08-15 10:31:36', 8, '139_1_Focus_4'),
(140, 1, 1, '7', 119, 4, 'Focus 4 SW', 'zaehaezrher', 'herherhreh', 'gzegzegthjej', '2023-08-15 10:32:05', 8, '140_1_Focus_4_SW');

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

DROP TABLE IF EXISTS `groupes`;
CREATE TABLE IF NOT EXISTS `groupes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `groupes`
--

INSERT INTO `groupes` (`id`, `nom`) VALUES
(1, 'Stellantis'),
(2, 'Volkswagen'),
(3, 'Ford'),
(4, 'Bmw'),
(5, 'Daimler'),
(6, 'General Motors'),
(7, 'Renault-Nissan-Mitsubishi'),
(8, 'Tata'),
(9, 'Toyota');

-- --------------------------------------------------------

--
-- Structure de la table `imagesfiche`
--

DROP TABLE IF EXISTS `imagesfiche`;
CREATE TABLE IF NOT EXISTS `imagesfiche` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_1` varchar(255) NOT NULL,
  `img_2` varchar(255) NOT NULL,
  `img_3` varchar(255) NOT NULL,
  `img_4` varchar(255) NOT NULL,
  `img_5` varchar(255) NOT NULL,
  `id_fiche` int(11) NOT NULL,
  `id_modele` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `imagesfiche`
--

INSERT INTO `imagesfiche` (`id`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `id_fiche`, `id_modele`) VALUES
(20, '88_1_M5_F90.jpg', '', '', '', '', 88, 2),
(17, '82_1_208_II.jpg', '', '', '', '', 82, 10),
(18, '139_1_Focus_4.jpg', '139_2_Focus_4.jpg', '139_3_Focus_4.jpg', '139_4_Focus_4.jpg', '139_5_Focus_4.jpg', 139, 7),
(19, '140_1_Focus_4_SW.jpg', '140_2_Focus_4_SW.jpg', '140_3_Focus_4_SW.jpg', '140_4_Focus_4_SW.jpg', '140_5_Focus_4_SW.jpg', 140, 7),
(21, '142_1_370_III.jpg', '', '', '', '', 142, 12);

-- --------------------------------------------------------

--
-- Structure de la table `modeles`
--

DROP TABLE IF EXISTS `modeles`;
CREATE TABLE IF NOT EXISTS `modeles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `id_constructeur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `modeles`
--

INSERT INTO `modeles` (`id`, `nom`, `id_constructeur`) VALUES
(23, 'Sierra', 16),
(22, 'Sandero', 8),
(1, 'Mustang', 1),
(21, 'RS7', 9),
(6, 'Megane', 4),
(2, 'M5', 2),
(7, 'Focus', 1),
(8, 'Gt', 1),
(19, 'Corvette', 15),
(10, '208', 5),
(24, 'AMG GT', 3),
(12, '370z', 11),
(20, 'Rafale', 4),
(14, 'DBS', 14),
(15, 'F8 Tributo', 12),
(16, 'Range Rover', 13),
(17, 'Quattroporte', 10),
(18, 'X6', 2),
(25, 'Lancer Evo', 7),
(26, 'Spectre', 18),
(27, 'Giulia', 6),
(28, 'Supra', 19);

-- --------------------------------------------------------

--
-- Structure de la table `motorisationsessence`
--

DROP TABLE IF EXISTS `motorisationsessence`;
CREATE TABLE IF NOT EXISTS `motorisationsessence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_fiche` int(11) NOT NULL,
  `appellation` varchar(255) NOT NULL,
  `construction` varchar(255) NOT NULL,
  `moteur` varchar(255) NOT NULL,
  `cylindree` varchar(255) NOT NULL,
  `performance` varchar(255) NOT NULL,
  `couple` varchar(255) NOT NULL,
  `0100` varchar(255) NOT NULL,
  `vmax` varchar(255) NOT NULL,
  `conso` varchar(255) NOT NULL,
  `carrosserie` varchar(255) NOT NULL,
  `marche` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `motorisationsgasoil`
--

DROP TABLE IF EXISTS `motorisationsgasoil`;
CREATE TABLE IF NOT EXISTS `motorisationsgasoil` (
  `id` int(11) NOT NULL,
  `id_fiche` int(11) NOT NULL,
  `appellation` varchar(255) NOT NULL,
  `construction` varchar(255) NOT NULL,
  `moteur` varchar(255) NOT NULL,
  `cylindree` varchar(255) NOT NULL,
  `performance` varchar(255) NOT NULL,
  `couple` varchar(255) NOT NULL,
  `0100` varchar(255) NOT NULL,
  `vmax` varchar(255) NOT NULL,
  `conso` varchar(255) NOT NULL,
  `carrosserie` varchar(255) NOT NULL,
  `marche` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `nom`) VALUES
(1, 'France'),
(2, 'Allemagne'),
(3, 'Italie'),
(4, 'Etats-Unis'),
(5, 'Japon'),
(6, 'Roumanie'),
(7, 'Royaume-Uni'),
(8, 'Belgique'),
(9, 'Espagne');

-- --------------------------------------------------------

--
-- Structure de la table `segments`
--

DROP TABLE IF EXISTS `segments`;
CREATE TABLE IF NOT EXISTS `segments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `segments`
--

INSERT INTO `segments` (`id`, `nom`, `image`) VALUES
(1, 'A - Mini', 'mini.png'),
(2, 'B - Sous-compacte', 'sous_compacte.png'),
(3, 'C - Compacte', 'compacte.png'),
(4, 'D - Intermédiaire', 'intermediaire.png'),
(5, 'E - Grosse voiture', 'grosse_voiture'),
(6, 'F - Luxe', ''),
(7, 'G - Fourgonnette', ''),
(8, 'H - Course', '');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `nom`, `image`) VALUES
(1, 'Berline', 'model.png'),
(2, 'Break', 'model.png'),
(3, 'Coupé', 'model.png'),
(4, 'Cabriolet', 'model.png'),
(5, 'Camion', 'model.png'),
(6, 'Crossover', 'model.png'),
(7, 'Fourgon', 'model.png'),
(8, 'Prototype', 'model.png'),
(9, 'Roadster', 'model.png'),
(10, 'Supercar', 'model.png'),
(11, 'Tout-terrrain', 'model.png'),
(12, 'Limousine', 'model.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `prenom`, `nom`, `mail`, `password`) VALUES
(8, 'g', 'g', 'g', 'g', '$2y$10$QPNGvCaKTY8uEzqwWytuSuQcDtBbwjrGo9ZSEpHLeZuSLu6leBbP6');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
