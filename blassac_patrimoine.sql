-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 14 déc. 2023 à 12:07
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blassac_patrimoine`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `ID_article` int(11) NOT NULL,
  `Contenue` text DEFAULT NULL,
  `Titre` varchar(50) DEFAULT NULL,
  `Date_article` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `donation`
--

CREATE TABLE `donation` (
  `ID_don` int(11) NOT NULL,
  `Valeur` int(255) NOT NULL DEFAULT 0,
  `Date_don` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `don_objet`
--

CREATE TABLE `don_objet` (
  `ID_donObj` int(11) NOT NULL,
  `Type_objet` varchar(100) DEFAULT NULL,
  `Description` varchar(400) DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `ID_event` int(11) NOT NULL,
  `Date_event` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `link_donation`
--

CREATE TABLE `link_donation` (
  `ID_user` int(11) DEFAULT NULL,
  `ID_don` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `link_donobj`
--

CREATE TABLE `link_donobj` (
  `ID_user` int(11) DEFAULT NULL,
  `ID_donObj` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `link_ecriture`
--

CREATE TABLE `link_ecriture` (
  `ID_user` int(11) DEFAULT NULL,
  `ID_article` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_user` int(11) NOT NULL,
  `Nom_user` varchar(100) DEFAULT NULL,
  `Mdp_user` varchar(100) DEFAULT NULL,
  `IS_Admin` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 si admin\r\n0 si lambda'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ID_article`);

--
-- Index pour la table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`ID_don`);

--
-- Index pour la table `don_objet`
--
ALTER TABLE `don_objet`
  ADD PRIMARY KEY (`ID_donObj`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`ID_event`);

--
-- Index pour la table `link_donation`
--
ALTER TABLE `link_donation`
  ADD KEY `ID_user` (`ID_user`,`ID_don`),
  ADD KEY `ID_don` (`ID_don`);

--
-- Index pour la table `link_donobj`
--
ALTER TABLE `link_donobj`
  ADD KEY `ID_user` (`ID_user`,`ID_donObj`),
  ADD KEY `ID_donObj` (`ID_donObj`);

--
-- Index pour la table `link_ecriture`
--
ALTER TABLE `link_ecriture`
  ADD KEY `ID_user` (`ID_user`,`ID_article`),
  ADD KEY `ID_article` (`ID_article`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `ID_article` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `donation`
--
ALTER TABLE `donation`
  MODIFY `ID_don` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `don_objet`
--
ALTER TABLE `don_objet`
  MODIFY `ID_donObj` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `ID_event` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `link_donation`
--
ALTER TABLE `link_donation`
  ADD CONSTRAINT `link_donation_ibfk_1` FOREIGN KEY (`ID_don`) REFERENCES `donation` (`ID_don`),
  ADD CONSTRAINT `link_donation_ibfk_2` FOREIGN KEY (`ID_user`) REFERENCES `utilisateur` (`ID_user`);

--
-- Contraintes pour la table `link_donobj`
--
ALTER TABLE `link_donobj`
  ADD CONSTRAINT `link_donobj_ibfk_1` FOREIGN KEY (`ID_donObj`) REFERENCES `don_objet` (`ID_donObj`),
  ADD CONSTRAINT `link_donobj_ibfk_2` FOREIGN KEY (`ID_user`) REFERENCES `utilisateur` (`ID_user`);

--
-- Contraintes pour la table `link_ecriture`
--
ALTER TABLE `link_ecriture`
  ADD CONSTRAINT `link_ecriture_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `utilisateur` (`ID_user`),
  ADD CONSTRAINT `link_ecriture_ibfk_2` FOREIGN KEY (`ID_article`) REFERENCES `article` (`ID_article`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
