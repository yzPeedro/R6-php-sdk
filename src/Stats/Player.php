<?php

namespace RainbowStats\RainbowStats\Stats;

use GuzzleHttp\Exception\GuzzleException;
use RainbowStats\RainbowStats\Auth\Authentication;
use RainbowStats\RainbowStats\Stats\Contracts\PlayerInterface;
use stdClass;

class Player implements PlayerInterface
{
    /**
     * @var StatsApi
     */
    protected StatsApi $player;

    /**
     * To initialize the Player class it is necessary that you have some values. In the class constructor, you need to inform two parameters: Authentication (an instance of the Authentication class) and a data array.
     * The data parameter is an array which has three functional keys, example:
     *
     *
     * [
     *  'username' => 'Mumiia661',
     *  'platform' => 'pc',
     *  'statistic_type' => 'generic' // (not required)
     * ]
     *
     * @param Authentication $auth
     * @param array $data
     */
    public function __construct(Authentication $auth, array $data)
    {
        $this->player = new StatsApi($auth, $data);
    }

    /**
     * This method is responsible for returning all possible information about a given player. This method is extremely useful if you are developing an SPA.
     * Is not recommended if you want to use an application with multiple pages or if you want to return a specific value regarding player statistics.
     *
     * @return array|string|stdClass
     */
    public function all(): array|string|stdClass
    {
        return $this->player->get();
    }

    /**
     * This method is responsible for returning all player progression (level, lootbox_probability and total_xp)
     *
     * @return array|string|stdClass
     */
    public function progression(): array|string|stdClass
    {
        return $this->player->get('progression');
    }

    /**
     * This method is responsible for returning all information about the user's nick, such as their login username, username that appears in online matches and also information about the last moment the player was online.
     *
     * @return array|string|stdClass
     */
    public function aliases(): array|string|stdClass
    {
        return $this->player->get('aliases');
    }

    /**
     * This method is responsible for returning all relevant player statistics regarding game modes played, queues frequented, ranked played, KD and others.
     *
     * @return array|string|stdClass
     */
    public function stats(): array|string|stdClass
    {
        return $this->player->get('stats');
    }
}