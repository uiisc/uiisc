<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="<?php echo $current_lang; ?>">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="author" content="<?php echo $author; ?>">
    <title>Client Area</title>
    <link href="favicon.ico?_=<?php echo $static_release; ?>" type="image/x-icon" rel="icon" />
    <link href="favicon.ico?_=<?php echo $static_release; ?>" type="image/x-icon" rel="shortcut icon" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css?_=<?php echo $static_release; ?>">
    <link rel="stylesheet" href="assets/css/clientarea.css?_=<?php echo $static_release; ?>">
    <!--[if lt IE 9]>
    <script src="assets/html5shiv/html5shiv.min.js"></script>
    <script src="assets/respond/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        var domain = "<?php echo $lang->getDomain(); ?>";
        var cur_lang = "<?php echo $current_lang; ?>";
        var ifastnet_aff = <?php echo $iFastNetAff; ?>;
    </script>
</head>

<body>
