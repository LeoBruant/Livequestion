-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 27 juin 2020 à 21:18
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
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `Id_like` int(11) NOT NULL AUTO_INCREMENT,
  `Id_question` int(11) NOT NULL,
  `Id_likeur` int(11) NOT NULL,
  PRIMARY KEY (`Id_like`),
  KEY `Id_question` (`Id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`Id_like`, `Id_question`, `Id_likeur`) VALUES
(16, 605, 20),
(27, 620, 18),
(28, 624, 18),
(29, 629, 18),
(30, 618, 18),
(44, 605, 18),
(47, 16, 18);

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`Id_profil`, `Pseudo_profil`, `Mail_profil`, `MotDePasse_profil`, `Genre_profil`, `Id_role`, `Image_profil`) VALUES
(18, 'leo', 'bruantleo@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'homme', 1, 'https://avatars2.githubusercontent.com/u/61012951?s=460&u=057e23579f8f75c5c9b91614525bb4fdb639b4ab&v=4'),
(20, 'leo2', 'lespectredu95470@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'homme', 1, 'https://image.jeuxvideo.com/medias-md/154893/1548929641-1624-card.jpg'),
(21, 'leo3', 'lespectredu95@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'homme', 1, 'https://i2.wp.com/yellowsummary.com/wp-content/uploads/2019/02/Icone-profil.png?fit=512%2C512&ssl=1');

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
  `Amis_seulement` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`Id_question`),
  KEY `#Id_profil` (`Id_profil`),
  KEY `#Id_categorie` (`Id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`Id_question`, `Titre_question`, `Date_creation_question`, `Id_profil`, `Id_categorie`, `Amis_seulement`) VALUES
(16, 'question test', '2020-04-27', 18, 1, 0),
(19, 'deuxieme question test', '2020-04-27', 20, 1, 0),
(20, '3eme question test', '2020-04-27', 20, 1, 0),
(21, '4eme question test', '2020-04-27', 20, 2, 0),
(22, 'question test', '2020-04-27', 18, 1, 0),
(23, 'deuxieme question test', '2020-04-27', 20, 1, 0),
(24, '3eme question test', '2020-04-27', 20, 1, 0),
(25, '4eme question test', '2020-04-27', 20, 2, 0),
(26, 'question test', '2020-04-27', 18, 1, 0),
(27, 'deuxieme question test', '2020-04-27', 20, 1, 0),
(28, '3eme question test', '2020-04-27', 20, 1, 0),
(29, '4eme question test', '2020-04-27', 20, 2, 0),
(30, 'question test', '2020-04-27', 18, 1, 0),
(31, 'deuxieme question test', '2020-04-27', 20, 1, 0),
(32, '3eme question test', '2020-04-27', 20, 1, 0),
(33, '4eme question test', '2020-04-27', 20, 2, 0),
(34, 'question test', '2020-04-27', 18, 1, 0),
(35, 'deuxieme question test', '2020-04-27', 20, 1, 0),
(36, '3eme question test', '2020-04-27', 20, 1, 0),
(37, '4eme question test', '2020-04-27', 20, 2, 0),
(38, 'question test', '2020-04-27', 18, 1, 0),
(39, 'deuxieme question test', '2020-04-27', 20, 1, 0),
(40, '3eme question test', '2020-04-27', 20, 1, 0),
(41, '4eme question test', '2020-04-27', 20, 2, 0),
(42, 'question test', '2020-04-27', 18, 1, 0),
(43, 'deuxieme question test', '2020-04-27', 20, 1, 0),
(44, '3eme question test', '2020-04-27', 20, 1, 0),
(45, '4eme question test', '2020-04-27', 20, 2, 0),
(46, 'question test', '2020-04-27', 18, 1, 0),
(47, 'deuxieme question test', '2020-04-27', 20, 1, 0),
(48, '3eme question test', '2020-04-27', 20, 1, 0),
(49, '4eme question test', '2020-04-27', 20, 2, 0),
(50, 'zefiugb', '2020-06-24', 18, 1, 0),
(51, 'question pour mes amis', '2020-06-27', 18, 5, 1),
(52, 'yukyliul', '2020-06-27', 18, 3, 0);

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
-- Structure de la table `requete`
--

DROP TABLE IF EXISTS `requete`;
CREATE TABLE IF NOT EXISTS `requete` (
  `Id_requete` int(11) NOT NULL AUTO_INCREMENT,
  `Status_requete` varchar(255) NOT NULL DEFAULT 'attente',
  `Id_envoyeur` int(11) NOT NULL,
  `Id_receveur` int(11) NOT NULL,
  PRIMARY KEY (`Id_requete`),
  KEY `Id_envoyeur` (`Id_envoyeur`),
  KEY `Id_receveur` (`Id_receveur`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `requete`
--

INSERT INTO `requete` (`Id_requete`, `Status_requete`, `Id_envoyeur`, `Id_receveur`) VALUES
(14, 'acceptee', 20, 18),
(18, 'acceptee', 18, 21),
(25, 'acceptee', 20, 21);

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

--
-- Contraintes pour la table `requete`
--
ALTER TABLE `requete`
  ADD CONSTRAINT `requete_ibfk_1` FOREIGN KEY (`Id_envoyeur`) REFERENCES `profil` (`Id_profil`),
  ADD CONSTRAINT `requete_ibfk_2` FOREIGN KEY (`Id_receveur`) REFERENCES `profil` (`Id_profil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
