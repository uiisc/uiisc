
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `users`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `website` VARCHAR(255) NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    `created_at` INT(11) NOT NULL,
    `reset_code` CHAR(32) NOT NULL,
    `is_active` TINYINT(4) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE = MyISAM DEFAULT CHARSET = utf8 AUTO_INCREMENT = 100;

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `website`, `image`, `created_at`, `reset_code`, `is_active`) VALUES
(1, 'Administrator', 'support@uiisc.com', 'admin', '$2y$10$g6SsReRUJDV0IANO7ZBamOGNQ7sE7zayFiXOC6sgU0lPjxq1b4yuu', 'http://uiisc.com', '5de69dbb55cc3623871b98adc74628081558340869.png', 1550143252, '', 1)

CREATE TABLE IF NOT EXISTS `emails`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `date` VARCHAR(255) NOT NULL,
    `subject` VARCHAR(255) NOT NULL,
    `body` VARCHAR(255) NOT NULL,
    `user_id` INT(11) NOT NULL,
    `is_active` TINYINT(4) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE = MyISAM DEFAULT CHARSET = utf8 AUTO_INCREMENT = 100;

CREATE TABLE IF NOT EXISTS `tickets`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `date` VARCHAR(255) NOT NULL,
    `department` VARCHAR(255) NOT NULL,
    `subject` VARCHAR(255) NOT NULL,
    `status` TINYINT(4) NOT NULL,
    `lastupdated` VARCHAR(255) NOT NULL,
    `user_id` INT(11) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE = MyISAM DEFAULT CHARSET = utf8 AUTO_INCREMENT = 100;

CREATE TABLE IF NOT EXISTS `products`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `date` VARCHAR(255) NOT NULL,
    `department` VARCHAR(255) NOT NULL,
    `subject` VARCHAR(255) NOT NULL,
    `status` TINYINT(4) NOT NULL,
    `lastupdated` VARCHAR(255) NOT NULL,
    `user_id` INT(11) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE = MyISAM DEFAULT CHARSET = utf8 AUTO_INCREMENT = 100;

