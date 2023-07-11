<?php

function get_client_ip()
{
    $ip = '';
    if (getenv('HTTP_CLIENT_IP')) {
        $ip = getenv('HTTP_CLIENT_IP');
    } else if (getenv('HTTP_X_FORWARDED_FOR')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    } else if (getenv('HTTP_X_FORWARDED')) {
        $ip = getenv('HTTP_X_FORWARDED');
    } else if (getenv('HTTP_FORWARDED_FOR')) {
        $ip = getenv('HTTP_FORWARDED_FOR');
    } else if (getenv('HTTP_FORWARDED')) {
        $ip = getenv('HTTP_FORWARDED');
    } else if (getenv('REMOTE_ADDR')) {
        $ip = getenv('REMOTE_ADDR');
    } else {
        $ip = 'UNKNOWN';
    }

    return $ip;
}

function get_client_os()
{

    $os_platform = "Unknown OS Platform";
    $os_array = array(
        '/windows nt 11/i' => 'Windows 11',
        '/windows nt 10/i' => 'Windows 10',
        '/windows nt 6.3/i' => 'Windows 8.1',
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/windows nt 6.0/i' => 'Windows Vista',
        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i' => 'Windows XP',
        '/windows xp/i' => 'Windows XP',
        '/windows nt 5.0/i' => 'Windows 2000',
        '/windows me/i' => 'Windows ME',
        '/win98/i' => 'Windows 98',
        '/win95/i' => 'Windows 95',
        '/win16/i' => 'Windows 3.11',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i' => 'Mac OS 9',
        '/linux/i' => 'Linux',
        '/ubuntu/i' => 'Ubuntu',
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile',
    );

    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $_SERVER['HTTP_USER_AGENT'])) {
            $os_platform = $value;
        }
    }
    return $os_platform;
}

function get_client_browser()
{

    $browser = "Unknown Browser";

    $browser_array = array(
        '/msie/i' => 'Internet Explorer',
        '/Trident/i' => 'Internet Explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i' => 'Safari',
        '/edg/i' => 'Edge',
        '/chrome/i' => 'Chrome',
        '/opera/i' => 'Opera',
        '/netscape/i' => 'Netscape',
        '/maxthon/i' => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
        '/ubrowser/i' => 'UC Browser',
        '/mobile/i' => 'Handheld Browser',
    );

    foreach ($browser_array as $regex => $value) {

        if (preg_match($regex, $_SERVER['HTTP_USER_AGENT'])) {
            $browser = $value;
        }
    }

    return $browser;
}

function get_client_device()
{

    $tablet_browser = 0;
    $mobile_browser = 0;

    if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
        $tablet_browser++;
    }

    if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
        $mobile_browser++;
    }

    if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
        $mobile_browser++;
    }

    $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
    $mobile_agents = array(
        'w3c ', 'acs-', 'alav', 'alca', 'amoi', 'audi', 'avan', 'benq', 'bird', 'blac',
        'blaz', 'brew', 'cell', 'cldc', 'cmd-', 'dang', 'doco', 'eric', 'hipt', 'inno',
        'ipaq', 'java', 'jigs', 'kddi', 'keji', 'leno', 'lg-c', 'lg-d', 'lg-g', 'lge-',
        'maui', 'maxo', 'midp', 'mits', 'mmef', 'mobi', 'mot-', 'moto', 'mwbp', 'nec-',
        'newt', 'noki', 'palm', 'pana', 'pant', 'phil', 'play', 'port', 'prox',
        'qwap', 'sage', 'sams', 'sany', 'sch-', 'sec-', 'send', 'seri', 'sgh-', 'shar',
        'sie-', 'siem', 'smal', 'smar', 'sony', 'sph-', 'symb', 't-mo', 'teli', 'tim-',
        'tosh', 'tsm-', 'upg1', 'upsi', 'vk-v', 'voda', 'wap-', 'wapa', 'wapi', 'wapp',
        'wapr', 'webc', 'winw', 'winw', 'xda ', 'xda-'
    );

    if (in_array($mobile_ua, $mobile_agents)) {
        $mobile_browser++;
    }

    if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'opera mini') > 0) {
        $mobile_browser++;
        // Check for tablets on opera mini alternative headers
        $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA']) ? $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'] : (isset($_SERVER['HTTP_DEVICE_STOCK_UA']) ? $_SERVER['HTTP_DEVICE_STOCK_UA'] : ''));
        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
            $tablet_browser++;
        }
    }

    if ($tablet_browser > 0) {
        // do something for tablet devices
        return 'Tablet';
    } else if ($mobile_browser > 0) {
        // do something for mobile devices
        return 'Mobile';
    } else {
        // do something for everything else
        return 'Computer';
    }
}

