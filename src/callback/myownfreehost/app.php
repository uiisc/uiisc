<?php

// require_once __DIR__ . '/../../core/application.php';

if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}

if (!isset($_POST['comments'])) {
    exit('need: comments');
}

$status = post('status');

if ($status == 'ACTIVATED') {
    // 帐户激活，新注册
    require_once __DIR__ . '/activate.php';
} elseif ($status == 'SUSPENDED') {
    // 帐户暂停
    require_once __DIR__ . '/suspend.php';
} else if ($status == 'REACTIVATE') {
    // 帐户解禁
    require_once __DIR__ . '/reactivate.php';
} else if ($status == 'CLIENTSUBADD') {
    // 添加子域名
    require_once __DIR__ . '/subdomainadd.php';
} else if ($status == 'CLIENTSUBDEL') {
    // 删除子域名
    require_once __DIR__ . '/subdomaindel.php';
} else if ($status == 'CLIENTPARKADD') {
    // 添加停放域名
    require_once __DIR__ . '/parkdomainadd.php';
} else if ($status == 'CLIENTPARKDEL') {
    // 删除停放域名
    require_once __DIR__ . '/parkdomaindel.php';
} else if ($status == 'DELETE') {
    // 帐户已删除
    require_once __DIR__ . '/delete.php';
} else if (substr($status, 0, 3) == 'sql') {
    // 用户sql集群已开通
    require_once __DIR__ . '/sqlcluster.php';
} else {
    exit('Access Denied');
}
