<?php

$PageInfo['title'] = $lang->I18N('Clients List');

$count = $DB->count('clients');

if ($count > 0) {
    $rows = $DB->findAll('clients');
}
