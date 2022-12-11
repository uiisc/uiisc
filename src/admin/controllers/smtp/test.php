<?php
require_once __DIR__ . '/../../application.php';

if (!isset($_POST['submit'])) {
    exit('Method Not Allowed');
}

$email = post('email');

$resault = send_mail(array(
    'to' => $email,
    'message' => $lang->I18N('This test email indicates that SMTP has been configured correctly.'),
    'subject' => $lang->I18N('Send Test Email'),
));

if ($resault) {
    setMessage('The test email has been sent <b>successfully</b> !');
} else {
    setMessage("Something went's <b>wrong!</b>", 'danger');
}

redirect('admin/settings', 'smtp');
