<?php

$PageInfo['title'] = $lang->I18N('My Clients');

$count = $DB->count('clients');

if ($count > 0) {
    $rows = $DB->findAll('clients');
}
