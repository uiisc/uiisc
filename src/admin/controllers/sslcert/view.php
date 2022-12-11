<?php

$ssl_id = get('ssl_id');

require_once ROOT . '/core/handler/SSLHandler.php';
require_once ROOT . '/modules/GoGetSSL/GoGetSSLApi.php';

$apiClient = new GoGetSSLApi();
$token = $apiClient->auth($SSLApi['api_username'], $SSLApi['api_password']);

$SSLInfo = $apiClient->getOrderStatus($ssl_id);

if ($SSLInfo['status'] == 'processing') {
    $Status = '<span class="badge bg-primary">Processing</span>';
} elseif ($SSLInfo['status'] == 'active') {
    $Status = '<span class="badge bg-success">Active</span>';
} elseif ($SSLInfo['status'] == 'incomplete') {
    $Status = '<span class="badge bg-danger">Incomplete</span>';
} elseif ($SSLInfo['status'] == 'cancelled') {
    $Status = '<span class="badge bg-">Cancelled</span>';
} elseif ($SSLInfo['status'] == 'expired') {
    $Status = '<span class="badge bg-danger">Expired</span>';
} else {
    $Status = '';
}

if (empty($SSLInfo['begin_date'])) {
    $Begin = '-- -- ----';
    $End = $Begin;
} else {
    $Begin = $SSLInfo['begin_date'];
    $End = $SSLInfo['end_date'];
}
