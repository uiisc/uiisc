<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>
<!DOCTYPE html>
<html lang="<?php echo $lang->language_current; ?>">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="robots" content="index, follow" />
    <meta name="format-detection" content="telephone=no,email=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="keywords" content="<?php echo $page_keywords; ?>" />
    <meta name="description" content="<?php echo $page_description; ?>" />
    <meta name="og:site_name" content="<?php echo $page_title; ?>" />
    <meta property="og:title" content="<?php echo $page_title; ?>" />
    <meta property="og:description" content="<?php echo $page_description; ?>">
    <meta property="og:url" content="<?php echo $site_url; ?>" />
    <meta name="twitter:title" content="<?php echo $page_title; ?>" />
    <meta name="author" content="<?php echo $page_author; ?>" />
    <meta name="copyright" content="<?php echo $page_copyright; ?>" />
    <title><?php echo $page_title; ?></title>
<?php if (!empty($google_site_verification)):?>
    <meta name="google-site-verification" content="<?php echo $google_site_verification; ?>" />
<?php endif; ?>
    <link href="assets/image/favicon.ico?_=<?php echo $static_release; ?>" rel="icon" />
    <link href="assets/bootstrap/css/bootstrap.min.css?_=<?php echo $static_release; ?>" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo $site_url; ?>/assets/theme.switcher/css/auto.css" id="theme" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="assets/css/common.css?_=<?php echo $static_release; ?>" rel="stylesheet" />
    <!--[if lt IE 9]>
    <script src="assets/html5shiv/html5shiv.min.js?_=<?php echo $static_release; ?>"></script>
    <script src="assets/respond/respond.min.js?_=<?php echo $static_release; ?>"></script>
    <![endif]-->
    <script type="text/javascript">
        var site_domain = "<?php echo $site_domain; ?>";
        var cur_lang = "<?php echo $lang->language_current; ?>";
        var ifastnet_aff = <?php echo $ifastnet_aff; ?>;
    </script>
    <script src="<?php echo $site_url; ?>/assets/theme.switcher/theme.switcher.js" type="text/javascript"></script>
</head>

<body>