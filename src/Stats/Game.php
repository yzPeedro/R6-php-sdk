<?php

namespace RainbowStats\RainbowStats\Stats;

use RainbowStats\RainbowStats\Auth\Authentication;
use RainbowStats\RainbowStats\Stats\Contracts\GameInterface;
use stdClass;

class Game implements GameInterface
{
    /**
     * @var StatsApi
     */
    private StatsApi $api;

    /**
     * Create a Game class instance.
     *
     * @param Authentication $authentication
     * @param array $data
     */
    public function __construct(Authentication $authentication, array $data)
    {
        $this->api = new StatsApi($authentication, $data);
    }

    /**
     * Get the game leaderboard. Returns an array with a maximum of 100 objects with information for each player.
     *
     * @return array|string|stdClass
     */
    public function leaderboard(): array|string|stdClass
    {
        return $this->api->leaderboard();
    }
}