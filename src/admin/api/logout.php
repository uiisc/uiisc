<?php

require_once __DIR__ . '/application.php';

@header('Content-Type: application/json; charset=UTF-8');

if (!checkRefererHost()) exit(json_encode(['code' => 403, 'msg' => 'error']));

// ob_start();
// session_start();
if (isset($_SESSION['UIISC_ADMIN'])) {
    unset($_SESSION['UIISC_ADMIN']);
    exit(json_encode(['code' => 0, 'msg' => 'Logout successfully !']));
} else {
    exit(json_encode(['code' => 0, 'msg' => 'Login to continue !']));
}

exit(json_encode(['code' => -1, 'msg' => 'error !']));
