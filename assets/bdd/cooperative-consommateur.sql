-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 15 sep. 2023 à 13:15
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cooperative-consommateur`
--

-- --------------------------------------------------------

--
-- Structure de la table `adhérent`
--

DROP TABLE IF EXISTS `adhérent`;
CREATE TABLE IF NOT EXISTS `adhérent` (
  `IADHER` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `NPRADH` varchar(50) NOT NULL,
  `TADHER` varchar(50) NOT NULL,
  `MADHER` varchar(50) NOT NULL,
  `APOADH` varchar(256) NOT NULL,
  `CGPLAD` varchar(50) NOT NULL,
  `DPRADH` date NOT NULL,
  `DDADH` date DEFAULT NULL,
  PRIMARY KEY (`IADHER`),
  UNIQUE KEY `IADHER` (`IADHER`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `concerner`
--

DROP TABLE IF EXISTS `concerner`;
CREATE TABLE IF NOT EXISTS `concerner` (
  `IPRODDU` int NOT NULL,
  `IPRELE` int NOT NULL,
  `QPRPRE` decimal(15,2) NOT NULL,
  `PUNPPR` decimal(10,2) NOT NULL,
  PRIMARY KEY (`IPRODDU`,`IPRELE`),
  KEY `IPRELE` (`IPRELE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mode_reglement`
--

DROP TABLE IF EXISTS `mode_reglement`;
CREATE TABLE IF NOT EXISTS `mode_reglement` (
  `IMOREG` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `DMOREG` varchar(50) NOT NULL,
  PRIMARY KEY (`IMOREG`),
  UNIQUE KEY `IMOREG` (`IMOREG`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prelevement`
--

