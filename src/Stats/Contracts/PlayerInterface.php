<?php

namespace RainbowStats\RainbowStats\Stats\Contracts;

use RainbowStats\RainbowStats\Auth\Authentication;
use stdClass;

interface PlayerInterface
{
    public function __construct(Authentication $auth, array $data);

    public function progression(): array|string|stdClass;

    public function all(): array|string|stdClass;

    public function aliases(): array|string|stdClass;

    public function stats(): array|string|stdClass;
}