function get_filemanager_url($ftp_host, $account_username, $account_password, $domain = '')
{
    $params = base64_encode(
        json_encode(
            array(
                't' => 'ftp',
                'c' => array(
                    'v' => 1,
                    'p' => $account_password,
                    'i' => empty($domain) ? '/htdocs' : '/' . $domain . '/htdocs/',
                ),
            )
        )
    );
    return 'https://filemanager.ai/new/#/c/' . $ftp_host . '/' . $account_username . '/' . $params;
}

function upload_image($image)
{

    if (!is_dir(ROOT . '/images')) {
        mkdir(ROOT . '/images');
    }

    if ($image['error'] == 4) {
        die('image file not uploaded');
    }

    if ($image['type'] != 'image/png') {
        die('Only, png image files are allowed');
    }

    $image_info = pathinfo($image['name']);
    extract($image_info);
    $image_convention = $filename . time() . '.$extension';

    if (move_uploaded_file($image['tmp_name'], ROOT . '/images/' . $imageConvention)) {
        return $image_convention;
    } else {
        return false;
    }
}

function cTime($t = '')
{
    return isset($t) && $t != '' ? date("Y-m-d H:i:s", $t) : '';
}

function get_execution_time()
{
    // $starttime = explode(' ', microtime());
    global $start_time;
    // 程序运行时间
    $endtime = explode(' ', microtime());
    $t = $endtime[0] + $endtime[1] - ($start_time[0] + $start_time[1]);
    return round($t, 3);
}

function get($field = '', $default = '')
{
    if (!$field) {
        return $_GET;
    }
    if (!isset($_GET[$field])) {
        return $default ? $default : false;
    }
    if (is_string($_GET[$field])) {
        return trim(htmlspecialchars($_GET[$field]));
    }
    return $_GET[$field];
}

function post($field = '', $default = '')
{
    if (!$field) {
        return $_POST;
    }

    if (!isset($_POST[$field])) {
        return $default ? $default : false;
    }
    if (is_string($_POST[$field])) {
        return trim(htmlspecialchars($_POST[$field]));
    }
    return $_POST[$field];
}

/**
 * API Response
 */
function send_response($code = 200, $data = NULL, $msg = '')
{
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    // header("Access-Control-Allow-Headers: DNT,X-Mx-ReqToken,Keep-Alive,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type,Authorization");
    header("Content-Type: application/json");
    $raw = array(
        'code' => $code,
        'data' => isset($data) && !empty($data) ? $data : NULL,
        'msg' => $msg,
    );
    $raw = json_encode($raw);
    // echo $raw;
    exit($raw);
}

// 格式化输出
function dump($data = '')
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

// 随机生成字符串（字母+数字）
function randstr($count = 6)
{
    $res = '';
    // 将你想要的字符添加到下面字符串中，默认是数字0-9和26个英文字母
    $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $m = strlen($str) - 1;
    for ($i = 0; $i < $count; $i++) {
        // 将这个字符串当作一个数组，随机取出一个字符，并循环拼接成你需要的位数
        $res .= $str[rand(0, $m)];
    }
    return $res;
}

function setMessage($message, $class_name = 'success')
{
    $_SESSION['message'] = '<div class="alert alert-' . $class_name . '" role="alert">
    <button class="close" data-dismiss="alert" type="button" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    ' . $message . '
</div>';
}

function getMessage()
{
    if (isset($_SESSION['message'])) {
        echo ($_SESSION['message']);
        unset($_SESSION['message']);
    }
}

function setMsg($name, $value, $class = 'success')
{
    if (is_array($value)) {
        $_SESSION[$name] = $value;
    } else {
        $_SESSION[$name] = "<div class='alert alert-$class text-center'>$value</div>";
    }
}

function getMsg($name)
{
    if (isset($_SESSION[$name])) {
        $session = $_SESSION[$name];
        unset($_SESSION[$name]);
        return $session;
    }
}

function isUserLoggedIn()
{
    if (isset($_SESSION['user']) || isset($_COOKIE['user'])) {
        return true;
    } else {
        return false;
    }
}

