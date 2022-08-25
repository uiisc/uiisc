<?php

if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}
if (isUserLoggedIn()) {
    setMsg("msg_notify", "You need to logout before register for a new account.", "warning");
    redirect("clientarea", "details");
}

$err = getMsg("errors");
$data = getMsg("form_data");

if (isset($_POST["register"])) {
    $errors = array();
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $website = filter_input(INPUT_POST, "website", FILTER_SANITIZE_URL);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    $confirm_password = filter_input(INPUT_POST, "confirm_password", FILTER_SANITIZE_STRING);

    if (strlen($name) > 50 || strlen($name) < 6) {
        $errors["name_err"] = "Name min limit is 6 & max is 50 characters";
    }

    if (strlen($username) > 15 || strlen($username) < 5) {
        $errors["username_err"] = "Username min limit is 5 & max is 15 characters";
    } elseif (checkUserByUsername($username)) {
        $errors["username_err"] = "Username already exists";
    }

    if (!is_email($email)) {
        $errors["email_err"] = "The email address is invalid.";
    } elseif (checkUserByEmail($email)) {
        $errors["email_err"] = "The email address already exists in system.";
    }

    if (empty($website)) {
        $errors["website_err"] = "Invalid entry";
    }

    if (strlen($password) > 20 || strlen($password) < 5) {
        $errors["password_err"] = "Password min limit is 5 & max is 20 characters";
    }

    if ($password != $confirm_password || empty($confirm_password)) {
        $errors["confirm_password_err"] = "Password does not match or empty";
    }

    if (!count($errors)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $code = md5(crypt(rand(), "aa"));
        $stmt = $objDB->prepare(
            "INSERT INTO users(name, email, username, password, website, created_at, reset_code)
            VALUES(?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("sssssis", $name, $email, $username, $password, $website, time(), $code);
        if ($stmt->execute()) {
            setMsg("msg_notify", "Your account has been created successfully.Please, check your email to verify.", "warning");
            $message = "Hi! You requested an account on our website, in order to use this account. You need to click here to <a href='" . setURL('clientarea', 'account_verify') . "&code=$code'>Verify</a> it.";
            send_mail([
                "to" => $email,
                "message" => $message,
                "subject" => "Account Verficiation"
            ]);
            redirect("clientarea", "login");
        }
    } else {
        $data = [
            "name" => $name,
            "username" => $username,
            "email" => $email,
            "website" => $website,
            "password" => $password,
            "confirm_password" => $confirm_password,
        ];
        setMsg("form_data", $data);
        setMsg("errors", $errors);
        redirect("clientarea", "register");
    }
}
