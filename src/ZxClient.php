<?php

namespace Maliangbin\ZxlianPhp;

use GuzzleHttp\Client;
use Maliangbin\ZxlianPhp\Services\WalletService;

class ZxClient
{
    public $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function userRegister(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['user_register'];

        $response = (new Client())->request('POST', $api, [
            'body' => json_encode($params),
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function userBind(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['user_bind'];

        $response = (new Client())->request('POST', $api, [
            'body' => json_encode($params),
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function userBindQuery(array $address_list)
    {
        if (empty($address_list)) {
            return false;
        }

        $api = $this->config['user_bind_query'];

        $response = (new Client())->request('GET', $api, [
            'query' => [
                'addressList' => $address_list
            ],
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function seriesClaim(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['series_claim'];

        $response = (new Client())->request('POST', $api, [
            'body' => json_encode($params),
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function seriesClaimResult(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['series_claim_result'];

        $response = (new Client())->request('GET', $api, [
            'query' => $params,
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function nftPublish(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['nft_publish'];

        $response = (new Client())->request('POST', $api, [
            'body' => json_encode($params),
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function nftPublishResult(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['nft_publish_result'];

        $response = (new Client())->request('GET', $api, [
            'query' => $params,
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function nftBuy(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['nft_buy'];

        $response = (new Client())->request('POST', $api, [
            'body' => json_encode($params),
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }


    public function nftBuyResult(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['nft_buy_result'];

        $response = (new Client())->request('GET', $api, [
            'query' => $params,
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function nftStatusUpdate(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['nft_status_update'];

        $response = (new Client())->request('POST', $api, [
            'body' => json_encode($params),
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function nftStatusUpdateResult(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['nft_status_update_result'];

        $response = (new Client())->request('GET', $api, [
            'query' => $params,
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function nftPriceUpdate(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['nft_price_update'];

        $response = (new Client())->request('POST', $api, [
            'body' => json_encode($params),
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function nftPriceUpdateResult(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['nft_price_update_result'];

        $response = (new Client())->request('GET', $api, [
            'query' => $params,
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function nftInfo(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['nft_info'];

        $response = (new Client())->request('GET', $api, [
            'query' => $params,
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function nftAddressList(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['nft_address_list'];

        $response = (new Client())->request('GET', $api, [
            'query' => $params,
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function nftAddressWithoutSeriesList(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['nft_address_without_series_list'];

        $response = (new Client())->request('GET', $api, [
            'query' => $params,
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function nftTradeList(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['nft_trade_list'];

        $response = (new Client())->request('GET', $api, [
            'query' => $params,
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function nftTradeInList(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['nft_trade_in_list'];

        $response = (new Client())->request('GET', $api, [
            'query' => $params,
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function nftTradeOutList(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['nft_trade_out_list'];

        $response = (new Client())->request('GET', $api, [
            'query' => $params,
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function nftTradeAllList(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['nft_trade_all_list'];

        $response = (new Client())->request('GET', $api, [
            'query' => $params,
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function nftSeries(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['nft_series'];

        $response = (new Client())->request('GET', $api, [
            'query' => $params,
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function nftSeriesList(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['nft_series_list'];

        $response = (new Client())->request('GET', $api, [
            'query' => $params,
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function userUploadSecret(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['user_upload_secret'];

        $response = (new Client())->request('POST', $api, [
            'body' => json_encode($params),
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function userUploadUrl(array $params)
    {
        if (empty($params)) {
            return false;
        }

        $api = $this->config['user_upload_url'];

        $response = (new Client())->request('GET', $api, [
            'query' => $params,
            'headers' => $this->getRequestHeaders()
        ]);

        $response = $response->getBody()->getContents();
        return json_decode($response, true);
    }

    public function createMnemonic()
    {
        return (new WalletService())->createMnemonic();
    }

    public function deriveKeyPair($mnemonic = '', $index = 0)
    {
        if (!$mnemonic) {
            $mnemonic = $this->createMnemonic();
        }

        return (new WalletService())->deriveKeyPair($mnemonic, $index);
    }

    public function priKey2PubKey($priKey)
    {
        if (!$priKey) {
            return null;
        }

        return (new WalletService())->priKey2PubKey($priKey);
    }

    public function pubKey2Address($pubKey)
    {
        if (!$pubKey) {
            return null;
        }

        return (new WalletService())->pubKey2Address($pubKey);
    }

    public function priKey2Address($priKey)
    {
        if (!$priKey) {
            return null;
        }

        return (new WalletService())->priKey2Address($priKey);
    }

    public function signByPriKey($priKey, $data)
    {
        if (!$priKey) {
            return "";
        }

        return (new WalletService())->signByPriKey($priKey, $data);
    }

    public function verifyByPubKey($pubKey, $signedData, $data)
    {
        if (!$pubKey || !$signedData || !$data) {
            return false;
        }

        return (new WalletService())->verifyByPubKey($pubKey, $signedData, $data);
    }

    public function sm3Hash($data)
    {
        if (!$data) {
            return "";
        }

        return (new WalletService())->sm3Hash($data);
    }

    public function uploadToCos($cosPath, $tempSecretId, $tempSecretKey, $sessionToken, $filePath)
    {
        return (new WalletService())->uploadToCos($cosPath, $tempSecretId, $tempSecretKey, $sessionToken, $filePath);
    }

    public function getRequestHeaders()
    {
        $signData = (new WalletService())->generateApiSign($this->config['secretId'], $this->config['secretKey']);

        return [
            'Content-Type' => 'application/json;charset=utf-8',
            'Secret-Id' => $this->config['secretId'],
            'Signature' => $signData['Signature'] ?? '',
            'Signature-Time' => $signData['SignatureTime'] ?? '',
            'Nonce' => $signData['Nonce'] ?? '',
        ];
    }
}
