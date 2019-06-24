<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}

define("URLROOT", "http://crogroup.cn");
define("APPROOT", dirname(__FILE__));
define("DB_HOST", "bv2g0ksp.hk1027lan.dnstoo.com:3306");
define("DB_USER", "gcop2h_f");
define("DB_PASSWORD", "gdwst6ob");
define("DB_NAME", "gcop2h");
define("SMTP_SERVER", "smtp.u-id.cn");
define("SMTP_PORT", 25);
define("SMTP_MAILADDR", "croidc@u-id.cn");
define("SMTP_USERNAME", "croidc@u-id.cn");
define("SMTP_PASSWORD", "cro@IDC521");

$static_release = '1559728996134';
$brandName = "UIISC";
$siteURL = "http://crogroup.cn";
$iFastNetAff = 19474;
$CopyRightYear = "2013 - " . date("Y");
$author = 'Crogram Inc.';
$description = "uiisc, freewebhost, webhost, Crogram, iFastNet";
