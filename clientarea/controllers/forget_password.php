<?php

if (!defined('IN_SYS')) {
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
        $code = md5(crypt(rand(), "aa"));
        $stmt = $objDB->prepare(
            "UPDATE users SET is_active = 0, reset_code=? WHERE email=?"
        );
        $stmt->bind_param("ss", $code, $email);
        if ($stmt->execute()) {
            setMsg("msg_notify", "You made a password request, please check email to reset your password.", "success");
            $message = "Hi! You requested password reset, . You need to click here to <a href='" . setURL('clientarea', 'reset_password') . "&reset_code=$code'>reset your password.</a>";
            echo $message;
            send_mail([
                "to" => $email,
                "message" => $message,
                "subject" => "Reset Password Requested"
            ]);
        } else {
            setMsg("msg_notify", "reset password request, Please try again later.", "warning");
        }
    }
}
