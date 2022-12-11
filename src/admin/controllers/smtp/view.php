<?php

$PageInfo['title'] = 'SMTP Settings';

$where = array(
    'smtp_key' => 'SMTP',
);

$SMTPInfo = $DB->find('smtp', '*', $where, null, 1);
