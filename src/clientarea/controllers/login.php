<?php

if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}

if (isUserLoggedIn()) {
    setMsg("msg_notify", "You have already logged in.", "warning");
    redirect("clientarea", "details");
}

$err = getMsg("errors");
$data = getMsg("form_data");

if (isset($_POST["login"])) {
    $errors = array();
    $username = trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING));
    $password = trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));
    $remember = isset($_POST["remember-me"]) ? "Yes" : "";
    if (strlen($username) > 15 || strlen($username) < 5) {
        $errors["username_err"] = "Username min limit is 5 & max is 15 characters";
    } elseif (!checkUserByUsername($username)) {
        $errors["username_err"] = "Username not exists";
    } elseif (!checkUserActivation($username)) {
        $errors["username_err"] = 'Your account is not verified, click <a href="' . SetRouter('clientarea', 'request-account-activate') . '">here</a> to verify.';
    }

    if (strlen($password) > 20 || strlen($password) < 5) {
        $errors["password_err"] = "Password min limit is 5 & max is 20 characters";
    }
    if (!count($errors)) {
        $stmt = $objDB->prepare("SELECT * FROM users WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_object();
        if ($result->num_rows == 1) {
            if (password_verify($password, $user->password)) {
                if ($remember == "Yes") {
                    setcookie("user", serialize($user), time() + (86400 * 30), "/");
                } else {
                    $_SESSION["user"] = $user;
                }
                redirect("clientarea", "details");
            } else {
                setMsg("msg_notify", "Account not found, please enter correct credentials", "warning");
            }
        }
    } else {
        $data = [
            "username" => $username,
            "password" => $password,
        ];
        setMsg("form_data", $data);
        setMsg("errors", $errors);
        redirect("clientarea", "login");
    }
}
