<?php

/*
 * The file is part of the payment lib.
 *
 * (c) Leo <dayugog@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

require_once __DIR__ . '/../../vendor/autoload.php';

use Payment\Client\Query;
use Payment\Common\PayException;
use Payment\Config;

date_default_timezone_set('Asia/Shanghai');
$aliConfig = require_once __DIR__ . '/../aliconfig.php';

// 二者不能同时为空
$data = [
    'out_trade_no' => '15043337047336',
    //'trade_no' => '2017090221001004350200242476',
];

try {
    $ret = Query::run(Config::ALI_CHARGE, $aliConfig, $data);
} catch (PayException $e) {
    echo $e->errorMessage();
    exit;
}

echo json_encode($ret, JSON_UNESCAPED_UNICODE);
