<?php
require "vendor/autoload.php";

$secretId = '123456';
$secretKey = 'abc';

$config = new \Maliangbin\ZxlianPhp\Config($secretId, $secretKey);
$client = new \Maliangbin\ZxlianPhp\ZxClient($config);

$data = [
    'personName' => 'xxx',
    'email' => '1203556551@qq.com'
];
//var_dump($client->userRegister($data));
//var_dump($client->createMnemonic());
$key = $client->deriveKeyPair();
//var_dump($client->deriveKeyPair($key['priKey']));
//var_dump($client->pubKey2Address($key['pubKey']));
//var_dump($client->priKey2Address($key['priKey']));
$sign = $client->signByPriKey($key['priKey'], 'message');
//var_dump($client->verifyByPubKey($key['pubKey'], $sign['signedData'],'message'));
var_dump($client->sm3Hash('message'));
