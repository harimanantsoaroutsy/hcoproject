-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 11 Septembre 2017 à 04:48
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `annuairedb`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_categorie` varchar(50) NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_categorie`),
  KEY `id_parent` (`id_parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `libelle_categorie`, `id_parent`) VALUES
(1, 'categories', NULL),
(63, 'vetements', 1),
(64, 'produits de beautÃ©', 1),
(65, 'accessoires', 1),
(66, 'pantalons', 63),
(67, 'vestes', 63),
(68, 'pull-over', 67),
(69, 'manteau', 67),
(70, 'cremes', 64),
(71, 'sacs', 65);

-- --------------------------------------------------------

--
-- Structure de la table `fiche`
--

CREATE TABLE IF NOT EXISTS `fiche` (
  `id_fiche` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_fiche` varchar(50) NOT NULL,
  `description_fiche` varchar(200) NOT NULL,
  PRIMARY KEY (`id_fiche`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `fiche`
--

INSERT INTO `fiche` (`id_fiche`, `libelle_fiche`, `description_fiche`) VALUES
(1, 'slim jean', 'taille 40, made in italia, couleur bleu'),
(2, 'Combinaison hiver', 'pour femme, prix:200 000 ar'),
(3, 'collier en argent', '10 grammes, avec pendentif');

-- --------------------------------------------------------

--
-- Structure de la table `lien_categ_fiche`
--

CREATE TABLE IF NOT EXISTS `lien_categ_fiche` (
  `id_categorie` int(11) NOT NULL,
  `id_fiche` int(11) NOT NULL,
  PRIMARY KEY (`id_categorie`,`id_fiche`),
  KEY `id_fiche` (`id_fiche`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lien_categ_fiche`
--

INSERT INTO `lien_categ_fiche` (`id_categorie`, `id_fiche`) VALUES
(66, 1),
(66, 2),
(68, 2),
(65, 3);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `categorie_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lien_categ_fiche`
--
ALTER TABLE `lien_categ_fiche`
  ADD CONSTRAINT `lien_categ_fiche_ibfk_3` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lien_categ_fiche_ibfk_2` FOREIGN KEY (`id_fiche`) REFERENCES `fiche` (`id_fiche`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