function get_userinfo()
{
    if (isUserLoggedIn()) {
        return isset($_COOKIE['user']) ? unserialize($_COOKIE['user']) : $_SESSION['user'];
    }
    return '';
}

function send_mail($detail = array())
{
    if (!empty($detail['to']) && !empty($detail['message']) && !empty($detail['subject'])) {
        $to = $detail['to'];
        $totitle = isset($detail['totitle']) ? $detail['totitle'] : '';
        $from = SMTP_MAILADDR;
        $fromtitle = isset($detail['fromtitle']) ? $detail['fromtitle'] : 'UIISC';
        $subject = $detail['subject'];
        $body = $detail['message'];
        $mailtype = 'HTML'; // HTML/TXT

        $smtp = new \lib\MailSMTP(SMTP_SERVER, SMTP_USERNAME, SMTP_PASSWORD, SMTP_PORT);
        $res = $smtp->sendmail($from, $to, $subject, $body, $totitle, $fromtitle, $mailtype);
        if (!$res) {
            return false;
        } else {
            return true;
        }
    } else {
        die('Your Mail Handler requires four main paramters');
    }
}

/**
 * redirect to router URL
 */
function redirect($module, $section = '', $param = array(), $anchor = '')
{
    header('Location: ' . setURL($module, $section, $param, $anchor));
    exit;
}

/** make router URL
 * @param mixed $module
 * @param mixed $section
 * @return string
 */
function setRouter($module, $section = '', $param = array(), $anchor = '')
{
    if (!empty($section)) {
        $param = array_merge(array('s' => $section), $param);
    }

    if (empty($param)) {
        return $module . '.php' . $anchor;
    }
    return $module . '.php?' . http_build_query($param) . $anchor;
}

/** make a full path http URL
 * @param mixed $module
 * @param mixed $section
 * @return string
 */
function setURL($module, $section = '', $param = array(), $anchor = '')
{
    return SITEURL . '/' . setRouter($module, $section, $param, $anchor);
}

/** Determine if a variable is an email address
 *
 * @param string $email
 * @return bool
 */
function is_email($email = '')
{
    return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/", $email);
}

/** check PHP version
 * @return bool
 */
function getVersion()
{
    if ((float) phpversion() < 5.5) {
        exit('requires the php version 5.5.+');
    }
}

function setProtect($x)
{
    return htmlentities(htmlspecialchars($x));
}

/**
 * logout, clear session UIISC_ADMIN
 */
function logout()
{
    if (isset($_SESSION['UIISC_ADMIN'])) {
        unset($_SESSION['UIISC_ADMIN']);
        setMessage('Logged out <b>successfully!</b>');
    } else {
        setMessage('Login to <b>continue!</b>', 'danger');
    }
}

function email_build_body($title, $nickname, $content, $description = '')
{
    return '<div class="container" style="margin:20px 5px;font-family: Arial, Helvetica, sans-serif;">
    <h2 style="text-align:center;"><b>' . $title . '</b></h2>
    <hr />
    <h3>Dear ' . $nickname . ',</h3>
    <div>' . $content . '</div>
    <div>' . $description . '</div>
    <hr />
    <p>After you login to your account you can use any service ❤</p>
    <p>Best Regards</p>
    <p>' . date('Y-m-d H:i:s') . '</p>
    <hr />
    <div style="text-align:center;">
        <p>Need our help ?</p>
        <p><a href="' . setURL('clientarea/tickets', '', array('action' => 'add')) . '">We are here to help you out !</a></p>
        <p><b>UIISC</b></p>
    </div>
</div>';
}

function checkRefererHost()
{
    if (!isset($_SERVER['HTTP_REFERER']) || !$_SERVER['HTTP_REFERER']) return false;
    $url_arr = parse_url($_SERVER['HTTP_REFERER']);
    $http_host = $_SERVER['HTTP_HOST'];
    if (strpos($http_host, ':')) $http_host = substr($http_host, 0, strpos($http_host, ':'));
    return $url_arr['host'] === $http_host;
}

function checkIfActive($string)
{
    $array = explode(',', $string);
    $php_self = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '/') + 1, strrpos($_SERVER['REQUEST_URI'], '.') - strrpos($_SERVER['REQUEST_URI'], '/') - 1);
    if (in_array($php_self, $array)) {
        return 'active';
    } elseif (isset($_GET['m']) && in_array($_GET['m'], $array)) {
        return 'active';
    }
    return null;
}
