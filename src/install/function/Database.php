<?php
$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `hosting_account` (
  `account_id` INT(11) NOT NULL AUTO_INCREMENT,
  `account_client_id` INT(11) NOT NULL,
  `account_username` VARCHAR(22) NOT NULL,
  `account_password` VARCHAR(16) NOT NULL,
  `account_domain` VARCHAR(70) NOT NULL,
  `account_sql` VARCHAR(8) NOT NULL,
  `account_key` VARCHAR(8) NOT NULL,
  `account_status` INT(1) NOT NULL,
  `account_date` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `hosting_account_api` (
  `api_id` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `api_username` VARCHAR(256) NOT NULL,
  `api_password` VARCHAR(256) NOT NULL,
  `api_cpanel_url` VARCHAR(100) NOT NULL,
  `api_server_ip` VARCHAR(15) NOT NULL,
  `api_ns_1` VARCHAR(30) NOT NULL,
  `api_ns_2` VARCHAR(30) NOT NULL,
  `api_package` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`api_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `hosting_config` (
  `site_id` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `site_key` VARCHAR(10) NOT NULL,
  `site_status` INT(2) NOT NULL,
  `site_name` VARCHAR(30) NOT NULL,
  `site_brand` VARCHAR(30) NOT NULL,
  `site_company` VARCHAR(30) NOT NULL,
  `site_path` VARCHAR(70) NOT NULL,
  `site_email` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `hosting_builder_api` (
  `id` INT(10) unsigned NOT NULL AUTO_INCREMENT,
  `builder_id` VARCHAR(7) NOT NULL,
  `builder_username` VARCHAR(100) NOT NULL,
  `builder_password` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `hosting_clients` (
  `hosting_client_id` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `hosting_client_fname` VARCHAR(30) NOT NULL,
  `hosting_client_lname` VARCHAR(30) NOT NULL,
  `hosting_client_email` VARCHAR(70) NOT NULL,
  `hosting_client_phone` VARCHAR(30) NOT NULL,
  `hosting_client_address` VARCHAR(50) NOT NULL,
  `hosting_client_country` VARCHAR(40) NOT NULL,
  `hosting_client_city` VARCHAR(30) NOT NULL,
  `hosting_client_pcode` VARCHAR(20) NOT NULL,
  `hosting_client_key` VARCHAR(8) NOT NULL,
  `hosting_client_state` VARCHAR(30) NOT NULL,
  `hosting_client_date` VARCHAR(30) NOT NULL,
  `hosting_client_status` INT(1) NOT NULL,
  `hosting_client_company` VARCHAR(50) NOT NULL,
  `hosting_client_password` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`hosting_client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `hosting_domain_extensions` (
  `extension_id` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `extension_value` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`extension_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `hosting_smtp` (
  `id` INT(10) unsigned NOT NULL AUTO_INCREMENT,
  `smtp_key` VARCHAR(4) NOT NULL,
  `smtp_host` VARCHAR(50) NOT NULL,
  `smtp_username` VARCHAR(50) NOT NULL,
  `smtp_password` VARCHAR(100) NOT NULL,
  `smtp_port` VARCHAR(4) NOT NULL,
  `smtp_from` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `hosting_ssl` (
  `ssl_id` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `ssl_key` INT(12) NOT NULL,
  `ssl_for` INT(11) NOT NULL,
  PRIMARY KEY (`ssl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `hosting_ssl_api` (
  `id` INT(10) unsigned NOT NULL AUTO_INCREMENT,
  `api_key` VARCHAR(7) NOT NULL,
  `api_username` VARCHAR(256) NOT NULL,
  `api_password` VARCHAR(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `hosting_tickets` (
  `ticket_id` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_for` INT(11) NOT NULL,
  `ticket_subject` VARCHAR(50) NOT NULL,
  `ticket_email` VARCHAR(100) NOT NULL,
  `ticket_department` VARCHAR(10) NOT NULL,
  `ticket_content` VARCHAR(1000) NOT NULL,
  `ticket_status` INT(1) NOT NULL,
  `ticket_date` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`ticket_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `hosting_ticket_replies` (
  `reply_id` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `reply_for` INT(11) NOT NULL,
  `reply_from` VARCHAR(8) NOT NULL,
  `reply_content` VARCHAR(1000) NOT NULL,
  `reply_date` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `hosting_admin` (
  `admin_id` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `admin_fname` VARCHAR(30) NOT NULL,
  `admin_lname` VARCHAR(30) NOT NULL,
  `admin_email` VARCHAR(50) NOT NULL,
  `admin_key` VARCHAR(8) NOT NULL,
  `admin_password` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, "INSERT INTO `hosting_account_api`(`api_key`, `api_username`, `api_password`, `api_cpanel_url`, `api_server_ip`, `api_ns_1`, `api_ns_2`, `api_package`) VALUES ('myownfreehost','MOFH API Username','MOFH API Password','cpanel.example.com','185.27.134.46','ns1.byet.org','ns2.byet.org','freehosting')");

$sql = mysqli_query($connect, "INSERT INTO `hosting_smtp`(`smtp_key`, `smtp_host`, `smtp_username`, `smtp_password`, `smtp_port`, `smtp_from`) VALUES ('SMTP','smtp.gmail.com','example@gmail.com','example123','587','example@gmail.com')");

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `hosting_knowledgebase` (
  `knowledgebase_id` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `knowledgebase_subject` VARCHAR(200) NOT NULL,
  `knowledgebase_content` VARCHAR(10000) NOT NULL,
  `knowledgebase_date` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`knowledgebase_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, "INSERT INTO `hosting_ssl_api`(`api_key`, `api_username`, `api_password`) VALUES ('FREESSL','example@gmail.com','SSL API Password')");

$sql = mysqli_query($connect, "INSERT INTO `hosting_builder_api`(`builder_id`, `builder_username`, `builder_password`) VALUES ('SITEPRO','apikey0','API Password')");

$sql = mysqli_query($connect, "INSERT INTO `hosting_domain_extensions`(`extension_value`) VALUES ('.example.com')");

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `hosting_news`(
  `news_id` INT(11) NOT NULL AUTO_INCREMENT,
  `news_subject` VARCHAR(255) NOT NULL,
  `news_content` VARCHAR(5000) NOT NULL,
  `news_status` INT(1) NOT NULL,
  `news_date` VARCHAR(20) NOT NULL,
  `news_lastupdated` VARCHAR(20) NOT NULL,
  PRIMARY KEY(`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, "CREATE TABLE IF NOT EXISTS `hosting_emails`(
  `email_id` INT(11) NOT NULL AUTO_INCREMENT,
  `email_for` INT(11) NOT NULL,
  `email_date` VARCHAR(255) NOT NULL,
  `email_subject` VARCHAR(255) NOT NULL,
  `email_body` VARCHAR(5000) NOT NULL,
  `email_read` INT(1) NOT NULL DEFAULT '0',
  PRIMARY KEY(`email_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;");
