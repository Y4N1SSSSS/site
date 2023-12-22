-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 22 déc. 2023 à 09:26
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

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

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`ID_article`, `Contenue`, `Titre`, `Date_article`) VALUES
(16, 'Je n\'avais jamais vu un site aussi bien auparavant ;)', 'C\'est le meilleur site du monde', '2023-12-22'),
(17, 'Ce site offre une expérience unique que je n\'avais jamais rencontrée auparavant. Une véritable pépite en matière d\'événementiel en ligne !', 'Expérience Unique', '2023-12-22'),
(18, 'Le design exceptionnel de ce site le distingue vraiment. Chaque détail est pensé pour offrir une navigation fluide et agréable.', 'Design Exceptionnel', '2023-12-22'),
(19, 'Une richesse de contenu qui dépasse toutes les attentes. Chaque page est une mine d\'informations intéressantes et pertinentes sur l\'événement.', 'Richesse de Contenu', '2023-12-22'),
(20, 'La navigation intuitive rend la découverte de l\'événement simple et plaisante. On se perd avec plaisir dans les différentes sections du site.', 'Navigation Intuitive', '2023-12-22'),
(21, 'L\'aspect interactif du site ajoute une dimension passionnante. Participer devient un plaisir grâce à des fonctionnalités bien pensées.', 'Interactivité Passionnante', '2023-12-22'),
(22, 'La réactivité exceptionnelle du site, que ce soit sur un ordinateur de bureau ou sur un appareil mobile, assure une accessibilité sans faille.', 'Réactivité Exceptionnelle', '2023-12-22'),
(23, 'Toutes les informations dont vous pourriez avoir besoin sont là, organisées de manière claire et concise. Rien n\'est laissé au hasard.', 'Informations Complètes', '2023-12-22'),
(24, 'L\'atmosphère créée par le site fait monter l\'excitation autour de l\'événement. Chaque visite est une invitation à plonger dans l\'univers captivant qui se prépare.', 'Atmosphère Envoûtante', '2023-12-22');

-- --------------------------------------------------------

--
-- Structure de la table `donation`
--

