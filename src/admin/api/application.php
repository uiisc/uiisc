<?php

require_once __DIR__ . '/../../core/application.php';

if (isset($_SESSION['UIISC_ADMIN'])) {
    $AdminInfo = $DB->find('admin', '*', array('admin_key' => base64_decode($_SESSION['UIISC_ADMIN'])), null, 1);
    if (!$AdminInfo) {
        unset($_SESSION['UIISC_ADMIN']);
        send_response(403, null, 'need login');
    }
} else {
    send_response(403, null, 'need login');
}
