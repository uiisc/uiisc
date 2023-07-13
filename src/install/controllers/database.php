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
$prefix = !empty($_POST['prefix']) ? $_POST['prefix'] : 'uiisc';

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
    try {
        $DB = new PDO("mysql:host=" . $dbconfig['hostname'] . ";dbname=" . $dbconfig['dbname'] . ";port=" . $dbconfig['dbport'], $dbconfig['username'], $dbconfig['password']);
    } catch (Exception $e) {
        $errorMsg = '连接数据库失败：' . $e->getMessage();
    }
    if (empty($errorMsg)) {
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        $DB->exec("set sql_mode = ''");
        $DB->exec("set names utf8");
        $sqls = file_get_contents(DB_FILE);
        $sqls = explode(';', $sqls);
        // $sqls[] = "INSERT INTO `pre_config` VALUES ('syskey', '" . random(32) . "')";
        // $sqls[] = "INSERT INTO `pre_config` VALUES ('build', '" . date("Y-m-d") . "')";
        $success = 0;
        $error = 0;
        $errorMsg = null;
        foreach ($sqls as $value) {
            // $value = trim($value);
            // `pre_  $dbconfig['prefix']
            $value = str_replace('`pre_', '`' . $dbconfig['prefix'] . '_', trim($value));
            if (empty($value)) continue;
            if ($DB->exec($value) === false) {
                $error++;
                $dberror = $DB->errorInfo();
                $errorMsg .= $dberror[2] . "<br>";
            } else {
                $success++;
            }
        }
    }
    if (empty($errorMsg)) {
        // $lock_status = file_put_contents("install.lock", '安装锁');
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
