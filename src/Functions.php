<?php

use GuzzleHttp\Client;

if (!function_exists('RequestClient')) {
    function RequestClient()
    {
        return function_exists('Guzzle_Client') ? Guzzle_Client() : new Client();
    }
}
