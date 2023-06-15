<?php
if (isset($_SESSION['UIISC_ADMIN'])) {

    $AdminInfo = $DB->find('admin', '*', array('admin_key' => base64_decode($_SESSION['UIISC_ADMIN'])), null, 1);

    if (!$AdminInfo) {
        unset($_SESSION['UIISC_ADMIN']);
        setMessage('Login to <b>continue !</b>', 'danger');
        redirect('admin/login');
    }
    $AdminInfo['avatar'] = $AdminInfo['admin_email'] ? md5($AdminInfo['admin_email']) : 'default';
    $AdminInfo['avatar'] = 'https://dn-qiniu-avatar.qbox.me/avatar/' . $AdminInfo['avatar'] . '?s=30';
} else {
    setMessage('Login to <b>continue !</b>', 'danger');
    redirect('admin/login');
}
