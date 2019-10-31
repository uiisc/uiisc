<?php

if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}

$err = getMsg("errors");
$data = getMsg("form_data");
$reset_code = "";

if (isset($_GET["reset_code"]) && !empty($_GET["reset_code"])) {
    $code = filter_input(INPUT_GET, "reset_code", FILTER_SANITIZE_STRING);
    if (checkUserByCode($code)) {
        $reset_code = $code;
    } else {
        setMsg("msg_notify", "The reset code is invalid.", "warning");
        redirect("clientarea", "login");
    }
} else {
    setMsg("msg_notify", "The reset code is empty.", "warning");
    redirect("clientarea", "login");
}

if (isset($_POST["reset_password"])) {
    $errors = array();
    $reset_code = filter_input(INPUT_POST, "reset_code", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "new-password", FILTER_SANITIZE_STRING);
    $confirm_password = filter_input(INPUT_POST, "confirm-password", FILTER_SANITIZE_STRING);
    if (strlen($reset_code) != 32) {
        $errors["code_err"] = "The reset code is invalid.";
    }
    if (empty($password)) {
        $errors["password_err"] = "The password is empty.";
    } elseif (strlen($password) > 20 || strlen($password) < 5) {
        $errors["password_err"] = "Password min limit is 5 & max is 20 characters";
    }
    if (empty($confirm_password)) {
        $errors["confirm_password_err"] = "The password is empty.";
    } elseif ($password != $confirm_password) {
        $errors["confirm_password_err"] = "The password does not match.";
    }
    if (!count($errors)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $objDB->prepare(
            "UPDATE users SET reset_code= '', is_active=1, password=? WHERE reset_code=?"
        );
        $stmt->bind_param("ss", $password, $reset_code);
        if ($stmt->execute()) {
            setMsg("msg_notify", "Your account password has been reset, you can login now.");
            redirect("clientarea", "login");
        }
    } else {
        $data = [
            "password" => $password,
            "confirm_password" => $confirm_password,
        ];
        setMsg("form_data", $data);
        setMsg("errors", $errors);
        redirect("clientarea", "reset_password", ["reset_code" => $reset_code]);
    }
}
