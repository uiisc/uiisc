<?php

if (isset($_COOKIE['UIISC_MEMBER'])) {
    setcookie('UIISC_MEMBER', '', -1, '/');
    setMessage('Logged out <b>successfully !</b>', 'success');
} else {
    setMessage('Login to <b>continue !</b>', 'danger');
}

redirect('clientarea/login');
