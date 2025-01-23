-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 23 jan. 2025 à 18:59
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
-- Base de données : `gestion_note`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

CREATE TABLE `account` (
  `id_account` int(10) NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_role` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`id_account`, `id_user`, `id_role`, `username`, `password`) VALUES
(1, 2, 2, 'hamza', '$2y$10$FzsD5IKSctQtsTDyS9cXuOlhHIHGXtPqkpOrZ5eZTewiLPQ1wZkt.'),
(2, 4, 2, 'test', '$2y$10$yCdXwnl3YVYGCgnAFGelGOKjpl5Z08dxfbxlbpd46jgMVvsGtgN.O'),
(3, 6, 2, 'abdo', '$2y$10$RpREYV14QiUYwuDobcRAr.cnQuxDKgKvckNnIDIV6DSRjCQ5Pwx8K'),
(4, 7, 3, 'prof SANI', '$2y$10$OiwpLg.pDs4D7silLiB0pOcKk1RbxlrukOXWcanVcdW/GWeEGGh8G'),
(5, 8, 2, 'omarr', '$2y$10$Fs5TDOv.iKRwpMQZtw5s.uxdLBKLXfHTOCddsfclYRnjW/6NRYmkW'),
(6, 9, 2, 'index', '$2y$10$98hluvoNMZjMxQmtVelCN.s8wXUj4RuFE/2klgWuX6pLLnMmIghfW'),
(7, 10, 2, 'indexxx', '$2y$10$88CfNpV9orzFNXo0jaRBpOpqEJAyQU7prEG8tt/0TvWUK0tx1mj/W');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `id_module` int(10) NOT NULL,
  `nom_module` varchar(50) NOT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id_module`, `nom_module`, `Description`, `id_user`) VALUES
(1, 'JAVA', NULL, 7),
(2, 'PYTHON', NULL, 7),
(3, 'J2EE', NULL, 7),
(4, 'WORDPRESS', NULL, 7),
(5, 'GL', NULL, 7),
(6, 'ANGLAIS', NULL, 7),
(7, 'FRANCAIS', NULL, 7),
(8, 'CMS', NULL, 7);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id_note` int(11) NOT NULL,
  `note` decimal(10,0) NOT NULL,
  `id_module` int(11) NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id_note`, `note`, `id_module`, `id_user`) VALUES
(1, 18, 1, 6),
(2, 17, 7, 6),
(3, 20, 8, 6),
(4, 12, 4, 6),
(5, 6, 7, 6),
(6, 10, 8, 6);

-- --------------------------------------------------------

--
-- Structure de la table `reclamations`
--

CREATE TABLE `reclamations` (
  `id_reclamation` int(11) NOT NULL,
  `id_module` int(11) DEFAULT NULL,
  `id_note` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `commentaire` varchar(255) DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reclamations`
--

INSERT INTO `reclamations` (`id_reclamation`, `id_module`, `id_note`, `id_user`, `commentaire`, `etat`) VALUES
(1, 8, 6, 6, 'nonnnn', 'Accepter'),
(2, 7, 5, 6, 'impossible', 'En attent'),
(3, 4, 4, 6, 'test', 'En attent');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL DEFAULT '0',
  `description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `nom`, `description`) VALUES
(1, 'Admin', 'Role with full access to the system'),
(2, 'Etudiant', 'Role with limited access to the system'),
(3, 'Prof', 'Role with view-only access to the system');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `date_birth` date NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '0',
  `adresse` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `name`, `date_birth`, `email`, `adresse`) VALUES
(2, 'Hamza EL Mansouri', '2025-02-08', 'hamza.elmansouri@gmail.com', 'dddddddddddddddd'),
(3, 'tet', '2025-01-11', '0', 'fff'),
(4, 'test', '2025-01-23', '0', 'dddddddddddddddd'),
(5, 'prof Hassni', '2025-02-13', 'prof@gmail.com', 'salam'),
(6, 'abdo', '2025-01-03', 'abdo.afif2004.12@gmail.com', 'N 7 LOTISSEMENT ENNOUR AIT YAHIA OU ALLA TIGRIGRA'),
(7, 'prof SANI', '2025-01-24', 'prof1@gmail.com', 'Azrou'),
(8, 'omarr', '2025-01-03', 'omar@gmail.com', 'Azrou'),
(9, 'index', '2025-01-03', 'i@gmail.com', 'Azrou'),
(10, 'indexxx', '2025-01-18', 'abdo.afif2004.12@gmail.com', 'N 7 LOTISSEMENT ENNOUR AIT YAHIA OU ALLA TIGRIGRA');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`),
  ADD KEY `FK_account_role` (`id_role`),
  ADD KEY `FK_account_user` (`id_user`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`),
  ADD KEY `FK_module_user` (`id_user`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id_note`),
  ADD KEY `FK_note_user` (`id_user`),
  ADD KEY `FK_notes_module` (`id_module`);

--
-- Index pour la table `reclamations`
--
ALTER TABLE `reclamations`
  ADD PRIMARY KEY (`id_reclamation`),
  ADD KEY `fk_module` (`id_module`),
  ADD KEY `fk_note` (`id_note`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `id_module` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `reclamations`
--
ALTER TABLE `reclamations`
  MODIFY `id_reclamation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `FK_account_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_account_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `FK_module_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `FK_note_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_notes_module` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reclamations`
--
ALTER TABLE `reclamations`
  ADD CONSTRAINT `fk_module` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`),
  ADD CONSTRAINT `fk_note` FOREIGN KEY (`id_note`) REFERENCES `notes` (`id_note`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
