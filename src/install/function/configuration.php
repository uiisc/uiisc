<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if (!isset($_POST['submit'])) {
    exit('Unathorized Access');
}

include __DIR__ . '/../application.php';

$hostname = $_POST['hostname'];
$username = $_POST['username'];
$password = $_POST['password'];
$dbname = $_POST['dbname'];
$dbport = !empty($_POST['dbport']) ? $_POST['dbport'] : 3306;
$prefix = isset($_POST['prefix']) ? $_POST['prefix'] : 'uiisc';

@file_put_contents(CONFIG_FILE, "<?php
\$dbconfig = array(
    \"hostname\" => \"{$hostname}\",
    \"username\" => \"{$username}\",
    \"password\" => \"{$password}\",
    \"dbname\"   => \"{$dbname}\",
    \"dbport\"   => {$dbport},
    \"prefix\"   => \"{$prefix}\"
);
");

include CONFIG_FILE;
$connect = mysqli_connect(
    $dbconfig['hostname'],
    $dbconfig['username'],
    $dbconfig['password'],
    $dbconfig['dbname'],
    $dbconfig['dbport']
);

if (!$connect) {
    $_SESSION['message'] = `<div class="alert alert-danger" role="alert">
        <button class="close" data-dismiss="alert" type="button" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        Can't connect to <b>database!</b>
    </div>`;
    header('location: ../install.php');
} else {
    include __DIR__ . "/Database.php";
    if ($sql) {
        $_SESSION['message'] = `<div class="alert alert-success" role="alert">
            <button class="close" data-dismiss="alert" type="button" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Connection established <b>successfully!</b>
        </div>`;
        header('location: ../install.php?step=1');
    } else {
        $_SESSION['message'] = `<div class="alert alert-danger" role="alert">
            <button class="close" data-dismiss="alert" type="button" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Something went's <b>wrong!</b>
        </div>`;
        header('location: ../install.php');
    }
}
