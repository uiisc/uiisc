<?php

if (!isset($_POST['submit'])) {
    exit();
}

include __DIR__ . '/../application.php';

try {
    $DB = new PDO("mysql:host=" . $dbconfig['hostname'] . ";dbname=" . $dbconfig['dbname'] . ";port=" . $dbconfig['dbport'], $dbconfig['username'], $dbconfig['password']);
} catch (Exception $e) {
    $_SESSION['message'] = '<div class="alert alert-danger" role="alert">
        <button class="close" data-dismiss="alert" type="button" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Connection not established
    </div>';
    header('location: ../install.php');
    exit;
}

if (empty($errorMsg)) {
    $FormData = array(
        'fname' => $_POST['first'],
        'lname' => $_POST['last'],
        'password' => hash('sha256', $_POST['password']),
        'email' => $_POST['email'],
        'key' => substr(str_shuffle('qwertyuioplkjhgfdsazxcvbnm012345789QWERTYUIOPLKJHGFDSAZXCVBNM'), 0, 8),
    );

    $sql = "INSERT INTO `" . $dbconfig['prefix'] . "_admin` (`admin_fname`, `admin_lname`, `admin_email`, `admin_key`, `admin_password`) VALUES
    ('" . $FormData['fname'] . "', '" . $FormData['lname'] . "', '" . $FormData['email'] . "','" . $FormData['key'] . "', '" . $FormData['password'] . "')";

    // print_r($sql);exit;
    if ($DB->exec($sql)) {
        if ($DB->exec($sql)) {
            @file_put_contents(LOCK_FILE, 'success');
            if (file_exists(LOCK_FILE)) {
                $_SESSION['message'] = '<div class="alert alert-success" role="alert">
                    <button class="close" data-dismiss="alert" type="button" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Admin registered <b>successfully!</b>
                </div>';
                header('location: ../install.php?step=done');
                exit();
            }
        }
    }
} else {
    $_SESSION['message'] = `<div class="alert alert-danger" role="alert">
        <button class="close" data-dismiss="alert" type="button" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Something went's <b>wrong!</b>
    </div>`;
    header('location: ../install.php?step=1');
}
