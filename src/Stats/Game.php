<?php

namespace RainbowStats\RainbowStats\Stats;

use RainbowStats\RainbowStats\Auth\Authentication;
use RainbowStats\RainbowStats\Stats\Contracts\GameInterface;
use stdClass;

class Game implements GameInterface
{
    private StatsApi $api;

    public function __construct(Authentication $authentication, array $data)
    {
        $this->api = new StatsApi($authentication, $data);
    }

    public function leaderboard(): array|string|stdClass
    {
        return $this->api->leaderboard('game');
    }
}