CREATE TABLE `donation` (
  `ID_don` int(11) NOT NULL,
  `Valeur` int(255) NOT NULL DEFAULT 0,
  `Date_don` date DEFAULT NULL,
  `ID_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `donation`
--

INSERT INTO `donation` (`ID_don`, `Valeur`, `Date_don`, `ID_user`) VALUES
(49, 750, '2023-12-22', 9),
(50, 53, '2023-12-22', 10),
(51, 1000, '2023-12-22', 11),
(52, 200, '2023-12-22', 12),
(53, 1500, '2023-12-22', 14),
(54, 230, '2023-12-22', 15),
(55, 630, '2023-12-22', 16),
(56, 12, '2023-12-22', 16);

-- --------------------------------------------------------

--
-- Structure de la table `don_objet`
--

CREATE TABLE `don_objet` (
  `ID_donObj` int(11) NOT NULL,
  `Type_objet` varchar(100) DEFAULT NULL,
  `Description` varchar(400) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `ID_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `don_objet`
--

INSERT INTO `don_objet` (`ID_donObj`, `Type_objet`, `Description`, `Date`, `ID_user`) VALUES
(19, 'outil', 'Ancienne pelle', '2023-12-22', 9),
(20, 'matierepremiere', 'Ciment', '2023-12-22', 10),
(21, 'meuble', 'Une table en bois', '2023-12-22', 11),
(22, 'meuble', '3 chaises', '2023-12-22', 12),
(23, 'outil', 'Une perçeuse Bosch en très bon état', '2023-12-22', 14),
(24, 'outil', 'Un marteau et une masse', '2023-12-22', 16);

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

--
-- Déchargement des données de la table `link_donation`
--

INSERT INTO `link_donation` (`ID_user`, `ID_don`) VALUES
(5, 44),
(5, 45),
(5, 46),
(5, 47),
(5, 48),
(9, 49),
(10, 50),
(11, 51),
(12, 52),
(14, 53),
(15, 54),
(16, 55),
(16, 56);

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
-- Structure de la table `participant`
--

CREATE TABLE `participant` (
  `ID_participant` int(11) NOT NULL,
  `Nom_participant` varchar(50) NOT NULL,
  `Prenom_participant` varchar(50) NOT NULL,
  `email_participant` varchar(70) NOT NULL,
  `num_participant` varchar(20) NOT NULL,
  `CP_participant` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `participant`
--

INSERT INTO `participant` (`ID_participant`, `Nom_participant`, `Prenom_participant`, `email_participant`, `num_participant`, `CP_participant`) VALUES
(9, 'Michaud', 'Yanis', 'yanismichaud_4@outlook.fr', '0783468622', 71000),
(10, 'Reyes', 'Rafael', 'rafael.reyes@gmail.com', '0712304871', 43000),
(11, 'Tidjane ', 'Paye', 'titipaye@gmail.com', '0631524870', 89000),
(12, 'Pacaut', 'Thomas', 'thomas.pacaut@hotmail.fr', '0668986222', 71520),
(13, 'Aliagas', 'Nicos', 'nicosaliagas@gmail.com', '0634512685', 78000),
(14, 'Gourmelin', 'Hippolyte', 'hipporeveil@gmail.com', '0781425168', 14700);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_user` int(11) NOT NULL,
  `Nom_user` varchar(100) DEFAULT NULL,
  `Mdp_user` varchar(200) DEFAULT NULL,
  `IS_Admin` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 si admin\r\n0 si lambda'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_user`, `Nom_user`, `Mdp_user`, `IS_Admin`) VALUES
(5, 'admin', '$2y$10$F7p2tlTZrQgKaQrg/okKWOkk3yE1rIZGuafDB9kPzDvf4LgB2NjfS', 1),
(9, 'user', '$2y$10$D2VvMM5.Xpm0jGzR/4VtbulV6WH0J8J/GS.8fqVlU9Mi59mrj1rpW', 0),
(10, 'user2', '$2y$10$4w5SwafIonIzO5RdmzfEdePzVep4D5Oz56NM.56ULEtCu6uNKZgwu', 0),
(11, 'user3', '$2y$10$E1BcAVLVZ6ShHwDbVpo.WO4lEGX.CAd8.9AhO1U1ZwV78kS5RAnVG', 0),
(12, 'user4', '$2y$10$VxcskwJT/Q7ekT6.XWMe0ugNmWS6P2DVqec0xKVZbRlnzGxPS2k2m', 0),
(13, 'user5', '$2y$10$bIfTAR2P5fJ8JjHa21YRLuyr/uDMo2A5CK/p4jY7I36jK71EZMdh2', 0),
(14, 'user6', '$2y$10$5jrFhQCxKa5Hv1vO/GICoundBkf7fJXbaUtbG4q03zbzMVeDyFC8O', 0),
(15, 'user7', '$2y$10$r4w/Dboa58SWPBmGxJ0S6Omc3RopYEczNX9idjZEVAskZ/QI24wIu', 0),
(16, 'user8', '$2y$10$lHSGXItjAKpkaQgotVn3cunIO7y0idKsTiOadMkmeNIwUy1S5imk6', 0),
(17, 'user9', '$2y$10$zS/DZ.EDpickGdG8GURePemSB1EYXeL4CLSU7mzaKJU4Oz0T4G5Va', 0);

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
  ADD PRIMARY KEY (`ID_don`),
  ADD KEY `fk_ID_user` (`ID_user`);

--
-- Index pour la table `don_objet`
--
ALTER TABLE `don_objet`
  ADD PRIMARY KEY (`ID_donObj`),
  ADD KEY `ID_user` (`ID_user`);

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
-- Index pour la table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`ID_participant`);

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
  MODIFY `ID_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `donation`
--
ALTER TABLE `donation`
  MODIFY `ID_don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `don_objet`
--
ALTER TABLE `don_objet`
  MODIFY `ID_donObj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `ID_event` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `participant`
--
ALTER TABLE `participant`
  MODIFY `ID_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `fk_ID_user` FOREIGN KEY (`ID_user`) REFERENCES `utilisateur` (`ID_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `link_donation`
--
ALTER TABLE `link_donation`
  ADD CONSTRAINT `link_donation_ibfk_1` FOREIGN KEY (`ID_don`) REFERENCES `donation` (`ID_don`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `link_donation_ibfk_2` FOREIGN KEY (`ID_user`) REFERENCES `utilisateur` (`ID_user`) ON DELETE CASCADE ON UPDATE CASCADE;

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
