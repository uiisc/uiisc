<?php

if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}

$err = getMsg("errors");
$data = getMsg("form_data");

if (isset($_POST["request-activate-account"])) {
    $errors = array();
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    if (!is_email($email)) {
        $errors["email_err"] = "The email address is invalid.";
    } elseif (!checkUserByEmail($email)) {
        $errors["email_err"] = "The email address not found in system.";
    }

    if (!count($errors)) {
        $code = md5(crypt(rand(), "aa"));
        $stmt = $objDB->prepare(
            "UPDATE users SET reset_code=? WHERE email=?"
        );
        $stmt->bind_param("ss", $code, $email);
        if ($stmt->execute()) {
            setMsg("msg_notify", "Please check your email to verify your account", "warning");
            $message = "Hi! You requested account verification. You need to click here to <a href='" . setURL('clientarea', 'account_verify') . "&code=$code'>activate your account.</a>";
            send_mail([
                "to" => $email,
                "message" => $message,
                "subject" => "Account Verification Request",
            ]);
        }
    } else {
        $data = [
            "email" => $email,
        ];
        setMsg("form_data", $data);
        setMsg("errors", $errors);
    }
}
