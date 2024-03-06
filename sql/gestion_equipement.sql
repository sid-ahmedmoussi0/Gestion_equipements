-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 06 mars 2024 à 12:04
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_equipement`
--
DROP DATABASE IF EXISTS `gestion_equipement`;
CREATE DATABASE `gestion_equipement`;
USE `gestion_equipement`;
-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `equ_id` smallint(5) UNSIGNED NOT NULL,
  `equ_nom` varchar(20) NOT NULL,
  `equ_adresseMAC` varchar(20) NOT NULL,
  `equ_adresseIP` varchar(15) NOT NULL,
  `equ_masque` varchar(15) NOT NULL,
  `equ_typId` smallint(5) UNSIGNED NOT NULL,
  `equ_priId` smallint(5) UNSIGNED NOT NULL,
  `equ_salId` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equipement`
--

INSERT INTO `equipement` (`equ_id`, `equ_nom`, `equ_adresseMAC`, `equ_adresseIP`, `equ_masque`, `equ_typId`, `equ_priId`, `equ_salId`) VALUES
(1, 'PC', 'AA:AA:AA:AA:AA:AA', '192.168.0.0', '255.255.255.0', 2, 1, 3),
(2, 'PC-2', 'AB:AB:AB:AB:AB:AB', '172.168.1.0', '255.255.0.0', 3, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `equipement_type`
--

CREATE TABLE `equipement_type` (
  `typ_id` smallint(5) UNSIGNED NOT NULL,
  `typ_nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equipement_type`
--

INSERT INTO `equipement_type` (`typ_id`, `typ_nom`) VALUES
(2, 'Typ_12'),
(3, 'TYP_14');

-- --------------------------------------------------------

--
-- Structure de la table `prise`
--

CREATE TABLE `prise` (
  `pri_id` smallint(5) UNSIGNED NOT NULL,
  `pri_reference` varchar(40) NOT NULL,
  `pri_salId` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `prise`
--

INSERT INTO `prise` (`pri_id`, `pri_reference`, `pri_salId`) VALUES
(1, '8_5_99', 3),
(3, '8_9_55', 4);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `sal_id` smallint(5) UNSIGNED NOT NULL,
  `sal_numero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`sal_id`, `sal_numero`) VALUES
(3, 'C-102'),
(4, 'C-103');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `uti_id` smallint(5) UNSIGNED NOT NULL,
  `uti_login` varchar(20) NOT NULL,
  `uti_pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`uti_id`, `uti_login`, `uti_pwd`) VALUES
(2, 'test@user.fr', '$2y$10$1.Ajno268IBTl/kaDymzVez4bbYid/H9U7aB3T9qhge3ABCW1jxoe');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`equ_id`),
  ADD UNIQUE KEY `equ_adresseMAC` (`equ_adresseMAC`),
  ADD KEY `equ_typId` (`equ_typId`),
  ADD KEY `equ_priId` (`equ_priId`),
  ADD KEY `equ_salId` (`equ_salId`);

--
-- Index pour la table `equipement_type`
--
ALTER TABLE `equipement_type`
  ADD PRIMARY KEY (`typ_id`),
  ADD UNIQUE KEY `typ_nom` (`typ_nom`);

--
-- Index pour la table `prise`
--
ALTER TABLE `prise`
  ADD PRIMARY KEY (`pri_id`),
  ADD UNIQUE KEY `pri_reference` (`pri_reference`),
  ADD KEY `pri_salId` (`pri_salId`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`sal_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`uti_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `equ_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `equipement_type`
--
ALTER TABLE `equipement_type`
  MODIFY `typ_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `prise`
--
ALTER TABLE `prise`
  MODIFY `pri_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `sal_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `uti_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD CONSTRAINT `equipement_ibfk_1` FOREIGN KEY (`equ_typId`) REFERENCES `equipement_type` (`typ_id`),
  ADD CONSTRAINT `equipement_ibfk_2` FOREIGN KEY (`equ_priId`) REFERENCES `prise` (`pri_id`),
  ADD CONSTRAINT `equipement_ibfk_3` FOREIGN KEY (`equ_salId`) REFERENCES `salle` (`sal_id`);

--
-- Contraintes pour la table `prise`
--
ALTER TABLE `prise`
  ADD CONSTRAINT `prise_ibfk_1` FOREIGN KEY (`pri_salId`) REFERENCES `salle` (`sal_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
