<?php

function objDB()
{
    $objDB = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($objDB->connect_error) {
        die("Connection not established");
    }
    return $objDB;
}

function upload_image($image)
{

    if (!is_dir(APPROOT . "/images")) {
        mkdir(APPROOT . "/images");
    }

    if ($image["error"] == 4) {
        die("image file not uploaded");
    }

    if ($image["type"] != "image/png") {
        die("Only, png image files are allowed");
    }

    $image_info = pathinfo($image["name"]);
    extract($image_info);
    $image_convention = $filename . time() . ".$extension";

    if (move_uploaded_file($image["tmp_name"], APPROOT . "/images/" . $imageConvention)) {
        return $image_convention;
    } else {
        return false;
    }
}

function cTime($timestamp)
{
    return date("Y-m-d H:i:s", $timestamp);
}

function checkUserByEmail($email)
{

    $objDB = objDB();
    $stmt = $objDB->prepare(
        "SELECT * FROM users WHERE email=?"
    );

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    return $stmt->num_rows;
}

function checkUserByUsername($username)
{

    $objDB = objDB();
    $stmt = $objDB->prepare(
        "SELECT * FROM users WHERE username=?"
    );
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    return $stmt->num_rows;
}

function checkUserActivation($username)
{

    $objDB = objDB();
    $stmt = $objDB->prepare(
        "SELECT * FROM users WHERE username=? AND is_active=1"
    );
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    return $stmt->num_rows;
}

function setMsg($name, $value, $class = "success")
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

function getUserById($user_id)
{

    $objDB = objDB();
    $stmt = $objDB->prepare(
        "SELECT * FROM users WHERE id=?"
    );
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_object();
}

function verifyUserAccount($code)
{

    $objDB = objDB();
    $stmt = $objDB->prepare(
        "UPDATE users SET is_active = 1 , reset_code = '' WHERE reset_code = ?"
    );
    $stmt->bind_param("s", $code);
    $stmt->execute();
    $stmt->store_result();
    return $stmt->affected_rows;
}

function checkUserByCode($code)
{
    $objDB = objDB();
    $stmt = $objDB->prepare(
        "SELECT * FROM users WHERE reset_code = ?"
    );
    $stmt->bind_param("s", $code);
    $stmt->execute();
    $stmt->store_result();
    return $stmt->num_rows;
}

function isUserLoggedIn()
{
    if (isset($_SESSION["user"]) || isset($_COOKIE["user"])) {
        return true;
    } else {
        return false;
    }
}

function get_userinfo()
{
    return isUserLoggedIn() ? isset($_COOKIE["user"]) ? unserialize($_COOKIE["user"]) : $_SESSION["user"] : "";
}

function send_mail($detail = array())
{
    if (!empty($detail["to"]) && !empty($detail["message"]) && !empty($detail["subject"])) {
        $to = $detail["to"];
        $totitle = isset($detail["totitle"]) ? $detail["totitle"] : "";
        $from = SMTP_MAILADDR;
        $fromtitle = isset($detail["fromtitle"]) ? $detail["fromtitle"] : "";
        $subject = $detail["subject"];
        $body = $detail["message"];
        $mailtype = "HTML"; // HTML/TXT

        $smtp = new MailSMTP(SMTP_SERVER, SMTP_PORT, true, SMTP_USERNAME, SMTP_PASSWORD);
        $smtp->debug = false;
        $res = $smtp->sendmail($to, $totitle, $from, $fromtitle, $subject, $body, $mailtype);
        if (!$res) {
            return false;
        } else {
            return true;
        }
    } else {
        die("Your Mail Handler requires four main paramters");
    }
}

/**
 * redirect to functions URL
 */
function redirect($module, $section = "", $param = [])
{
    $url = $param ? setRouter($module, $section) . "&" . http_build_query($param) : setRouter($module, $section);
    // $param = $param ? http_build_query($param) : "";
    // $url = $section ? setRouter($module, $section) . "&" . $param : setRouter($module) . "?" . $param;
    header("Location: {$url}");
    exit;
}

/** make router URL
 * @param mixed $module
 * @param mixed $section
 * @return string
 */
function setRouter($module, $section = "")
{
    return empty($section) ? "{$module}.php" : "{$module}.php?s=$section";
}

/** make a full path http URL
 * @param mixed $module
 * @param mixed $section
 * @return string
 */
function setURL($module, $section = "")
{
    return empty($section) ? URLROOT . "/{$module}.php" : URLROOT . "/{$module}.php?s=$section";
}

/** Determine if a variable is an email address
 * 
 * @param string $email
 * @return bool
 */
function isemail($email = "")
{
    return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/", $email);
}
