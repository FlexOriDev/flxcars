-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 22 juil. 2023 à 08:19
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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

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
(18, 'Rolls Royce', 'rolls_royce.jpg', 7, 4);

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
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fiches`
--

INSERT INTO `fiches` (`id`, `id_constructeur`, `id_type`, `id_modele`, `id_annee`, `id_segment`, `nom`, `resume`, `description`, `motorisation`, `image`, `date`, `id_user`) VALUES
(88, 2, 12, '2', 120, 4, 'M5 F90', 'fsf', 'f', 'f', 'pexels-jae-park-3849554.jpg', '2023-01-08 00:23:07', 8),
(86, 14, 12, '14', 119, 5, 'DBS Superleggera', 'b', 'b', 'b', 'pexels-bob-ward-3647693.jpg', '2023-01-08 00:22:34', 8),
(87, 11, 9, '12', 118, 4, '370Z III', 'v', 'v', 'v', 'pexels-erik-mclean-12920583.jpg', '2023-01-08 00:22:55', 8),
(81, 1, 10, '8', 118, 8, 'GT II', 'f', 'f', 'f', 'pexels-supreet-7633343fff.jpg', '2023-01-08 00:16:23', 8),
(80, 12, 10, '15', 120, 6, 'F8 Tributo Spider', 'fs', 'f', 'f', 'pexels-supreet-7633343.jpg', '2023-01-08 00:15:42', 8),
(82, 5, 1, '10', 121, 2, '208 II', 'f', 'f', 'f', '01-peugeot-208-750x410.jpg', '2023-01-08 00:21:01', 8),
(83, 13, 6, '16', 114, 5, 'Range Rover Sport', 'g', 'g', 'g', 'blue-jeep-photo-shooting-in-the-sunset.jpg', '2023-01-08 00:21:19', 8),
(89, 10, 1, '17', 117, 4, 'Quattroporte 6', 'La berline de luxe originale, issue de la course, depuis 1963. Une légende qui ne cesse de nous inspirer.', 'Cette dernière génération de Quattroporte a été présentée officiellement en novembre 2012. Elle sera commercialisée lors du salon de l\'Automobile de Détroit 2013, donc en janvier. Pour l\'été 2016, la Quattroporte sera restylée, avec une carrosserie entièrement en aluminium. La fabrication de cette luxueuse grande routière de sport est assurée dans l\'ancienne usine de la Carrozzeria Bertone de Grugliasco, près de Turin, où le groupe Fiat a réalisé de très importants investissements pour fabriquer ce nouveau modèle ainsi que, au second semestre 2013, sa petite sœur, la Ghibli. La production en série74 a débuté en janvier 2013 pour une commercialisation dès le mois suivant. La firme au trident table sur 12 000 exemplaires annuels.  Les moteurs sont tous deux d\'origine Ferrari. Ils sont entièrement en aluminium. Ils garantissent des accélérations \"foudroyantes\" : 0 à 100 km/h en 4,9 s pour le V6 et 4,5 s pour le V8. La boîte de vitesses est automatique à 8 rapports7.  La Quattroporte 6 fut restylée courant 2016. Elle possède une calandre à barrettes chromées, proche de celle de la Maserati Levante, et un nouveau bouclier, ce qui lui permet aussi de s\'enrichir de deux nouvelles finitions : GranLusso et GranSport8.  En Aout 2020, Maserati dévoile la version TROFEO et le V8 en 580 CV. Une version qui peut atteindre en pointe les 325 km/h.', 'V6 410 ch - propulsion classique, accélération 0 à 100 km/h en 5,1 s, vitesse maxi 285 km/h', 'maserati.jpg', '2023-01-08 12:06:51', 8),
(85, 2, 6, '18', 120, 5, 'X6 G06', 'f', 'f', 'f', 'pexels-auto-records-10054991.jpg', '2023-01-08 00:21:49', 8),
(76, 15, 10, '19', 120, 4, 'Corvette C8 Stingray Z51', 'g', 'g', 'g', 'pexels-raphael-loquellano-8980830.jpg', '2023-01-08 00:12:57', 8),
(90, 1, 12, '1', 122, 4, 'Mustang Mach 1', 'h', 'h', 'h', 'mach-1-photo-principale.jpg', '2023-01-08 14:43:01', 8),
(92, 1, 1, '7', 119, 3, 'Focus 4', 'ggggg', 'zgzegz', 'gzegzegthjej', 'Ford-Focus-1.jpg', '2023-07-14 18:33:59', 8),
(94, 4, 6, '6', 123, 3, 'Megane 5', 'egzgzeg', 'zegzegzeg', 'zegzegzg', 'Sans-titre-2.jpg', '2023-07-15 13:10:04', 8),
(95, 4, 6, '20', 123, 5, 'Rafale', 'gegzge', 'gzgezg', 'zgezgzege', 'renautl_rafale.jpg', '2023-07-15 13:19:01', 8),
(96, 9, 12, '21', 120, 4, 'RS7 Sportback', 'zaeruzrjrj', 'fsgdhrtjrtjrtjzrtjrtj', 'erzeczv', 'audi_rs7.jpg', '2023-07-15 13:25:30', 8),
(97, 8, 6, '22', 118, 3, 'Sandero', 'gehehrejzrtjrtj', 'rtjtrjrtjtrjt', 'jrtjtjjj', 'dacia_sandero.jpg', '2023-07-15 13:28:10', 8),
(98, 16, 11, '23', 125, 5, 'Sierra EV', 'zaergaehe', 'rherhearaherh', 'erhaerherhaerherherhe', 'gmc-sierra-ev-denali-2024.webp', '2023-07-15 13:30:54', 8),
(99, 3, 3, '24', 124, 4, 'AMG GT 4', 'zaehaezrher', 'herherhreh', 'rhhhhr', '2023-Mercedes-Benz-AMG-GT63-4-Door-Coupe-1.avif', '2023-07-15 13:34:31', 8),
(100, 7, 1, '25', 116, 4, 'Lancer Evo 10', 'ehaerherhaerhaerh', 'hhehthrhth', 'rthrrjfiktrykty', 'mitsubishi-lancer-evoluttion-final-auction.jpg', '2023-07-15 13:38:03', 8),
(101, 18, 3, '26', 123, 4, 'Spectre', 'eaeerhaerherh', 'erherherherher', 'hrhrhrhhhhhhhhhhh', 'S0-et-en-marge-du-mondial-2022-rolls-royce-spectre-trois-tonnes-de-luxe-electrique-731143.jpg', '2023-07-15 13:40:55', 8),
(102, 6, 1, '27', 121, 4, 'Giulia Quadrifoglio', 'agaezrherherh', 'hzretjhzrtjzrtjrtjrj', 'tjrtjjjjjjjjjj', 'quadrifoglio.jpg', '2023-07-15 13:47:03', 8),
(103, 1, 2, '7', 119, 5, 'Focus 4 SW', 'aergretnheryajery', 'yaeryaretyjajnnryeab', 'aeryjaqeryaerybavretbre', '1.jpg', '2023-07-21 20:35:04', 8);

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
(8, 'Tata');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `imagesfiche`
--

INSERT INTO `imagesfiche` (`id`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `id_fiche`, `id_modele`) VALUES
(1, '92_1_Focus 4', '92_2_Focus 4', '92_3_Focus 4', '92_4_Focus 4', '92_5_Focus 4', 92, 7),
(2, '103_1_Focus 4 SW', '103_2_Focus 4 SW', '103_3_Focus 4 SW', '103_4_Focus 4 SW', '103_5_Focus 4 SW', 103, 7);

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
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

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
(27, 'Giulia', 6);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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
(7, 'Royaume-Uni');

-- --------------------------------------------------------

--
-- Structure de la table `segments`
--

DROP TABLE IF EXISTS `segments`;
CREATE TABLE IF NOT EXISTS `segments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `segments`
--

INSERT INTO `segments` (`id`, `nom`) VALUES
(1, 'A - Mini'),
(2, 'B - Sous-compacte'),
(3, 'C - Compacte'),
(4, 'D - Intermédiaire'),
(5, 'E - Grosse voiture'),
(6, 'F - Luxe'),
(7, 'G - Fourgonnette'),
(8, 'H - Course');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

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
(12, 'Limousine');

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
