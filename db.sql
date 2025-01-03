-- Désactiver temporairement les vérifications des clés étrangères
SET FOREIGN_KEY_CHECKS=0;

-- Créer la base de données
CREATE DATABASE IF NOT EXISTS gestion_note /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE gestion_note;

-- Créer la table role
CREATE TABLE IF NOT EXISTS role (
  id_role int(11) unsigned NOT NULL AUTO_INCREMENT,
  nom varchar(50) NOT NULL DEFAULT '0',
  description varchar(50) DEFAULT NULL,
  PRIMARY KEY (id_role)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Créer la table user
CREATE TABLE IF NOT EXISTS user (
  id_user int(10) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(50) NOT NULL DEFAULT '0',
  date_birthe varchar(50) NOT NULL DEFAULT '0',
  Email varchar(255) NOT NULL DEFAULT '0',
  adresse varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (id_user)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Créer la table account
CREATE TABLE IF NOT EXISTS account (
  id_account int(10) unsigned NOT NULL AUTO_INCREMENT,
  id_user int(10) unsigned NOT NULL,
  id_role int(11) unsigned NOT NULL,
  username varchar(50) DEFAULT NULL,
  password varchar(50) DEFAULT NULL,
  role int(11) DEFAULT NULL,
  PRIMARY KEY (id_account),
  KEY FK_user_account (id_user),
  KEY FK_account_role (id_role),
  CONSTRAINT FK_account_role FOREIGN KEY (id_role) REFERENCES role (id_role),
  CONSTRAINT FK_user_account FOREIGN KEY (id_user) REFERENCES user (id_user)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Réactiver les vérifications des clés étrangères
SET FOREIGN_KEY_CHECKS=1;