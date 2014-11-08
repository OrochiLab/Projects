-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 08 Novembre 2014 à 00:23
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `demande_scolarite`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `prenom`, `login`, `password`) VALUES
(1, 'Morabit', 'Mouad', 'yunho', 'lolilol');

-- --------------------------------------------------------

--
-- Structure de la table `correction`
--

CREATE TABLE IF NOT EXISTS `correction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_demandec` datetime NOT NULL,
  `cin` varchar(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `cne` varchar(10) NOT NULL,
  `etat` enum('Attente','Valide','Refus') NOT NULL DEFAULT 'Attente',
  PRIMARY KEY (`id`),
  KEY `cne` (`cne`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `correction`
--

INSERT INTO `correction` (`id`, `date_demandec`, `cin`, `nom`, `prenom`, `date_naissance`, `email`, `cne`, `etat`) VALUES
(7, '2014-11-07 22:41:51', 'BK275058', 'Morabit Yunho', 'Mouad', '1993-08-11', 'mouad2005@hotmail.com', '1129377653', 'Valide');

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE IF NOT EXISTS `demande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_demande` datetime NOT NULL,
  `CNE` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `CNE` (`CNE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `demande`
--

INSERT INTO `demande` (`id`, `date_demande`, `CNE`) VALUES
(9, '2014-10-14 01:09:08', '1129377653'),
(10, '2014-11-07 14:02:42', '1129294913'),
(11, '2014-11-07 00:00:00', '1129377653'),
(12, '2014-11-07 00:00:00', '1129377640'),
(13, '2014-11-07 00:00:00', '1129377642'),
(14, '2014-11-07 15:57:55', '1129377641'),
(15, '2014-11-01 00:00:00', '1129377642');

-- --------------------------------------------------------

--
-- Structure de la table `element_module`
--

CREATE TABLE IF NOT EXISTS `element_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `id_mod` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_mod` (`id_mod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `CNE` varchar(10) NOT NULL,
  `CIN` varchar(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `id_fil` varchar(4) NOT NULL,
  PRIMARY KEY (`CNE`),
  UNIQUE KEY `CIN` (`CIN`),
  KEY `id_fil` (`id_fil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`CNE`, `CIN`, `nom`, `prenom`, `date_naissance`, `id_fil`) VALUES
('1129294913', 'wa202424', 'Ouasmine', 'Mohammed Amine', '1992-12-03', 'GI'),
('1129377640', 'AB123456', 'Zine', 'Imane', '1992-04-07', 'GE'),
('1129377641', 'AB234567', 'Zine', 'Omar', '1993-11-10', 'GRT'),
('1129377642', 'AB345678', 'Hamza', 'Kacimi', '1992-11-03', 'GP'),
('1129377643', 'AB567891', 'Yassine', 'Hasnaoui', '1993-11-20', 'GI'),
('1129377653', 'BK275058', 'Morabit', 'Mouad', '1993-08-11', 'GI');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE IF NOT EXISTS `filiere` (
  `id` varchar(4) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `libelle` (`libelle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `filiere`
--

INSERT INTO `filiere` (`id`, `libelle`) VALUES
('GP', 'Genie des procedes'),
('GE', 'Genie Electrique'),
('GI', 'Genie Informatique'),
('GRT', 'Genie Reseaux Telecoms');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `id_sem` int(11) NOT NULL,
  `id_fil` varchar(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sem` (`id_sem`),
  KEY `id_fil` (`id_fil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `semestre`
--

CREATE TABLE IF NOT EXISTS `semestre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `libelle` (`libelle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `validation`
--

CREATE TABLE IF NOT EXISTS `validation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_validation` datetime NOT NULL,
  `id_dem` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `reponse` enum('Valide','Refus','Expire') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_dem` (`id_dem`),
  KEY `id_admin` (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `validation`
--

INSERT INTO `validation` (`id`, `date_validation`, `id_dem`, `id_admin`, `reponse`) VALUES
(15, '2014-11-07 21:00:18', 14, 1, 'Valide'),
(16, '2014-11-07 21:00:21', 10, 1, 'Valide'),
(17, '2014-11-07 21:00:29', 13, 1, 'Valide'),
(18, '2014-11-07 21:00:32', 9, 1, 'Refus'),
(19, '2014-11-07 21:00:40', 11, 1, 'Valide');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `correction`
--
ALTER TABLE `correction`
  ADD CONSTRAINT `correction_ibfk_1` FOREIGN KEY (`cne`) REFERENCES `etudiant` (`CNE`);

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `demande_ibfk_1` FOREIGN KEY (`CNE`) REFERENCES `etudiant` (`CNE`);

--
-- Contraintes pour la table `element_module`
--
ALTER TABLE `element_module`
  ADD CONSTRAINT `element_module_ibfk_1` FOREIGN KEY (`id_mod`) REFERENCES `module` (`id`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`id_fil`) REFERENCES `filiere` (`id`);

--
-- Contraintes pour la table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`id_sem`) REFERENCES `semestre` (`id`),
  ADD CONSTRAINT `module_ibfk_2` FOREIGN KEY (`id_fil`) REFERENCES `filiere` (`id`);

--
-- Contraintes pour la table `validation`
--
ALTER TABLE `validation`
  ADD CONSTRAINT `validation_ibfk_1` FOREIGN KEY (`id_dem`) REFERENCES `demande` (`id`),
  ADD CONSTRAINT `validation_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `administrateur` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
