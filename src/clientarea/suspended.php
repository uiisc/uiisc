<?php

$current_route = 'clientarea/suspended';

require_once __DIR__ . '/application.php';

$PageInfo = ['title' => 'Suspended Account', 'rel' => ''];

require_once __DIR__ . '/views/header.php';
require_once __DIR__ . '/views/clients/suspended.php';
require_once __DIR__ . '/views/footer.php';
