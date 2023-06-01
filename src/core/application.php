<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);
error_reporting(-1);

if (defined('IN_CRONLITE')) {
    exit('Access Denied');
}

$start_time = explode(' ', microtime());
$static_release = '1559728996134';

header("X-Powered-By: UIISC");
header("Server: UIISC");
header("Content-Type: text/html; charset=UTF-8");

date_default_timezone_set('Asia/Shanghai');
session_start();

define('IN_CRONLITE', true);
define('APP_MODE', 'prod'); // prod, demo
define('APP_VERSION', '2.0.3');
define('DB_VERSION', '2021');
define('APP_BRAND', 'UIISC');
define('APP_DEBUG', false);
define('APP_ROOT', dirname(__FILE__) . '/');
define('ROOT', dirname(APP_ROOT));

if (!function_exists('is_https')) {
    function is_https()
    {
        if (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443) {
            return true;
        } elseif (isset($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1')) {
            return true;
        } elseif (isset($_SERVER['HTTP_X_CLIENT_SCHEME']) && $_SERVER['HTTP_X_CLIENT_SCHEME'] == 'https') {
            return true;
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
            return true;
        } elseif (isset($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == 'https') {
            return true;
        } elseif (isset($_SERVER['HTTP_EWS_CUSTOME_SCHEME']) && $_SERVER['HTTP_EWS_CUSTOME_SCHEME'] == 'https') {
            return true;
        }
        return false;
    }
}

define('HTTP_PROTOCOL', is_https() ? 'https' : 'http');
$site_domain = $_SERVER['HTTP_HOST'];
$scriptpath = str_replace('\\', '/', $_SERVER['SCRIPT_NAME']);
$site_path = substr($scriptpath, 0, strrpos($scriptpath, '/'));
$site_url = HTTP_PROTOCOL . '://' . $site_domain;

if (isset($_SERVER['PATH_INFO'])) {
    $path_info = trim(str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['PATH_INFO']), '/');
} else if ($_SERVER['REQUEST_URI']) {
    $request_uri = trim($_SERVER['REQUEST_URI']);
    $path_info = explode('?', $request_uri)[0];
    $path_info = trim(str_replace($site_path, '', $path_info));
}

define('SITE_DOMAIN', $site_domain);
define('SITEURL', $site_url);

include_once ROOT . '/data/config.php';
include_once __DIR__ . '/library/functions.php';
include_once __DIR__ . '/library/autoloader.php';

Autoloader::register();

$lang = new \lib\Language(ROOT . '/core/language/', ROOT . '/data/language/');

define('DB_PREFIX', $dbconfig['prefix']);

// Detect installation status 1
if (!$dbconfig['username'] || !$dbconfig['password'] || !$dbconfig['dbname']) {
    header('Content-type:text/html;charset=utf-8');
    echo '<p>The system is not installed ! (error code: 1002)</p><p><a href="/install/">Click to Install</a></p>';
    exit();
}

$DB = new \lib\PdoHelper($dbconfig);

// Detect installation status 2
if ($DB->query("SELECT * FROM `pre_admin` WHERE 1") == false) {
    header('Content-type:text/html;charset=utf-8');
    echo '<p>The system is not installed ! (error code: 1003)</p><p><a href="/install/">Click to Install</a></p>';
    exit();
}

$PageInfo = array('title' => 'UIISC', 'rel' => '');

// $CACHE = new \lib\Cache();
// $conf = $CACHE->pre_fetch();
// define('SYS_KEY', $conf['syskey']);
// if (!$conf['localurl']) {
//     $conf['localurl'] = $site_url;
// }

// $password_hash = '!@#%!s!0';

// if ($conf['version'] < DB_VERSION) {
//     if (!$install) {
//         header('Content-type:text/html;charset=utf-8');
//         echo '请先完成网站升级！<a href="/install/update.php"><font color=red>点此升级</font></a>';
//         exit();
//     }
// }

// include_once APP_ROOT . 'member.php';

if (!file_exists(ROOT . '/data/install.lock') && file_exists(ROOT . '/install/index.php')) {
    echo '<h2>检测到无 /data/install.lock 文件</h2><ul><li><font size="4">如果您尚未安装本程序，请<a href="/install/">前往安装</a></font></li><li><font size="4">如果您已经安装本程序，请手动放置一个空的 install.lock 文件到 /data 文件夹下，<b>为了您站点安全，在您完成它之前我们不会工作。</b></font></li></ul><br/><h4>为什么必须建立 install.lock 文件？</h4>它是安装保护文件，如果检测不到它，就会认为站点还没安装，此时任何人都可以安装/重装你的网站。<br/><br/>';
    exit();
}

// if ($conf['cdnpublic'] == 1) {
//     $cdnpublic = '//lib.baomitu.com/';
// } elseif ($conf['cdnpublic'] == 2) {
//     $cdnpublic = 'https://cdn.bootcdn.net/ajax/libs/';
// } elseif ($conf['cdnpublic'] == 4) {
//     $cdnpublic = '//s1.pstatp.com/cdn/expire-1-M/';
// } else {
//     $cdnpublic = '//cdn.staticfile.org/';
// }

$SiteConfig = $DB->find('config', '*', array('site_key' => 'UIISC'));

$page_title       = $SiteConfig['site_brand'];
$page_description = $SiteConfig['page_description'];
$page_keywords    = $SiteConfig['page_keywords'];
$page_author      = $SiteConfig['page_author'];
$page_copyright   = $SiteConfig['page_copyright'];
$ifastnet_aff     = !empty($SiteConfig['ifastnet_aff']) ? $SiteConfig['ifastnet_aff'] : '19474';
// $google_site_verification = "5O6Wxt0gIyGb7btMuXiQqddZJ516n-xBOW_9RLMBeSY";

// TODO: cache
$SmtpConfig = $DB->find('smtp', '*', array('smtp_key' => 'SMTP'));

define("SMTP_SERVER", $SmtpConfig['smtp_host']);
define("SMTP_PORT", $SmtpConfig['smtp_port']);
define("SMTP_MAILADDR", $SmtpConfig['smtp_username']);
define("SMTP_USERNAME", $SmtpConfig['smtp_username']);
define("SMTP_PASSWORD", $SmtpConfig['smtp_password']);
