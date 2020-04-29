-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 29 avr. 2020 à 11:32
-- Version du serveur :  10.4.10-MariaDB
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
-- Base de données :  `livequestion`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `Id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle_categorie` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`Id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`Id_categorie`, `Libelle_categorie`) VALUES
(1, 'automobile'),
(2, 'pop culture'),
(3, 'art'),
(4, 'nature'),
(5, 'cuisine'),
(6, 'sciences');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `Id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo_profil` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Mail_profil` varchar(255) CHARACTER SET latin1 NOT NULL,
  `MotDePasse_profil` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Genre_profil` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Id_role` int(11) NOT NULL,
  `Image_profil` varchar(255) NOT NULL DEFAULT 'https://i2.wp.com/yellowsummary.com/wp-content/uploads/2019/02/Icone-profil.png?fit=512%2C512&ssl=1',
  PRIMARY KEY (`Id_profil`),
  KEY `#Id_role` (`Id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`Id_profil`, `Pseudo_profil`, `Mail_profil`, `MotDePasse_profil`, `Genre_profil`, `Id_role`, `Image_profil`) VALUES
(18, 'leo', 'bruantleo@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'homme', 1, 'https://avatars2.githubusercontent.com/u/61012951?s=460&u=057e23579f8f75c5c9b91614525bb4fdb639b4ab&v=4'),
(20, 'leo2', 'lespectredu95470@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'homme', 1, 'https://image.jeuxvideo.com/medias-md/154893/1548929641-1624-card.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `Id_question` int(11) NOT NULL AUTO_INCREMENT,
  `Titre_question` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Date_creation_question` date NOT NULL,
  `Id_profil` int(11) NOT NULL,
  `Id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`Id_question`),
  KEY `#Id_profil` (`Id_profil`),
  KEY `#Id_categorie` (`Id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`Id_question`, `Titre_question`, `Date_creation_question`, `Id_profil`, `Id_categorie`) VALUES
(16, 'question test', '2020-04-27', 18, 1),
(19, 'deuxieme question test', '2020-04-27', 20, 1),
(20, '3eme question test', '2020-04-27', 20, 1),
(21, '4eme question test', '2020-04-27', 20, 2);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `Id_reponse` int(11) NOT NULL AUTO_INCREMENT,
  `Contenu_reponse` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Date_reponse` date NOT NULL,
  `Id_profil` int(11) NOT NULL,
  `Id_question` int(11) NOT NULL,
  PRIMARY KEY (`Id_reponse`),
  KEY `#Id_profil` (`Id_profil`),
  KEY `#Id_question` (`Id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`Id_reponse`, `Contenu_reponse`, `Date_reponse`, `Id_profil`, `Id_question`) VALUES
(0, 'reponse test', '2020-04-27', 18, 16),
(1, 'deuxieme reponse test', '2020-04-27', 18, 16),
(2, '3eme reponse test', '2020-04-27', 18, 16),
(3, 'reponse de leo', '2020-04-27', 20, 16),
(11, 'reponse test', '2020-04-28', 20, 20),
(12, 'test', '2020-04-28', 20, 20),
(13, 'reponse test', '2020-04-28', 20, 20),
(14, 'test', '2020-04-28', 20, 20),
(15, 'encore test', '2020-04-28', 20, 20),
(16, 'encore test desolÃ©', '2020-04-28', 20, 20),
(17, 'test test test', '2020-04-28', 20, 19),
(18, 'et oui encore un test', '2020-04-28', 18, 19),
(19, 'tout fonctionne', '2020-04-28', 18, 21);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `Id_role` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle_role` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`Id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`Id_role`, `Libelle_role`) VALUES
(1, 'utilisateur'),
(2, 'administrateur');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `FK_#Id_role` FOREIGN KEY (`Id_role`) REFERENCES `role` (`Id_role`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `FK_#Id_categorie` FOREIGN KEY (`Id_categorie`) REFERENCES `categorie` (`Id_categorie`),
  ADD CONSTRAINT `FK_#Id_profil` FOREIGN KEY (`Id_profil`) REFERENCES `profil` (`Id_profil`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `FK_#Id_profil2` FOREIGN KEY (`Id_profil`) REFERENCES `profil` (`Id_profil`),
  ADD CONSTRAINT `FK_#Id_question` FOREIGN KEY (`Id_question`) REFERENCES `question` (`Id_question`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
