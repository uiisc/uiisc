<?php

function get_filemanager_url($api_cpanel_url, $account_username, $account_password, $domain = '')
{
    $ftp = str_replace('cpanel', 'ftp', $api_cpanel_url);
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
    return 'https://filemanager.ai/new/#/c/' . $ftp . '/' . $account_username . '/' . $params;
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
