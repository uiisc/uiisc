<?php

$ssl_id = get('id');

$SSLInfo = $DB->find('ssl', '*', array('ssl_id' => $ssl_id), null, 1);
if (!$SSLInfo) {
    redirect('ssl');
}

if ($SSLInfo['ssl_status'] == 'processing') {
    $Status = '<span class="label label-primary">Processing</span>';
} elseif ($SSLInfo['ssl_status'] == 'active') {
    $Status = '<span class="label label-success">Active</span>';
} elseif ($SSLInfo['ssl_status'] == 'incomplete') {
    $Status = '<span class="label label-info">Incomplete</span>';
} elseif ($SSLInfo['ssl_status'] == 'cancelled') {
    $Status = '<span class="label label-warning">Cancelled</span>';
} elseif ($SSLInfo['ssl_status'] == 'expired') {
    $Status = '<span class="label label-danger">Expired</span>';
} else {
    $Status = '';
}
