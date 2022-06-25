<?php

namespace RainbowStats\RainbowStats\Stats\Contracts;

use stdClass;

interface GameInterface
{
    /**
     * @return array|string|stdClass
     */
    public function leaderboard(): array|string|stdClass;
}