DROP TABLE IF EXISTS `prelevement`;
CREATE TABLE IF NOT EXISTS `prelevement` (
  `IPRELE` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `DPRELE` date NOT NULL,
  `MTOPRE` decimal(10,2) NOT NULL,
  `IREGLE` int NOT NULL,
  `IADHER` int NOT NULL,
  PRIMARY KEY (`IPRELE`),
  UNIQUE KEY `IPRELE` (`IPRELE`),
  KEY `IREGLE` (`IREGLE`),
  KEY `IADHER` (`IADHER`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `producteur`
--

DROP TABLE IF EXISTS `producteur`;
CREATE TABLE IF NOT EXISTS `producteur` (
  `IPRODU` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `RSOPRO` varchar(50) NOT NULL,
  `NPRRES` varchar(50) NOT NULL,
  `TPRODU` varchar(50) NOT NULL,
  `MPRODU` varchar(50) NOT NULL,
  `APOPRO` varchar(256) NOT NULL,
  `CGPPRO` varchar(50) NOT NULL,
  PRIMARY KEY (`IPRODU`),
  UNIQUE KEY `IPRODU` (`IPRODU`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `producteur`
--

INSERT INTO `producteur` (`IPRODU`, `RSOPRO`, `NPRRES`, `TPRODU`, `MPRODU`, `APOPRO`, `CGPPRO`) VALUES
(3, 'Ferme de la ', 'Jean Dupont', '01 23 4589', 'jean.dupont@felaprairie.com', '123, Rue des Champs, 75001 Paris', '48.859784, 2.5'),
(4, 'BioFruits', 'Marie Martin', '02 34 56 78 90', 'marie.martin@biofruits.com', '456, Chemin des Vergers, 31000 Toulouse', ' 43.602075, 1.441674'),
(5, 'La Ferme du Soleil', 'Antoine Lecl', '03 45 67 89 01', 'antoine.leclerc@fermedusoleil.fr', '789, Route de la Campagne, 69002 Lyon', '45.750000, 4.850000'),
(6, 'Fromagerie des Collines', 'Isabelle Dubois', '04 56 78 90 12', 'isabelle.dubois@fromageriedescollines.com', '234, Rue des Fromages, 13003 Marseille', '43.298611, 5.383056'),
(7, 'Ferme de la Colline', 'Jean Dupont', '123-456-7890', 'jean@fermedelacolline.com', '123 Rue de la Colline', '45.678,-72.345'),
(8, 'La Ferme du Soleil', 'Marie Tremblay', '987-654-3210', 'marie@fermedusoleil.com', '456 Avenue du Soleil', '46.123,-73.456'),
(9, 'Ferme BioNature', 'Paul Martin', '555-123-4567', 'paul@fermebionature.com', '789 Chemin de la Ferme', '47.789,-71.234'),
(10, 'Les Jardins Verts', 'Sophie Leclerc', '111-222-3333', 'sophie@lesjardinsverts.com', '567 Rue des Jardins', '48.345,-70.456'),
(11, 'Ferme Étoile', 'Lucie Girard', '999-888-7777', 'lucie@fermeetole.com', '890 Avenue de l\'Étoile', '49.567,-69.789'),
(12, 'Le Potager Bio', 'François Dubois', '444-555-6666', 'francois@lepotagerbio.com', '123 Rue du Potager', '50.123,-68.345'),
(13, 'Ferme du Bonheur', 'Isabelle Lambert', '777-666-5555', 'isabelle@fermedubonheur.com', '456 Avenue du Bonheur', '51.234,-67.123'),
(14, 'La Petite Ferme', 'Philippe Tremblay', '222-333-4444', 'philippe@lapetiteferme.com', '789 Chemin de la Petite Ferme', '52.456,-66.234'),
(15, 'Ferme Ensoleillée', 'Marcelle Lavoie', '333-444-5555', 'marcelle@fermeensoleillee.com', '890 Rue de l\'Ensoleillement', '53.678,-65.345'),
(16, 'Le Verger du Bonheur', 'Claire Bergeron', '666-555-4444', 'claire@levergerdubonheur.com', '567 Chemin du Verger', '54.789,-64.456');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `IPRODDU` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `DPRODU` varchar(50) NOT NULL,
  `PUVEN` decimal(10,2) NOT NULL,
  `ISAISO` int NOT NULL,
  `ITYPRO` int NOT NULL,
  PRIMARY KEY (`IPRODDU`),
  KEY `ISAISO` (`ISAISO`),
  KEY `ITYPRO` (`ITYPRO`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`IPRODDU`, `DPRODU`, `PUVEN`, `ISAISO`, `ITYPRO`) VALUES
(6, 'Légumes bio', '2.99', 0, 0),
(3, 'Tomate', '1.40', 0, 0),
(4, 'Banane', '2.30', 0, 0),
(5, 'Courgette', '5.20', 0, 0),
(7, 'Œufs frais', '3.49', 0, 0),
(8, 'Fromage de chèvre', '5.99', 0, 0),
(9, 'Miel artisanal', '7.99', 0, 0),
(10, 'Pain de campagne', '3.99', 0, 0),
(11, 'Pommes bio', '2.49', 0, 0),
(12, 'Yaourts fermiers', '4.99', 0, 0),
(13, 'Jus de pomme pressé', '4.49', 0, 0),
(14, 'Poulet fermier', '8.99', 0, 0),
(15, 'Tomates anciennes', '3.99', 0, 0),
(16, 'Confiture maison', '4.49', 0, 0),
(17, 'Poisson d\'eau douce', '6.99', 0, 0),
(18, 'Lait cru', '2.99', 0, 0),
(19, 'Champignons bio', '5.49', 0, 0),
(20, 'Miel de lavande', '8.49', 0, 0),
(21, 'Pain aux céréales', '4.99', 0, 0),
(22, 'Carottes bio', '2.49', 0, 0),
(23, 'Fromage de brebis', '6.49', 0, 0),
(24, 'Noix du verger', '7.49', 0, 0),
(25, 'Agneau de pâturage', '9.99', 0, 0),
(26, 'Légumes bio', '2.99', 0, 0),
(27, 'Œufs frais', '3.49', 0, 0),
(28, 'Fromage de chèvre', '5.99', 0, 0),
(29, 'Miel artisanal', '7.99', 0, 0),
(30, 'Pain de campagne', '3.99', 0, 0),
(31, 'Pommes bio', '2.49', 0, 0),
(32, 'Yaourts fermiers', '4.99', 0, 0),
(33, 'Jus de pomme pressé', '4.49', 0, 0),
(34, 'Poulet fermier', '8.99', 0, 0),
(35, 'Tomates anciennes', '3.99', 0, 0),
(36, 'Confiture maison', '4.49', 0, 0),
(37, 'Poisson d\'eau douce', '6.99', 0, 0),
(38, 'Lait cru', '2.99', 0, 0),
(39, 'Champignons bio', '5.49', 0, 0),
(40, 'Miel de lavande', '8.49', 0, 0),
(41, 'Pain aux céréales', '4.99', 0, 0),
(42, 'Carottes bio', '2.49', 0, 0),
(43, 'Fromage de brebis', '6.49', 0, 0),
(44, 'Noix du verger', '7.49', 0, 0),
(45, 'Agneau de pâturage', '9.99', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `proposer`
--

DROP TABLE IF EXISTS `proposer`;
CREATE TABLE IF NOT EXISTS `proposer` (
  `IPRODDU` int NOT NULL,
  `IPRODU` int NOT NULL,
  `IPRPRO` varchar(50) NOT NULL,
  `DPRPRO` varchar(50) NOT NULL,
  `PROPRO` decimal(10,2) NOT NULL,
  `DMOPRI` date NOT NULL,
  PRIMARY KEY (`IPRODDU`,`IPRODU`),
  KEY `IPRODU` (`IPRODU`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `réglement`
--

DROP TABLE IF EXISTS `réglement`;
CREATE TABLE IF NOT EXISTS `réglement` (
  `IREGLE` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `DREGL` date NOT NULL,
  `MREGLE` decimal(10,2) NOT NULL,
  `IMOREG` int NOT NULL,
  PRIMARY KEY (`IREGLE`),
  UNIQUE KEY `IREGLE` (`IREGLE`),
  KEY `IMOREG` (`IMOREG`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `saison`
--

DROP TABLE IF EXISTS `saison`;
CREATE TABLE IF NOT EXISTS `saison` (
  `ISAISO` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `NSAISO` varchar(50) NOT NULL,
  `DDESAI` date NOT NULL,
  `DFISAI` date NOT NULL,
  PRIMARY KEY (`ISAISO`),
  UNIQUE KEY `ISAISO` (`ISAISO`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `saison`
--

INSERT INTO `saison` (`ISAISO`, `NSAISO`, `DDESAI`, `DFISAI`) VALUES
(1, 'été', '2023-09-04', '2023-09-15'),
(2, 'été', '2023-09-14', '2023-09-30');

-- --------------------------------------------------------

--
-- Structure de la table `type_de_produit`
--

DROP TABLE IF EXISTS `type_de_produit`;
CREATE TABLE IF NOT EXISTS `type_de_produit` (
  `ITYPRO` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `DTYPRO` varchar(50) NOT NULL,
  PRIMARY KEY (`ITYPRO`),
  UNIQUE KEY `ITYPRO` (`ITYPRO`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `type_de_produit`
--

INSERT INTO `type_de_produit` (`ITYPRO`, `DTYPRO`) VALUES
(36, 'Fruit a coque'),
(35, 'Fruit sec'),
(34, 'Fruit'),
(33, 'Légum');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
