<?php

// 如果在框架中使用，下面这句话可以省略
include_once __DIR__ . '/vendor/autoload.php';

$client = new \Cz88\IpSDK\CzClient('bfda20b54da6479cb76a5dxxxx');
$arr1 = $client->query('114.114.114.114');
$arr2 = $client->query('114.114.115.115');
var_dump($arr1);
var_dump($arr2);