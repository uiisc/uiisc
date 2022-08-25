<?php

if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}

if (isUserLoggedIn()) {
    setMsg("msg_notify", "You can change your password on the Change Password page.", "warning");
    redirect("clientarea", "change_password");
}

$err = getMsg("errors");
$data = getMsg("form_data");

if (isset($_POST["reset_request"])) {
    $errors = array();
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    if (empty($email)) {
        $errors["email_err"] = "The email address is empty.";
    } elseif (!is_email($email)) {
        $errors["email_err"] = "The email address is invalid.";
    } elseif (!checkUserByEmail($email)) {
        $errors["email_err"] = "The email address not found in system.";
    }
    if (count($errors)) {
        $data = [
            "email" => $email,
        ];
        setMsg("form_data", $data);
        setMsg("errors", $errors);
        redirect("clientarea", "forget_password");
    } else {
        $reset_code = md5(crypt(rand(), "aa"));
        $data = [
            "is_active" => 0,
            "reset_code" => $reset_code,
        ];
        $res = $dbpdo->update("users", $data, "`email` = '$email'");
        if ($res) {
            $data = ["email" => $email];
            setMsg("msg_notify", "You made a password request, please check email to reset your password.", "success");
            $message = "Hi! You requested password reset, . You need to click <a href='" . setURL('clientarea', 'reset_password', ['reset_code' => $reset_code]) . "'>here</a> to reset your password.";
            $msg_email = [
                "to" => $email,
                "message" => $message,
                "subject" => "Reset Password Requested"
            ];
            if (send_mail($msg_email)) {
                $dbpdo->add("emails", [
                    "date" => time(),
                    "subject" => "Reset Password Requested",
                    "body" => $message,
                    "user_id" => 1,
                ]);
            };
        } else {
            setMsg("msg_notify", "reset password request, Please try again later.", "warning");
        }
    }
}
