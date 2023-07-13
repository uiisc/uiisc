DROP TABLE IF EXISTS `pre_account`;
CREATE TABLE `pre_account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主机账号ID',
  `account_client_id` int(11) NOT NULL COMMENT '所属客户ID',
  `account_key` varchar(8) NOT NULL,
  `account_api_key` varchar(20) NOT NULL COMMENT '主机提供商类型',
  `account_username` varchar(22) NOT NULL,
  `account_password` varchar(16) NOT NULL,
  `account_domain` varchar(70) NOT NULL,
  `account_sql` varchar(8) NOT NULL,
  `account_status` int(1) NOT NULL COMMENT '0未激活1已激活2禁用3删除',
  `account_addtime` datetime NOT NULL,
  `account_signup_ip` varchar(20) DEFAULT NULL COMMENT '注册IP',
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `pre_account_api`;
CREATE TABLE `pre_account_api` (
  `api_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `api_type` varchar(30) NOT NULL,
  `api_key` varchar(30) NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `pre_account_callback`;
CREATE TABLE `pre_account_callback` (
  `callback_id` int(11) NOT NULL AUTO_INCREMENT,
  `callback_date` varchar(30) NOT NULL COMMENT 'date',
  `callback_client_id` int(11) DEFAULT NULL COMMENT '所属客户ID',
  `callback_username` varchar(22) NOT NULL COMMENT '主机账号用户名',
  `callback_action` varchar(30) NOT NULL COMMENT '操作事件',
  `callback_comments` varchar(500) DEFAULT NULL COMMENT '备注信息',
  `callback_raw` text NOT NULL COMMENT '接收的完整数据',
  PRIMARY KEY (`callback_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `pre_account_domain`;
CREATE TABLE `pre_account_domain` (
  `domain_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主机账号ID',
  `domain_account_id` int(11) NOT NULL COMMENT '托管账号ID',
  `domain_name` varchar(255) NOT NULL COMMENT '域名',
  PRIMARY KEY (`domain_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `pre_account_hostname`;
CREATE TABLE `pre_account_hostname` (
  `host_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `api_id` int(11) NOT NULL,
  `host_name` varchar(70) NOT NULL,
  PRIMARY KEY (`host_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `pre_admin`;
CREATE TABLE `pre_admin` (
  `admin_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `admin_fname` varchar(30) NOT NULL,
  `admin_lname` varchar(30) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_key` varchar(8) NOT NULL,
  `admin_password` varchar(70) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `pre_builder_api`;
CREATE TABLE `pre_builder_api` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `builder_id` varchar(7) NOT NULL,
  `builder_username` varchar(100) NOT NULL,
  `builder_password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `pre_clients`;
CREATE TABLE `pre_clients` (
  `client_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `client_fname` varchar(30) NOT NULL,
  `client_lname` varchar(30) NOT NULL,
  `client_email` varchar(70) NOT NULL,
  `client_phone` varchar(30) NOT NULL,
  `client_address` varchar(50) NOT NULL,
  `client_country` varchar(40) NOT NULL,
  `client_city` varchar(30) NOT NULL,
  `client_pcode` varchar(20) NOT NULL,
  `client_key` varchar(8) NOT NULL,
  `client_state` varchar(30) NOT NULL,
  `client_status` int(1) NOT NULL,
  `client_company` varchar(50) NOT NULL,
  `client_password` varchar(64) NOT NULL,
  `client_signup_ip` varchar(20) DEFAULT NULL COMMENT '注册IP',
  `client_addtime` datetime NOT NULL,
  `client_updatetime` datetime DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `pre_config`;
CREATE TABLE `pre_config` (
  `site_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `site_key` varchar(20) NOT NULL,
  `site_status` int(2) NOT NULL,
  `site_name` varchar(30) NOT NULL,
  `site_brand` varchar(30) NOT NULL,
  `site_company` varchar(30) NOT NULL,
  `site_path` varchar(70) NOT NULL,
  `site_phone` varchar(30) NOT NULL,
  `site_email` varchar(50) NOT NULL,
  `site_build_year` int(4) NOT NULL,
  `page_title` varchar(80) NOT NULL,
  `page_description` varchar(200) NOT NULL,
  `page_keywords` varchar(100) NOT NULL,
  `page_copyright` varchar(100) NOT NULL,
  `page_author` varchar(30) NOT NULL,
  `ifastnet_aff` int(11) DEFAULT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `pre_emails`;
CREATE TABLE `pre_emails` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_client_id` int(11) NOT NULL COMMENT '所属客户ID',
  `email_date` varchar(255) NOT NULL,
  `email_to` varchar(255) NOT NULL,
  `email_subject` varchar(255) NOT NULL,
  `email_body` text NOT NULL,
  `email_read` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `pre_knowledgebase`;
CREATE TABLE `pre_knowledgebase` (
  `knowledgebase_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `knowledgebase_subject` varchar(200) NOT NULL,
  `knowledgebase_content` varchar(10000) NOT NULL,
  `knowledgebase_date` varchar(20) NOT NULL,
  PRIMARY KEY (`knowledgebase_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `pre_news`;
CREATE TABLE `pre_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_date` varchar(20) NOT NULL,
  `news_subject` varchar(255) NOT NULL,
  `news_content` varchar(5000) NOT NULL,
  `news_status` int(1) NOT NULL,
  `news_lastupdated` varchar(20) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `pre_smtp`;
CREATE TABLE `pre_smtp` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `smtp_key` varchar(4) NOT NULL,
  `smtp_host` varchar(50) NOT NULL,
  `smtp_username` varchar(50) NOT NULL,
  `smtp_password` varchar(100) NOT NULL,
  `smtp_port` varchar(4) NOT NULL,
  `smtp_from` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `pre_ssl`;
CREATE TABLE `pre_ssl` (
  `ssl_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ssl_api_id` int(11) NOT NULL COMMENT '所属客户ID',
  `ssl_client_id` int(11) NOT NULL COMMENT '所属客户ID',
  `ssl_third_id` int(12) NOT NULL COMMENT '第三方标识ID',
  `ssl_status` varchar(20) DEFAULT NULL COMMENT '状态',
  `ssl_domain` varchar(255) DEFAULT NULL COMMENT '主域名',
  `ssl_dcv_method` varchar(20) DEFAULT NULL COMMENT '验证方式',
  `ssl_admin_email` varchar(255) DEFAULT NULL COMMENT '管理员邮箱',
  `ssl_begin_date` varchar(30) DEFAULT NULL COMMENT '有效期开始日期',
  `ssl_end_date` varchar(30) DEFAULT NULL COMMENT '有效期结束日期',
  `ssl_ca_code` varchar(5000) DEFAULT NULL COMMENT 'CA证书',
  `ssl_crt_code` varchar(5000) DEFAULT NULL COMMENT '证书内容',
  `ssl_csr_code` varchar(5000) DEFAULT NULL COMMENT '证书请求信息',
  `ssl_raw` text COMMENT '第三方完整数据',
  PRIMARY KEY (`ssl_id`),
  KEY `ssl_client_id` (`ssl_client_id`),
  KEY `ssl_status` (`ssl_status`),
  KEY `ssl_third_id` (`ssl_third_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `pre_ssl_api`;
CREATE TABLE `pre_ssl_api` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `api_type` varchar(20) NOT NULL COMMENT '供应商类型',
  `api_name` varchar(20) NOT NULL COMMENT '供应商标识',
  `api_username` varchar(256) NOT NULL COMMENT 'API账号',
  `api_password` varchar(256) NOT NULL COMMENT 'API密码',
  `api_token` varchar(100) DEFAULT NULL COMMENT 'API密钥',
  `api_token_expiretime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `pre_ticket_replies`;
CREATE TABLE `pre_ticket_replies` (
  `reply_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `reply_for` int(11) NOT NULL,
  `reply_from` varchar(8) NOT NULL,
  `reply_content` varchar(1000) NOT NULL,
  `reply_date` varchar(20) NOT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `pre_tickets`;
CREATE TABLE `pre_tickets` (
  `ticket_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_client_id` int(11) NOT NULL,
  `ticket_unique_id` int(6) NOT NULL,
  `ticket_subject` varchar(50) NOT NULL,
  `ticket_email` varchar(100) NOT NULL,
  `ticket_department` varchar(10) NOT NULL,
  `ticket_content` varchar(1000) NOT NULL,
  `ticket_status` int(11) NOT NULL,
  `ticket_date` varchar(20) NOT NULL,
  PRIMARY KEY (`ticket_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4;
