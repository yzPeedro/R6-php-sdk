<?php

namespace RainbowStats\RainbowStats\Stats;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Util\Exception;
use RainbowStats\RainbowStats\Auth\Authentication;
use stdClass;

class StatsApi
{
    /**
     * @var Authentication
     */
    private Authentication $auth;

    /**
     * @var Client
     */
    private Client $client;

    /**
     * @param Authentication $authentication
     * @param array $data
     */
    public function __construct(Authentication $authentication, array $data)
    {
        $requires = ['username', 'platform'];

        if(! isset($data['statistic_type'])) {
            $data['statistic_type'] = 'generic';
        }

        $this->auth = $authentication;
        $this->client = new Client([
            'verify' => false,
            'base_uri' => "https://api2.r6stats.com/public-api/stats/".$data['username']."/".$data['platform']."/".$data['statistic_type'],
            'headers' => ['Authorization' => 'Bearer ' . $this->auth->getApiKey()]
        ]);
    }

    /**
     * @param string $parameter
     * @return string|array|stdClass
     */
    public function get(string $parameter = ''): string|array|stdClass
    {
        try {
            if(! $parameter) {
                return json_decode(
                    $this->client->request('GET')
                        ->getBody()
                        ->getContents()
                );
            }

            return json_decode(
                $this->client->request('GET')
                ->getBody()
                ->getContents())
                ->$parameter;

        } catch (GuzzleException $exception) {
            return [
                'error' => true,
                'data' => $exception->getMessage(),
                'code' => $exception->getCode()
            ];
        }
    }
}