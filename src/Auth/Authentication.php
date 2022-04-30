<?php

namespace RainbowStats\RainbowStats\Auth;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Authentication
{
    /**
     * @var string
     */
    private string $api_key;

    /**
     * @param string $api_key
     */
    public function __construct(string $api_key = '')
    {
        $this->api_key = $api_key;
    }

    /**
     * @param string $api_key
     */
    public function setApiKey(string $api_key): void
    {
        $this->api_key = $api_key;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->api_key;
    }
}