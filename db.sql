-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.4.27-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour gestion_note
CREATE DATABASE IF NOT EXISTS `gestion_note` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `gestion_note`;

-- Listage de la structure de la table gestion_note. account
CREATE TABLE IF NOT EXISTS `account` (
  `id_account` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_role` int(11) unsigned NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_account`),
  KEY `FK_account_role` (`id_role`),
  KEY `FK_account_user` (`id_user`),
  CONSTRAINT `FK_account_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_account_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table gestion_note.account : ~2 rows (environ)
INSERT INTO `account` (`id_account`, `id_user`, `id_role`, `username`, `password`) VALUES
	(1, 2, 3, 'hamza', '$2y$10$FzsD5IKSctQtsTDyS9cXuOlhHIHGXtPqkpOrZ5eZTewiLPQ1wZkt.'),
	(2, 4, 3, 'test', '$2y$10$yCdXwnl3YVYGCgnAFGelGOKjpl5Z08dxfbxlbpd46jgMVvsGtgN.O');

-- Listage de la structure de la table gestion_note. module
CREATE TABLE IF NOT EXISTS `module` (
  `id_module` int(10) NOT NULL AUTO_INCREMENT,
  `nom_module` varchar(50) NOT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `id_user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_module`),
  KEY `FK_module_user` (`id_user`),
  CONSTRAINT `FK_module_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table gestion_note.module : ~8 rows (environ)
INSERT INTO `module` (`id_module`, `nom_module`, `Description`, `id_user`) VALUES
	(1, 'JAVA', NULL, 5),
	(2, 'PYTHON', NULL, 5),
	(3, 'J2EE', NULL, 5),
	(4, 'WORDPRESS', NULL, 5),
	(5, 'GL', NULL, 5),
	(6, 'ANGLAIS', NULL, 5),
	(7, 'FRANCAIS', NULL, 5),
	(8, 'CMS', NULL, 5);

-- Listage de la structure de la table gestion_note. notes
CREATE TABLE IF NOT EXISTS `notes` (
  `id_note` int(11) NOT NULL AUTO_INCREMENT,
  `note` decimal(10,0) NOT NULL,
  `id_module` int(11) NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_note`),
  KEY `FK_note_user` (`id_user`),
  KEY `FK_notes_module` (`id_module`),
  CONSTRAINT `FK_note_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_notes_module` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table gestion_note.notes : ~6 rows (environ)
INSERT INTO `notes` (`id_note`, `note`, `id_module`, `id_user`) VALUES
	(1, 18, 1, 2),
	(2, 17, 7, 2),
	(3, 20, 8, 2),
	(4, 12, 4, 2),
	(5, 6, 7, 4),
	(6, 0, 8, 4);

-- Listage de la structure de la table gestion_note. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) unsigned NOT NULL,
  `nom` varchar(50) NOT NULL DEFAULT '0',
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table gestion_note.role : ~3 rows (environ)
INSERT INTO `role` (`id_role`, `nom`, `description`) VALUES
	(1, 'Admin', 'Role with full access to the system'),
	(2, 'proffesseur', 'Role with limited access to the system'),
	(3, 'etudiant', 'Role with view-only access to the system');

-- Listage de la structure de la table gestion_note. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `date_birth` date NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '0',
  `adresse` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table gestion_note.user : ~4 rows (environ)
INSERT INTO `user` (`id_user`, `name`, `date_birth`, `email`, `adresse`) VALUES
	(2, 'Hamza EL Mansouri', '2025-02-08', 'hamza.elmansouri@gmail.com', 'dddddddddddddddd'),
	(3, 'tet', '2025-01-11', '0', 'fff'),
	(4, 'test', '2025-01-23', '0', 'dddddddddddddddd'),
	(5, 'prof Hassni', '2025-02-13', 'prof@gmail.com', 'salam');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
