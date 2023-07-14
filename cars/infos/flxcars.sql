-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 14 juil. 2023 à 12:57
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

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
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

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
(126, 2025);

-- --------------------------------------------------------

--
-- Structure de la table `constructeurs`
--

DROP TABLE IF EXISTS `constructeurs`;
CREATE TABLE IF NOT EXISTS `constructeurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `constructeurs`
--

INSERT INTO `constructeurs` (`id`, `nom`) VALUES
(1, 'Ford'),
(2, 'Bmw'),
(3, 'Mercedes'),
(4, 'Renault'),
(5, 'Peugeot'),
(6, 'Alpha Romeo'),
(7, 'Mitsubishi'),
(8, 'Dacia'),
(9, 'Audi'),
(10, 'Maserati'),
(12, 'yo'),
(13, 'g');

-- --------------------------------------------------------

--
-- Structure de la table `fiches`
--

DROP TABLE IF EXISTS `fiches`;
CREATE TABLE IF NOT EXISTS `fiches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_modele` text NOT NULL,
  `nom` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `motorisation` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `id_constructeur` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_annee` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fiches`
--

INSERT INTO `fiches` (`id`, `id_modele`, `nom`, `resume`, `description`, `motorisation`, `image`, `date`, `id_constructeur`, `id_type`, `id_annee`, `id_user`) VALUES
(88, '4', 'M5', 'fsf', 'f', 'f', 'pexels-jae-park-3849554.jpg', '2023-01-08 00:23:07', 3, 9, 8, 8),
(86, '3', 'DB11', 'b', 'b', 'b', 'pexels-bob-ward-3647693.jpg', '2023-01-08 00:22:34', 7, 9, 8, 8),
(87, '4', 'RX9', 'v', 'v', 'v', 'pexels-erik-mclean-12920583.jpg', '2023-01-08 00:22:55', 5, 9, 7, 8),
(81, '1', 'FORD GT', 'f', 'f', 'f', 'pexels-supreet-7633343fff.jpg', '2023-01-08 00:16:23', 5, 12, 7, 8),
(80, '4', 'FERRARI', 'fs', 'f', 'f', 'pexels-supreet-7633343.jpg', '2023-01-08 00:15:42', 7, 10, 6, 8),
(82, '4', '208', 'f', 'f', 'f', '01-peugeot-208-750x410.jpg', '2023-01-08 00:21:01', 5, 10, 6, 8),
(83, '1', 'RANGE', 'g', 'g', 'g', 'blue-jeep-photo-shooting-in-the-sunset.jpg', '2023-01-08 00:21:19', 5, 9, 5, 8),
(89, '5', 'Quattroporte', 'La berline de luxe originale, issue de la course, depuis 1963. Une légende qui ne cesse de nous inspirer.', 'Cette dernière génération de Quattroporte a été présentée officiellement en novembre 2012. Elle sera commercialisée lors du salon de l\'Automobile de Détroit 2013, donc en janvier. Pour l\'été 2016, la Quattroporte sera restylée, avec une carrosserie entièrement en aluminium. La fabrication de cette luxueuse grande routière de sport est assurée dans l\'ancienne usine de la Carrozzeria Bertone de Grugliasco, près de Turin, où le groupe Fiat a réalisé de très importants investissements pour fabriquer ce nouveau modèle ainsi que, au second semestre 2013, sa petite sœur, la Ghibli. La production en série74 a débuté en janvier 2013 pour une commercialisation dès le mois suivant. La firme au trident table sur 12 000 exemplaires annuels.  Les moteurs sont tous deux d\'origine Ferrari. Ils sont entièrement en aluminium. Ils garantissent des accélérations \"foudroyantes\" : 0 à 100 km/h en 4,9 s pour le V6 et 4,5 s pour le V8. La boîte de vitesses est automatique à 8 rapports7.  La Quattroporte 6 fut restylée courant 2016. Elle possède une calandre à barrettes chromées, proche de celle de la Maserati Levante, et un nouveau bouclier, ce qui lui permet aussi de s\'enrichir de deux nouvelles finitions : GranLusso et GranSport8.  En Aout 2020, Maserati dévoile la version TROFEO et le V8 en 580 CV. Une version qui peut atteindre en pointe les 325 km/h.', 'V6 410 ch - propulsion classique, accélération 0 à 100 km/h en 5,1 s, vitesse maxi 285 km/h', 'maserati.jpg', '2023-01-08 12:06:51', 10, 13, 5, 8),
(85, '3', 'X6', 'f', 'f', 'f', 'pexels-auto-records-10054991.jpg', '2023-01-08 00:21:49', 7, 10, 4, 8),
(76, '4', 'CORVETTE', 'g', 'g', 'g', 'pexels-raphael-loquellano-8980830.jpg', '2023-01-08 00:12:57', 3, 10, 4, 8),
(90, '2', 'h', 'h', 'h', 'h', 'mach-1-photo-principale.jpg', '2023-01-08 14:43:01', 5, 10, 3, 8);

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

DROP TABLE IF EXISTS `groupes`;
CREATE TABLE IF NOT EXISTS `groupes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `groupes`
--

INSERT INTO `groupes` (`id`, `nom`) VALUES
(1, 'Stellantis');

-- --------------------------------------------------------

--
-- Structure de la table `modeles`
--

DROP TABLE IF EXISTS `modeles`;
CREATE TABLE IF NOT EXISTS `modeles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `id_constructeur` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `modeles`
--

INSERT INTO `modeles` (`id`, `nom`, `id_constructeur`, `id_type`) VALUES
(1, 'Focus Break', 1, 2),
(3, 'Focus', 1, 1),
(4, 'Focus RS', 1, 3),
(5, 'Quattroporte', 10, 13),
(6, 'Megane', 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `nom`) VALUES
(1, 'France'),
(2, 'Allemagne');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `nom`) VALUES
(1, 'Berline'),
(2, 'Break'),
(3, 'Coupé'),
(4, 'Cabriolet'),
(5, 'Camion'),
(6, 'Crossover'),
(7, 'Fourgon'),
(8, 'Prototype'),
(9, 'Roadster'),
(10, 'Supercar'),
(11, 'Tout-terrrain'),
(12, 'RATIO'),
(13, 'Berline Sportive');

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
