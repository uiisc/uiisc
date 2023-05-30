<?php

require '../../application.php';

if (!isset($_POST['submit'])) {
    exit('405 / Method Not Allowed');
}

$FormData = array(
    'old_password' => post('old_password'),
    'new_password' => post('new_password'),
    'hashed_password' => hash('sha256', post('new_password')),
    'user_key' => $AdminInfo['admin_key'],
    'user_password' => $AdminInfo['admin_password'],
);

if (hash('sha256', $FormData['old_password']) == $FormData['user_password']) {
    $result = $DB->update('admin', array('admin_password' => $FormData['hashed_password']), array('admin_key' => $FormData['user_key']));
    if ($result) {
        setMessage('Password changed successfully !');
        unset($_SESSION['UIISC_ADMIN']);
        redirect('admin/login');
    } else {
        setMessage("Something went's wrong !", 'danger');
        redirect('admin/settings');
    }
} else {
    setMessage('Invalid user password !', 'danger');
    redirect('admin/settings');
}
