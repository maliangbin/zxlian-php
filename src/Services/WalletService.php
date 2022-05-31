<?php

namespace Maliangbin\ZxlianPhp\Services;

use GuzzleHttp\Client;

class WalletService
{
    protected $api = 'http://127.0.0.1:30505/';

    public function generateApiSign($secretId, $secretKey)
    {
        $response = (new Client())->request('POST', $this->api . 'generateApiSign', [
            'body' => json_encode([
                'secretId' => $secretId,
                'secretKey' => $secretKey,
            ]),
            'headers' => [
                'Content-Type' => 'application/json;charset=utf-8',
            ]
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        $return = [];
        if (isset($response['err']) && !empty($response['err'])) {
            return $return;
        }

        return $response['signData'];
    }

    public function createMnemonic()
    {
        $response = (new Client())->request('POST', $this->api . 'createMnemonic');

        $response = json_decode($response->getBody()->getContents(), true);

        $return = "";
        if (isset($response['err']) && !empty($response['err'])) {
            return $return;
        }

        return $response['mnemonic'];
    }

    public function deriveKeyPair($mnemonic, $index = 0)
    {
        $response = (new Client())->request('POST', $this->api . 'deriveKeyPair', [
            'body' => json_encode([
                'mnemonic' => $mnemonic,
                'index' => $index
            ]),
            'headers' => [
                'Content-Type' => 'application/json;charset=utf-8',
            ]
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        $return = [];
        if (isset($response['err']) && !empty($response['err'])) {
            return $return;
        }

        return $response;
    }

    public function priKey2PubKey($priKey)
    {
        $response = (new Client())->request('POST', $this->api . 'priKey2PubKey', [
            'body' => json_encode([
                'pri' => $priKey
            ]),
            'headers' => [
                'Content-Type' => 'application/json;charset=utf-8',
            ]
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        $return = [];
        if (isset($response['err']) && !empty($response['err'])) {
            return $return;
        }

        return $response;
    }

    public function priKey2Address($priKey)
    {
        $response = (new Client())->request('POST', $this->api . 'priKey2Address', [
            'body' => json_encode([
                'priKey' => $priKey
            ]),
            'headers' => [
                'Content-Type' => 'application/json;charset=utf-8',
            ]
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        $return = [];
        if (isset($response['err']) && !empty($response['err'])) {
            return $return;
        }

        return $response;
    }

    public function signByPriKey($priKey, $data)
    {
        $response = (new Client())->request('POST', $this->api . 'signByPriKey', [
            'body' => json_encode([
                'priKey' => $priKey,
                'data' => $data
            ]),
            'headers' => [
                'Content-Type' => 'application/json;charset=utf-8',
            ]
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        $return = [];
        if (isset($response['err']) && !empty($response['err'])) {
            return $return;
        }

        return $response;
    }

    public function verifyByPubKey($pubKey, $signedData, $data)
    {
        $response = (new Client())->request('POST', $this->api . 'verifyByPubKey', [
            'body' => json_encode([
                'pubKey' => $pubKey,
                'signedData' => $signedData,
                'data' => $data
            ]),
            'headers' => [
                'Content-Type' => 'application/json;charset=utf-8',
            ]
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        if (isset($response['err']) && !empty($response['err'])) {
            return false;
        }

        return isset($response['isValid']) ? (bool)$response['isValid'] : false;
    }

    public function pubKey2Address($pubKey)
    {
        $response = (new Client())->request('POST', $this->api . 'pubKey2Address', [
            'body' => json_encode([
                'pubKey' => $pubKey
            ]),
            'headers' => [
                'Content-Type' => 'application/json;charset=utf-8',
            ]
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        $return = [];
        if (isset($response['err']) && !empty($response['err'])) {
            return $return;
        }

        return $response;
    }

    public function sm3Hash($data, $is_base64 = true)
    {
        $response = (new Client())->request('POST', $this->api . 'sm3Hash', [
            'body' => json_encode([
                'data' => $is_base64 ? base64_encode($data) : $data
            ]),
            'headers' => [
                'Content-Type' => 'application/json;charset=utf-8',
            ]
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        $return = [];
        if (isset($response['err']) && !empty($response['err'])) {
            return $return;
        }

        return $response;
    }

    public function uploadToCos($cosPath, $tempSecretId, $tempSecretKey, $sessionToken, $filePath)
    {
        $response = (new Client())->request('POST', $this->api . 'uploadToCos', [
            'body' => json_encode([
                'cosPath' => $cosPath,
                'tempSecretId' => $tempSecretId,
                'tempSecretKey' => $tempSecretKey,
                'sessionToken' => $sessionToken,
                'filePath' => $filePath
            ]),
            'headers' => [
                'Content-Type' => 'application/json;charset=utf-8',
            ]
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        return isset($response['err']) && empty($response['err']);
    }

    public function generateApiSignCommand($secretId, $secretKey)
    {
        $command = __DIR__ . '/command/generateApiSign --secretId=' . $secretId . ' --secretKey=' . $secretKey;
        $signData = json_decode(exec($command), true);
        $signData = is_array($signData) ? $signData : [];

        return $signData;
    }
}
