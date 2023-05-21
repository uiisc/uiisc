<?php
$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `hosting_account` (
  `account_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT "主机账号ID",
  `account_client_id` INT(11) NOT NULL COMMENT "所属客户ID",
  `account_key` VARCHAR(8) NOT NULL,
  `account_api_key` varchar(20) NOT NULL COMMENT "主机提供商标识",
  `account_username` VARCHAR(22) NOT NULL,
  `account_password` VARCHAR(16) NOT NULL,
  `account_domain` VARCHAR(70) NOT NULL,
  `account_sql` VARCHAR(8) NOT NULL,
  `account_status` INT(1) NOT NULL,
  `account_date` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `hosting_account_api` (
  `api_id` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `api_key` varchar(30) NOT NULL,
  `api_username` VARCHAR(256) NOT NULL,
  `api_password` VARCHAR(256) NOT NULL,
  `api_cpanel_url` VARCHAR(100) NOT NULL,
  `api_server_ip` VARCHAR(15) NOT NULL,
  `api_ns_1` VARCHAR(30) NOT NULL,
  `api_ns_2` VARCHAR(30) NOT NULL,
  `api_ns_3` varchar(30) NOT NULL,
  `api_package` VARCHAR(20) NOT NULL,
  `api_callback_token` varchar(32) NOT NULL,
  PRIMARY KEY (`api_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `hosting_config` (
  `site_id` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `site_key` varchar(20) NOT NULL,
  `site_status` int(2) NOT NULL,
  `site_name` varchar(30) NOT NULL,
  `site_brand` varchar(30) NOT NULL,
  `site_company` varchar(30) NOT NULL,
  `site_path` varchar(70) NOT NULL,
  `site_phone` varchar(30) NOT NULL,
  `site_email` varchar(50) NOT NULL,
  `page_title` varchar(80) NOT NULL,
  `page_description` varchar(200) NOT NULL,
  `page_keywords` varchar(100) NOT NULL,
  `page_copyright` varchar(100) NOT NULL,
  `page_author` varchar(30) NOT NULL,
  `ifastnet_aff` int(11) DEFAULT NULL,
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
  `client_id` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `client_fname` VARCHAR(30) NOT NULL,
  `client_lname` VARCHAR(30) NOT NULL,
  `client_email` VARCHAR(70) NOT NULL,
  `client_phone` VARCHAR(30) NOT NULL,
  `client_address` VARCHAR(50) NOT NULL,
  `client_country` VARCHAR(40) NOT NULL,
  `client_city` VARCHAR(30) NOT NULL,
  `client_pcode` VARCHAR(20) NOT NULL,
  `client_key` VARCHAR(8) NOT NULL,
  `client_state` VARCHAR(30) NOT NULL,
  `client_date` VARCHAR(30) NOT NULL,
  `client_status` INT(1) NOT NULL,
  `client_company` VARCHAR(50) NOT NULL,
  `client_password` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`client_id`)
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
  `ssl_client_id` INT(11) NOT NULL COMMENT "所属客户ID",
  `ssl_key` INT(12) NOT NULL,
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
  `ticket_client_id` INT(11) NOT NULL COMMENT "所属客户ID",
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
  `email_client_id` INT(11) NOT NULL COMMENT '所属客户ID',
  `email_date` VARCHAR(255) NOT NULL,
  `email_subject` VARCHAR(255) NOT NULL,
  `email_body` VARCHAR(5000) NOT NULL,
  `email_read` INT(1) NOT NULL DEFAULT '0',
  PRIMARY KEY(`email_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;");
