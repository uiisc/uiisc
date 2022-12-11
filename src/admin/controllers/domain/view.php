<?php

$PageInfo['title'] = 'Domain Extensions';

$count = $DB->count('domain_extensions');

if ($count > 0) {
    $rows = $DB->findAll('domain_extensions', '*', array(), '`extension_id` ASC');
}
