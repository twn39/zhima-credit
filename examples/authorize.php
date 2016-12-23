<?php

require '../vendor\autoload.php';

use Monster\Zhima\Client;

$config = new Monster\Zhima\Config();
$config->setAppId('100xxxx');
$config->setPrivateKey(__DIR__ . '/rsa/rsa_private_key.pem');
$config->setZhimaPublicKey(__DIR__ . '/rsa/rsa_public_key.pem');
$config->setChannel('api');

$authorize = new \Monster\Zhima\Handlers\Authorize();
$authorize->setIdentityType(2);
$authorize->setIdentityParam([
    'name'     => '张三',
    'certType' => 'IDENTITY_CARD',
    'certNo'   => '330227xxxxxxxxx',
]);
$authorize->setBizParams([
    'auth_code'   => 'M_APPPC_CERT',
    'channelType' => 'apppc',
    'state'       => 'wwwwwwwww',
]);

$client = new Client(new \GuzzleHttp\Client(), $config);
$result = $client->with($authorize)->url();

var_dump($result);