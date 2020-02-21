-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 21 fév. 2020 à 14:18
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `combio`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `nom` varchar(255) NOT NULL,
  `mdpass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`nom`, `mdpass`) VALUES
('paulem', 'paulem13'),
('emmanuelle', 'emmanuelle');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `codecateg` int(11) NOT NULL,
  `libelle` varchar(7) NOT NULL,
  `nomcatego` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`codecateg`, `libelle`, `nomcatego`) VALUES
(1, 'BTE', 'beaute'),
(2, 'CMP', 'complement'),
(3, 'FRT', 'fruits'),
(4, 'LEG', 'legumes'),
(5, 'SNT', 'sante');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `noclient` int(11) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `prenoms` varchar(25) NOT NULL,
  `mdpass` varchar(255) NOT NULL,
  `ville` varchar(25) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `cli_parrain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`noclient`, `nom`, `prenoms`, `mdpass`, `ville`, `contact`, `cli_parrain`) VALUES
(1, 'konan', 'yves', '123456', 'abidjan', '05010203', 0),
(2, 'sylla', 'moussa', '123456', 'abidjan', '07072121', 1),
(3, 'zoma', 'sylvie', '123456', 'bingerville', '01213104', 1),
(4, 'konan', 'yao', '123456', 'bouake', '77211615', 1),
(5, 'ibn', 'ali', '123456', 'bouafle', '56660166', 5),
(6, 'digbeu', 'valerie', '123456', 'gagnoa', '66015666', 2),
(7, 'yobouet', 'pierre', '123456', 'touba', '45412103', 2),
(8, 'nanti', 'lou', '123456', 'bouafle', '66511213', 2),
(9, 'essis', 'jean', '123456', 'dabou', '51211251', 3),
(10, 'akre', 'noelle', '123456', 'abidjan', '07758543', 1),
(11, 'adje', 'audrey', '123456', 'abidjan', '02765466', 1),
(12, 'konan', 'narcisse', '123456', 'yakro', '09761698', 5),
(13, 'aaaa', 'aaaaaaaaaa', '4e079d0555e5a2b460969c789d3ad968a795921f', 'aaaaaaa', '01254578', 2),
(14, 'amichia', 'christian', 'b7ed088190c204b31cd71484e6a1c538986b5f77', 'dabakala', '05174589', 3),
(15, 'amichia', 'christiano', 'ced5b6909a3c10c9ff7c7fd2a4ffb391d9adf3bf', 'dabakalala', '05123578', 2),
(16, 'souleymanne', 'diarrassouba', 'c984aed014aec7623a54f0591da07a85fd4b762d', 'dabakalala', '78451236', 2);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `nocommande` int(11) NOT NULL,
  `datecom` date NOT NULL,
  `adressedelivraison` text NOT NULL,
  `noclient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`nocommande`, `datecom`, `adressedelivraison`, `noclient`) VALUES
(1, '2014-05-09', '01 BP 1238 ABIDJAN 01', 1),
(2, '2012-01-27', '22 BP 56 ABIDJAN 22', 2),
(3, '2013-03-29', '28 BP 1189 ABIDJAN 28', 10),
(4, '2013-06-16', '01 BP 345 BOUAKE 01', 4),
(5, '2013-01-30', '22 BP 56 ABIDJAN 22', 2),
(6, '2020-01-30', ' BP ABIDJAN 457', 14),
(7, '2020-01-30', ' BP ABIDJAN 457', 14);

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE `contenir` (
  `nocommande` int(11) NOT NULL,
  `refproduit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prixvente` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contenir`
--

INSERT INTO `contenir` (`nocommande`, `refproduit`, `quantite`, `prixvente`) VALUES
(1, 1, 5, 15000),
(1, 2, 10, 20000),
(2, 2, 10, 800),
(2, 4, 15, 2000),
(2, 5, 11, 3500),
(3, 2, 15, 800),
(3, 7, 21, 8000),
(3, 8, 10, 16000),
(4, 1, 3, 27000),
(4, 5, 15, 9500),
(4, 6, 10, 4500),
(5, 1, 25, 20000),
(5, 2, 2, 700),
(5, 5, 12, 3500);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `refproduits` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `prixvente` int(11) NOT NULL,
  `codecateg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`refproduits`, `libelle`, `prixvente`, `codecateg`) VALUES
(1, 'GRAINE DE NIGER', 30000, 0),
(2, 'TISANE DE CITRONNELLE', 700, 0),
(3, 'BOITE DE SPIRULINE', 4500, 0),
(4, 'SIROP D\'AGAVE', 3500, 0),
(5, 'HUILE D\'ARGAN 200ml', 9000, 0),
(6, 'BOITE DEGRAINEDEMORINGA', 5000, 0),
(7, 'MANGOUSTINE SACHET 1KG', 8000, 0),
(8, 'AILSANSODEUR BT 50 CP', 15000, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`codecateg`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`noclient`),
  ADD KEY `client_index` (`noclient`),
  ADD KEY `ville_index` (`ville`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`nocommande`),
  ADD KEY `com_index` (`noclient`);

--
-- Index pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD PRIMARY KEY (`nocommande`,`refproduit`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`refproduits`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `codecateg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `noclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `nocommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `refproduits` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
