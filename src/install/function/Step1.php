<?php

if (!isset($_POST['submit'])) {
    exit();
}

include __DIR__ . '/../application.php';

$FormData = array(
    'site_name' => $_POST['site_name'],
    'site_brand' => $_POST['site_brand'],
    'site_company' => $_POST['site_company'],
    'site_path' => $_POST['site_path'],
    'site_email' => $_POST['site_email'],
);

$sql = mysqli_query($connect, "INSERT INTO `uiisc_config` (`site_key`,`site_name`,`site_brand`,`site_company`,`site_path`,`site_email`,`site_status`)
VALUES
('UIISC','" . $FormData['site_name'] . "','" . $FormData['site_brand'] . "','" . $FormData['site_company'] . "','" . $FormData['site_path'] . "','" . $FormData['site_email'] . "','1')"
);

if ($sql) {
    $_SESSION['message'] = '<div class="alert alert-success" role="alert">
        <button class="close" data-dismiss="alert" type="button" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Clientarea updated <b>successfully!</b>
    </div>';
    header('location: ../install.php?step=2');
} else {
    $_SESSION['message'] = '<div class="alert alert-danger" role="alert">
        <button class="close" data-dismiss="alert" type="button" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Something went' . "'" . 's <b>wrong!</b>
    </div>';
    header('location: ../install.php?step=1');
}
