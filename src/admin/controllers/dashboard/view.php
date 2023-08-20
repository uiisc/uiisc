<?php

$PageInfo['title'] = 'Dashboard';

$date = date("Y-m-d H:i:s");
$mysqlversion = $DB->getColumn("select VERSION()");
