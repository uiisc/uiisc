<?php
if (isset($_SESSION['UIISC_ADMIN'])) {

    $AdminInfo = $DB->find('admin', '*', array('admin_key' => base64_decode($_SESSION['UIISC_ADMIN'])), null, 1);

    if (!$AdminInfo) {
        unset($_SESSION['UIISC_ADMIN']);
        setMessage('Login to <b>continue !</b>', 'danger');
        redirect('admin/login');
    }
} else {
    setMessage('Login to <b>continue !</b>', 'danger');
    redirect('admin/login');
}
