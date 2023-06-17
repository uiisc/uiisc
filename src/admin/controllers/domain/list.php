<?php

$PageInfo['title'] = 'Domain Extensions';

$count = $DB->count('account_domaintld');

if ($count > 0) {
    $rows = $DB->findAll('account_domaintld', '*', array(), '`extension_id` ASC');
}
