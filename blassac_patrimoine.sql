-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 21 déc. 2023 à 16:36
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
(1, 'dzeadedezdez', 'J\'ai la diarhée', '2023-12-18'),
(2, 'apagnan burger', 'j\'ai une nouvelle diarhée', '2023-12-18'),
(4, 'szaszaszadfazfezgéég', 'ching chang chong', '2023-12-18'),
(5, 'ninoefvz,poaefzi,po', '5 ème texte', '2023-12-18'),
(6, 'vive daesh', '6ème commentaire haineux', '2023-12-18'),
(7, 'sza', 'sza', '2023-12-18'),
(9, 'j\'avoue que c\'est de la folie d\'avoir un event aussi bien ', 'c\'est fou ce qu\'il se passe quand même', '2023-12-18'),
(10, 'ceci est un test au four', 'alors voyons voir si ça marche', '2023-12-18'),
(11, 'voyons voir ce que ça donne', 'c\'est parti pour le test final', '2023-12-18'),
(14, 'la dcp je vais débiter beaucoup de gens la', 'masterclass', '2023-12-20'),
(15, 'arrete de klaxonner fratelo', 'le j c\'est le s', '2023-12-21');

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
(44, 450, '2023-12-21', 5),
(45, 1952, '2023-12-21', 5);

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
(13, 'matierepremiere', 'szasza', '2023-12-20', 2),
(14, 'meuble', 'meuble ikéa fils de pute', '2023-12-20', 1),
(15, 'outil', 'jjezjufhezufjhzu', '2023-12-20', 1),
(16, 'outil', 'une pelle pour enterrer des cadavres', '2023-12-20', 1),
(17, 'outil', 'Petite perçeuse Bosch', '2023-12-20', 1),
(18, 'matierepremiere', 'je veux donner du ciment', '2023-12-21', 4);

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
(4, 42),
(4, 43),
(5, 44),
(5, 45);

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
(1, 'Michaud', 'Yanis', 'yanismichaud_4@outlook.fr', '2147483647', 71000),
(5, 'Racaille', 'Mouloud', 'mouloudracaille@gmail.com', '0684512397', 12542),
(6, 'Reyes', 'Rafael', 'chiassemaster@gmail.com', '0624513687', 43000),
(7, 'Gourmelin', 'Hippo', 'tagueule@chiasse.com', '0745129584', 43000);

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
(4, 'jeaneude', '$2y$10$.qZ97Opha5zh8zqxCt6CFOAKFT6uxBv0q/k/Z4doEUDvMnGLsxK.C', 0),
(5, 'admin', '$2y$10$F7p2tlTZrQgKaQrg/okKWOkk3yE1rIZGuafDB9kPzDvf4LgB2NjfS', 1);

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
  MODIFY `ID_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `donation`
--
ALTER TABLE `donation`
  MODIFY `ID_don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `don_objet`
--
ALTER TABLE `don_objet`
  MODIFY `ID_donObj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `ID_event` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `participant`
--
ALTER TABLE `participant`
  MODIFY `ID_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
