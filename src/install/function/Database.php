<?php
$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `uiisc_account` (
  `account_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT "主机账号ID",
  `account_client_id` INT(11) NOT NULL COMMENT "所属客户ID",
  `account_key` VARCHAR(8) NOT NULL,
  `account_api_key` varchar(20) NOT NULL COMMENT "主机提供商标识",
  `account_username` VARCHAR(22) NOT NULL,
  `account_password` VARCHAR(16) NOT NULL,
  `account_domain` VARCHAR(70) NOT NULL,
  `account_sql` VARCHAR(8) NOT NULL,
  `account_status` INT(1) NOT NULL COMMENT "0未激活1已激活2禁用3删除",
  `account_date` VARCHAR(20) NOT NULL,
  `account_signup_ip` varchar(20) DEFAULT NULL COMMENT "注册IP",
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `uiisc_account_api` (
  `api_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `api_type` varchar(30) NOT NULL,
  `api_key` varchar(20) NOT NULL,
  `api_username` varchar(256) NOT NULL,
  `api_password` varchar(256) NOT NULL,
  `api_cpanel_url` varchar(100) NOT NULL,
  `api_server_ip` varchar(15) NOT NULL,
  `api_server_domain` varchar(100) NOT NULL,
  `api_server_ftp_domain` varchar(100) NOT NULL,
  `api_server_sql_domain` varchar(100) NOT NULL,
  `api_ns_1` varchar(30) NOT NULL,
  `api_ns_2` varchar(30) NOT NULL,
  `api_ns_3` varchar(30) NOT NULL,
  `api_package` varchar(20) NOT NULL,
  `api_callback_token` varchar(32) NOT NULL,
  PRIMARY KEY (`api_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `uiisc_account_callback` (
  `callback_id` int(11) NOT NULL AUTO_INCREMENT,
  `callback_date` varchar(30) NOT NULL COMMENT "日期",
  `callback_client_id` int(11) DEFAULT NULL COMMENT "所属客户ID",
  `callback_username` varchar(22) NOT NULL COMMENT "主机账号用户名",
  `callback_action` varchar(30) NOT NULL COMMENT "操作事件",
  `callback_comments` varchar(500) DEFAULT NULL COMMENT "备注信息",
  `callback_raw` text NOT NULL COMMENT "接收的完整数据",
  PRIMARY KEY (`callback_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `uiisc_account_domain` (
  `domain_id` int(11) NOT NULL AUTO_INCREMENT COMMENT "主机账号ID",
  `domain_account_id` int(11) NOT NULL COMMENT "托管账号ID",
  `domain_name` varchar(255) NOT NULL COMMENT "域名",
  PRIMARY KEY (`domain_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `uiisc_config` (
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

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `uiisc_builder_api` (
  `id` INT(10) unsigned NOT NULL AUTO_INCREMENT,
  `builder_id` VARCHAR(7) NOT NULL,
  `builder_username` VARCHAR(100) NOT NULL,
  `builder_password` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `uiisc_clients` (
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
  `client_signup_ip` varchar(20) DEFAULT NULL COMMENT "注册IP",
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `uiisc_account_domaintld` (
  `extension_id` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `extension_value` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`extension_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `uiisc_smtp` (
  `id` INT(10) unsigned NOT NULL AUTO_INCREMENT,
  `smtp_key` VARCHAR(4) NOT NULL,
  `smtp_host` VARCHAR(50) NOT NULL,
  `smtp_username` VARCHAR(50) NOT NULL,
  `smtp_password` VARCHAR(100) NOT NULL,
  `smtp_port` VARCHAR(4) NOT NULL,
  `smtp_from` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `uiisc_ssl` (
  `ssl_id` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `ssl_api_id` INT(11) NOT NULL COMMENT "所属客户ID",
  `ssl_client_id` INT(11) NOT NULL COMMENT "所属客户ID",
  `ssl_third_id` INT(12) NOT NULL COMMENT "第三方标识ID",
  `ssl_status` VARCHAR(20) DEFAULT NULL COMMENT "状态",
  `ssl_domain` VARCHAR(255) DEFAULT NULL COMMENT "主域名",
  `ssl_dcv_method` VARCHAR(20) DEFAULT NULL COMMENT "验证方式",
  `ssl_admin_email` VARCHAR(255) DEFAULT NULL COMMENT "管理员邮箱",
  `ssl_begin_date` VARCHAR(30) DEFAULT NULL COMMENT "有效期开始日期",
  `ssl_end_date` VARCHAR(30) DEFAULT NULL COMMENT "有效期结束日期",
  `ssl_ca_code` VARCHAR(5000) DEFAULT NULL COMMENT "CA证书",
  `ssl_crt_code` VARCHAR(5000) DEFAULT NULL COMMENT "证书内容",
  `ssl_csr_code` VARCHAR(5000) DEFAULT NULL COMMENT "证书请求信息",
  `ssl_raw` TEXT COMMENT "第三方完整数据",
  PRIMARY KEY (`ssl_id`),
  KEY `ssl_api_id` (`ssl_api_id`),
  KEY `ssl_client_id` (`ssl_client_id`),
  KEY `ssl_third_id` (`ssl_third_id`),
  KEY `ssl_status` (`ssl_status`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `uiisc_ssl_api` (
  `id` INT(10) unsigned NOT NULL AUTO_INCREMENT,
  `api_key` VARCHAR(20) NOT NULL,
  `api_username` VARCHAR(256) NOT NULL,
  `api_password` VARCHAR(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `uiisc_tickets` (
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

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `uiisc_ticket_replies` (
  `reply_id` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `reply_for` INT(11) NOT NULL,
  `reply_from` VARCHAR(8) NOT NULL,
  `reply_content` VARCHAR(1000) NOT NULL,
  `reply_date` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `uiisc_admin` (
  `admin_id` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `admin_fname` VARCHAR(30) NOT NULL,
  `admin_lname` VARCHAR(30) NOT NULL,
  `admin_email` VARCHAR(50) NOT NULL,
  `admin_key` VARCHAR(8) NOT NULL,
  `admin_password` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, "INSERT INTO `uiisc_account_api`(`api_key`, `api_username`, `api_password`, `api_cpanel_url`, `api_server_ip`, `api_ns_1`, `api_ns_2`, `api_package`) VALUES ('myownfreehost','MOFH API Username','MOFH API Password','cpanel.example.com','185.27.134.46','ns1.byet.org','ns2.byet.org','freehosting')");

$sql = mysqli_query($connect, "INSERT INTO `uiisc_smtp`(`smtp_key`, `smtp_host`, `smtp_username`, `smtp_password`, `smtp_port`, `smtp_from`) VALUES ('SMTP','smtp.gmail.com','example@gmail.com','example123','587','example@gmail.com')");

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `uiisc_knowledgebase` (
  `knowledgebase_id` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `knowledgebase_subject` VARCHAR(200) NOT NULL,
  `knowledgebase_content` VARCHAR(10000) NOT NULL,
  `knowledgebase_date` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`knowledgebase_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, "INSERT INTO `uiisc_ssl_api`(`api_key`, `api_username`, `api_password`) VALUES ('GOGETSSL','example@gmail.com','SSL API Password')");

$sql = mysqli_query($connect, "INSERT INTO `uiisc_builder_api`(`builder_id`, `builder_username`, `builder_password`) VALUES ('SITEPRO','apikey0','API Password')");

$sql = mysqli_query($connect, "INSERT INTO `uiisc_account_domaintld`(`extension_value`) VALUES ('.example.com')");

$sql = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS `uiisc_news`(
  `news_id` INT(11) NOT NULL AUTO_INCREMENT,
  `news_subject` VARCHAR(255) NOT NULL,
  `news_content` VARCHAR(5000) NOT NULL,
  `news_status` INT(1) NOT NULL,
  `news_date` VARCHAR(20) NOT NULL,
  `news_lastupdated` VARCHAR(20) NOT NULL,
  PRIMARY KEY(`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;');

$sql = mysqli_query($connect, "CREATE TABLE IF NOT EXISTS `uiisc_emails`(
  `email_id` INT(11) NOT NULL AUTO_INCREMENT,
  `email_client_id` INT(11) NOT NULL COMMENT '所属客户ID',
  `email_date` VARCHAR(255) NOT NULL COMMENT '邮件发送日期',
  `email_to` VARCHAR(255) NOT NULL COMMENT '邮件接收人',
  `email_subject` VARCHAR(255) NOT NULL COMMENT '邮件主题',
  `email_body` TEXT NOT NULL COMMENT '邮件内容',
  `email_read` INT(1) NOT NULL DEFAULT '0' COMMENT '站内消息是否阅读',
  PRIMARY KEY(`email_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;");
