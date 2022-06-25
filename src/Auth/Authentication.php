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
     * Create an Authentication class instance.
     *
     * @param string $api_key
     */
    public function __construct(string $api_key = '')
    {
        $this->api_key = $api_key;
    }

    /**
     * Set yor api key in instance, you can get at R6Stats Discord (https://discord.gg/2Hz8wrKk3z).
     *
     * @param string $api_key
     */
    public function setApiKey(string $api_key): void
    {
        $this->api_key = $api_key;
    }

    /**
     * Get yor api key in instance, if you don't have an api key, you can get at R6Stats Discord (https://discord.gg/2Hz8wrKk3z).
     *
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->api_key;
    }
}