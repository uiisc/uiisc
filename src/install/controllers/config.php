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
    header('location: ../install.php?step=1');
}

if (empty($errorMsg)) {
    $FormData = array(
        'site_name' => $_POST['site_name'],
        'site_brand' => $_POST['site_brand'],
        'site_company' => $_POST['site_company'],
        'site_path' => $_POST['site_path'],
        'site_email' => $_POST['site_email'],
    );

    $sql = "INSERT INTO `" . $dbconfig['prefix'] . "_config` (`site_key`, `site_status`, `site_name`, `site_brand`, `site_company`, `site_path`, `site_phone`, `site_email`, `site_build_year`, `page_title`, `page_description`, `page_keywords`, `page_copyright`, `page_author`, `ifastnet_aff`)
        VALUES
        ('UIISC', 1, '" . $FormData['site_name'] . "', '" . $FormData['site_brand'] . "', '" . $FormData['site_company'] . "', '" . $FormData['site_path'] . "', '', '" . $FormData['site_email'] . "', 2013, 'UIISC', 'UIISC is a free of cost we hosting and SSL management software allow you to manage your clients and accounts from a single place!', 'uiisc, free hosting clientarea, web hosting clientarea, mofh clientarea, crogram', '® 2013-2023 UIISC', 'UIISC', 19474)";
    if ($DB->exec($sql)) {
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
                Connection established <b>successfully!</b>
            </div>';
        header('location: ../install.php?step=1');
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
