
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `reset_code` char(32) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=100;


INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `website`, `image`, `created_at`, `reset_code`, `is_active`) VALUES
(1, 'Administrator', 'support@uiisc.com', 'admin', '$2y$10$g6SsReRUJDV0IANO7ZBamOGNQ7sE7zayFiXOC6sgU0lPjxq1b4yuu', 'http://uiisc.com', '5de69dbb55cc3623871b98adc74628081558340869.png', 1550143252, '', 1)


CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=100;


CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `lastupdated` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=100;


CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `lastupdated` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

