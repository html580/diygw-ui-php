<?php
// +----------------------------------------------------------------------
// | Diygw PHP
// +----------------------------------------------------------------------
// | Copyright (c) 2017~2022 https://www.diygw.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: diygw <diygwcom@diygw.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
namespace think;

require __DIR__ . '/../vendor/autoload.php';

// 执行HTTP应用并响应
$http = (new App())->http;
if (!file_exists(__DIR__ .'/../config/install.lock')) {
    $s = $_GET['s'];
    if(empty($s)){
        $response = $http->name('install')->run();
    }else{
        $response = $http->run();
    }
}else{
    $response = $http->run();
}
$response->send();
$http->end($response);
