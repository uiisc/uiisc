<?php

if (!isset($_POST['submit'])) {
    exit();
}

include __DIR__ . '/../application.php';

$FormData = array(
    'fname' => $_POST['first'],
    'lname' => $_POST['last'],
    'password' => hash('sha256', $_POST['password']),
    'email' => $_POST['email'],
    'key' => substr(str_shuffle('qwertyuioplkjhgfdsazxcvbnm012345789QWERTYUIOPLKJHGFDSAZXCVBNM'), 0, 8),
);

$sql = mysqli_query($connect, "INSERT INTO `uiisc_admin` (`admin_fname`, `admin_lname`, `admin_email`, `admin_key`, `admin_password`) VALUES
('" . $FormData['fname'] . "', '" . $FormData['lname'] . "', '" . $FormData['email'] . "','" . $FormData['key'] . "', '" . $FormData['password'] . "')");

if ($sql) {
    @file_put_contents(LOCK_FILE, 'success');

    if (file_exists(LOCK_FILE)) {
        $_SESSION['message'] = '<div class="alert alert-success" role="alert">
            <button class="close" data-dismiss="alert" type="button" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Admin registered <b>successfully!</b>
        </div>';
        header('location: ../install.php?step=3');
        exit();
    }
}

$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
    <button class="close" data-dismiss="alert" type="button" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    Something went' . "'" . 's <b>wrong!</b>
</div>';
header('location: ../install.php?step=2');
