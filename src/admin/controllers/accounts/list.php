<?php

$PageInfo['title'] = $lang->I18N('Hosting Accounts');

$count = $DB->count('account', "`account_status`!=0 OR `account_status`!=2");

if ($count > 0) {
    $rows = $DB->findAll('account', '*', "`account_status`!=0 OR `account_status`!=2", "`account_id` DESC");
}
