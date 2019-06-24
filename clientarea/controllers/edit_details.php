<?php

if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}

if (!isUserLoggedIn()) {
    setMsg("msg_notify", "You need to login before accessing the Edit Account Details page.", "warning");
    redirect("clientarea", "login");
}

$err = getMsg("errors");
$data = getMsg("form_data");
$userAvatar = (!empty($user->image)) ? '/clientarea/images/' . $user->image : "http://via.placeholder.com/150x150";

if (isset($_POST["edit"])) {

    $errors = array();

    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $website = filter_input(INPUT_POST, "website", FILTER_SANITIZE_URL);
    $image = isset($_FILES["image"]) ? $_FILES["image"] : "";

    $user = $_SESSION["user"];

    if (strlen($name) > 50 || strlen($name) < 6) {
        $errors["name_err"] = "Name min limit is 6 & max is 50 characters";
    }

    if (strlen($username) > 15 || strlen($username) < 5) {
        $errors["username_err"] = "Username min limit is 5 & max is 15 characters";
    }

    if (!is_email($email)) {
        $errors["email_err"] = "The email address is invalid.";
    }

    if (empty($website)) {
        $errors["website_err"] = "Invalid entry";
    }

    if ($image["error"] != 4) {
        if (!is_dir(APPROOT . "/images")) {
            mkdir(APPROOT . "/images");
        }

        if ($image["error"] == 4) {
            $errors["image_err"] = "Please, upload file";
        } elseif ($image["type"] != "image/png" && $image["type"] != "image/jpeg") {
            $errors["image_err"] = "Only, png/jpeg image is allowed";
        }

        $image_info = pathinfo($image["name"]);
        extract($image_info);
        $image_convention = $filename . time() . ".$extension";

        move_uploaded_file($image["tmp_name"], APPROOT . "/images/" . $image_convention);
    } else {
        $image_convention = $user->image;
    }

    if (!count($errors)) {
        $stmt = $objDB->prepare(
            "UPDATE users SET name = ?, email = ?, username=?, website=?, image=? WHERE id=?"
        );
        $stmt->bind_param("sssssi", $name, $email, $username, $website, $image_convention, $user->id);

        if ($stmt->execute()) {
            setMsg("msg_notify", "Your account has been updated successfully.");
        }

        $_SESSION["user"] = getUserById($user->id);
        redirect("clientarea", "details");
    } else {
        setMsg("errors", $errors);
        redirect("clientarea", "edit_details");
    }
}
