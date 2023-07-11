<?php

$ssl_id = get('ssl_id');

$SSLInfo = $DB->find('ssl', '*', array('ssl_id' => $ssl_id), null, 1);
if (!$SSLInfo) {
    redirect('ssl');
}

$SSLApi = $DB->find('ssl_api', '*', array('id' => $SSLInfo['ssl_api_id']), null, 1);

// 现有 token 未过期，直接使用
if ($SSLApi['api_token'] && strtotime($SSLApi['api_token_expiretime']) - 180 >= time()) {
    $apiClient = new third\GoGetSSLApi($SSLApi['api_token']);
} else {
    // 无 token 或现有 token 已过期
    $apiClient = new third\GoGetSSLApi();
    // 获取新的 token
    $api_token = $apiClient->auth($SSLApi['api_username'], $SSLApi['api_password']);
    // 更新入库，设置有效期 365 天
    $api_token_expiretime = time() + 365 * 86400;
    $DB->update('ssl_api', array('api_token' => $api_token, 'api_token_expiretime' => time() + 365 * 86400), array('id' => $id));
}

$SSLInfo = $apiClient->getOrderStatus($SSLApi['ssl_key']);

if ($SSLInfo['status'] == 'processing') {
    $Status = '<span class="label label-primary">Processing</span>';
} elseif ($SSLInfo['status'] == 'active') {
    $Status = '<span class="label label-success">Active</span>';
} elseif ($SSLInfo['status'] == 'incomplete') {
    $Status = '<span class="label label-info">Incomplete</span>';
} elseif ($SSLInfo['status'] == 'cancelled') {
    $Status = '<span class="label label-warning">Cancelled</span>';
} elseif ($SSLInfo['status'] == 'expired') {
    $Status = '<span class="label label-danger">Expired</span>';
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
