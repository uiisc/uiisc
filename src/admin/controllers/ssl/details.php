<?php

$ssl_id = get('id');

$SSLInfo = $DB->find('ssl', '*', array('ssl_id' => $ssl_id), null, 1);
if (!$SSLInfo) {
    redirect('ssl');
}

if ($SSLInfo['ssl_status'] == 'processing') {
    $Status = '<span class="badge bg-primary">Processing</span>';
} elseif ($SSLInfo['ssl_status'] == 'active') {
    $Status = '<span class="badge bg-success">Active</span>';
} elseif ($SSLInfo['ssl_status'] == 'incomplete') {
    $Status = '<span class="badge bg-danger">Incomplete</span>';
} elseif ($SSLInfo['ssl_status'] == 'cancelled') {
    $Status = '<span class="badge bg-">Cancelled</span>';
} elseif ($SSLInfo['ssl_status'] == 'expired') {
    $Status = '<span class="badge bg-danger">Expired</span>';
} else {
    $Status = '';
}
