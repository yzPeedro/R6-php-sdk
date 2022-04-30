<?php

namespace RainbowStats\RainbowStats\Stats;

use GuzzleHttp\Exception\GuzzleException;
use RainbowStats\RainbowStats\Auth\Authentication;
use RainbowStats\RainbowStats\Stats\Contracts\PlayerInterface;
use stdClass;

class Player implements PlayerInterface
{
    protected StatsApi $player;

    /**
     * @param Authentication $auth
     * @param array $data
     */
    public function __construct(Authentication $auth, array $data)
    {
        $this->player = new StatsApi($auth, $data);
    }

    public function all(): array|string|stdClass
    {
        return $this->player->get();
    }

    public function progression(): array|string|stdClass
    {
        return $this->player->get('progression');
    }

    public function aliases(): array|string|stdClass
    {
        return $this->player->get('aliases');
    }

    public function stats(): array|string|stdClass
    {
        return $this->player->get('stats');
    }
}