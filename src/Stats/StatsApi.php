<?php

namespace RainbowStats\RainbowStats\Stats;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
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
    private Client $playerClient;

    /**
     * @var array
     */
    private array $data;

    /**
     * @param Authentication $authentication
     * @param array $data
     */
    public function __construct(Authentication $authentication, array $data)
    {
        $this->auth = $authentication;
        
        $data['platform'] = (! array_key_exists('platform', $data)) ? 'pc' : $data['platform'];
        $data['username'] = (! array_key_exists('username', $data)) ? '' : $data['username'];
        $data['statistic_type'] = (! isset($data['statistic_type'])) ? 'generic': $data['statistic_type'];
        $data['region'] = (! isset($data['region'])) ? 'all' : $data['region'];
        $this->data = $data;

        $this->playerClient = new Client([
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
                    $this->playerClient->request('GET')
                        ->getBody()
                        ->getContents()
                );
            }

            return json_decode(
                $this->playerClient->request('GET')
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

    /**
     * @return string|array|stdClass
     */
    public function leaderboard(): string|array|stdClass
    {
        $gameClient = new Client([
            'verify' => false,
            'base_uri' => "https://api2.r6stats.com/public-api/leaderboard/".$this->data['platform']."/".$this->data['region'],
            'headers' => ['Authorization' => 'Bearer ' . $this->auth->getApiKey()]
        ]);

        try {
            return json_decode($gameClient->request('GET')
                ->getBody()
                ->getContents()
            );
        } catch (GuzzleException $exception) {
            return [
                'error' => true,
                'data' => $exception->getMessage(),
                'code' => $exception->getCode()
            ];
        }
    }
}