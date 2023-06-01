<?php

require_once __DIR__ . '/application.php';

require_once ROOT . '/core/library/countries.php';

$PageInfo['title'] = $lang->I18N('Profile Settings');

require_once __DIR__ . '/views/common/header.php';
require_once __DIR__ . '/views/common/navbar.php';
require_once __DIR__ . '/views/common/sidebar.php';
require_once __DIR__ . '/views/settings.php';
require_once __DIR__ . '/views/common/footer.php';
