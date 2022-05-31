<?php

namespace Maliangbin\ZxlianPhp;

class Config implements \ArrayAccess
{
    protected $config;

    protected $gateway = 'https://open.zxchain.qq.com';

    protected $apis = [
        'user_register' => 'api/v1/user/register/person_platform',
        'user_bind' => 'api/v1/user/identity/bind/submit_by_trusted_platform',
        'user_bind_query' => 'api/v1/user/identity/bind/query',
        'series_claim' => 'api/v1/nft/series/claim',
        'series_claim_result' => 'api/v1/nft/series/claim/result',
        'nft_publish' => 'api/v1/nft/publish',
        'nft_publish_result' => 'api/v1/nft/publish/result',
        'nft_buy' => 'api/v1/nft/buy',
        'nft_buy_result' => 'api/v1/nft/buy/result',
        'nft_status_update' => 'api/v1/nft/status/update',
        'nft_status_update_result' => 'api/v1/nft/status/update/result',
        'nft_price_update' => 'api/v1/nft/price/update',
        'nft_price_update_result' => 'api/v1/nft/price/update/result',
        'nft_info' => 'api/v1/nft/info',
        'nft_address_list' => 'api/v1/nft/address/list',
        'nft_address_without_series_list' => 'api/v1/nft/address/without/series/list',
        'nft_trade_list' => 'api/v1/nft/trade/list',
        'nft_trade_in_list' => 'api/v1/nft/trade/in/list',
        'nft_trade_out_list' => 'api/v1/nft/trade/out/list',
        'nft_trade_all_list' => 'api/v1/nft/trade/all/list',
        'nft_series' => 'api/v1/nft/series',
        'nft_series_list' => 'api/v1/nft/series/list',
        'user_upload_secret' => 'api/v1/user/upload/secret',
        'user_upload_url' => 'api/v1/user/upload/url',
    ];

    public function __construct($secretId, $secretKey)
    {
        $this->config['path'] = __DIR__;
        $this->config['secretId'] = $secretId;
        $this->config['secretKey'] = $secretKey;

        $this->initApis();
    }

    private function initApis()
    {
        foreach ($this->apis as $k => $api) {
            $this->offsetSet($k, $this->api($k));
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->config[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->config[$offset] ?? null;
    }

    public function offsetSet($offset, $value)
    {
        $this->config[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->config[$offset]);
    }

    public function api($api_key)
    {
        $api_uri = $this->apis[$api_key] ?? '';

        return rtrim($this->gateway) . '/' . ltrim($api_uri, '/');
    }
}
