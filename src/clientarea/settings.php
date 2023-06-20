<?php

require_once __DIR__ . '/application.php';

require_once ROOT . '/core/library/countries.php';

$PageInfo['title'] = $lang->I18N('Profile Settings');

require_once __DIR__ . '/views/header.php';
require_once __DIR__ . '/views/navbar.php';
require_once __DIR__ . '/views/sidebar.php';
require_once __DIR__ . '/views/settings.php';
require_once __DIR__ . '/views/footer.php';
