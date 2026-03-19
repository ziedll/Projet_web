-- 1. Base de données
CREATE DATABASE IF NOT EXISTS `spider` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `spider`;

-- 2. Table des utilisateurs
CREATE TABLE IF NOT EXISTS `user` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `pseudo` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `mdp` VARCHAR(255) NOT NULL,
    `role` ENUM('user', 'admin') DEFAULT 'user',
    `credit` INT(11) DEFAULT 100,
    `avatar` VARCHAR(255) DEFAULT NULL,
    `description` TEXT DEFAULT NULL,
    `discord` VARCHAR(255) DEFAULT NULL,
    `twitter` VARCHAR(255) DEFAULT NULL,
    `youtube` VARCHAR(255) DEFAULT NULL,
    `date_creation` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. Table de la boutique (Produits)
CREATE TABLE IF NOT EXISTS `boutique` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `titre` VARCHAR(255) NOT NULL,
    `prix` INT(11) NOT NULL,
    `description` TEXT DEFAULT NULL,
    `quantite` INT(11) DEFAULT 0,
    `image` VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4. Table des articles (News)
CREATE TABLE IF NOT EXISTS `article` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `titre` VARCHAR(255) NOT NULL,
    `content` TEXT NOT NULL,
    `image` VARCHAR(255) DEFAULT NULL,
    `date_de_creation` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `author_id` INT(11) DEFAULT NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `fk_article_author` FOREIGN KEY (`author_id`) REFERENCES `user`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 5. Table de l'historique d'achat
CREATE TABLE IF NOT EXISTS `purchase_history` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL,
    `item_id` INT(11) NOT NULL,
    `item_name` VARCHAR(255) NOT NULL,
    `price` INT(11) NOT NULL,
    `purchase_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    CONSTRAINT `fk_purchase_user` FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
