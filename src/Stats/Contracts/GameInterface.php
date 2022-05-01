<?php

namespace RainbowStats\RainbowStats\Stats\Contracts;

interface GameInterface
{
    public function leaderboard(): array|string|\stdClass;
}