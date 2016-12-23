<?php

require '../vendor\autoload.php';

use Monster\Zhima\Client;

$config = new Monster\Zhima\Config();
$config->setAppId('100xxxx');
$config->setPrivateKey(__DIR__ . '/rsa/rsa_private_key.pem');
$config->setZhimaPublicKey(__DIR__ . '/rsa/rsa_public_key.pem');
$config->setChannel('api');


$creditIvsDetail = new \Monster\Zhima\Handlers\CreditIvsDetail();
$creditIvsDetail->setCertNo('3302xxxxxxxxxxxxxxx');
$creditIvsDetail->setName('李四');
$creditIvsDetail->setCertType('100');
$creditIvsDetail->setMobile('183xxxxxxxxx');


$client = new Client(new \GuzzleHttp\Client(), $config);
$result = $client->with($creditIvsDetail)->fetch();

var_dump($result);