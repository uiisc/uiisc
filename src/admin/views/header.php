<!DOCTYPE html>
<html lang="<?php echo $lang->language_current; ?>">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="robots" content="noindex,nofollow">
    <meta name="format-detection" content="telephone=no,email=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="description" content="UIISC is a free of cost we hosting and SSL management software allow you to manage your clients and accounts from a single place!" />
    <meta name="keywords" content="<?php echo $page_keywords; ?>" />
    <meta name="author" content="UIISC" />
    <meta name="copyright" content="® CROGRAM" />
    <!-- Site info -->
    <title><?php echo $PageInfo['title']; ?> - <?php echo $lang->I18N('AdminArea'); ?> - <?php echo $SiteConfig['site_name']; ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo $site_url; ?>/assets/image/favicon.ico">
    <link rel="shortcut" type="image/x-icon" href="<?php echo $site_url; ?>/assets/image/favicon.ico">
    <!-- Style -->
    <link href="<?php echo $site_cdnpublic; ?>twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo $site_cdnpublic; ?>font-awesome/5.15.4/css/fontawesome.min.css" rel="stylesheet" />
    <link href="<?php echo $site_url; ?>/assets/theme.switcher/css/auto.css" id="theme" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="<?php echo $site_url; ?>/assets/css/common.css?_=<?php echo $static_release; ?>" rel="stylesheet" />
    <link href="<?php echo $site_url; ?>/assets/css/admin.css?_=<?php echo $static_release; ?>" rel="stylesheet" />
    <!-- Common JS -->
    <script type="text/javascript">
        var site_domain = "<?php echo $site_domain; ?>";
        var cur_lang = "<?php echo $lang->language_current; ?>";
        var ifastnet_aff = "<?php echo $ifastnet_aff; ?>";
    </script>
    <script src="<?php echo $site_url; ?>/assets/theme.switcher/theme.switcher.js" type="text/javascript"></script>
    <!-- Custom JS -->
    <?php echo $PageInfo['rel']; ?>

</head>

<body>
