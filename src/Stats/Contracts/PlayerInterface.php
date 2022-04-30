<?php

namespace RainbowStats\RainbowStats\Stats\Contracts;

use RainbowStats\RainbowStats\Auth\Authentication;
use stdClass;

interface PlayerInterface
{
    /**
     * @param Authentication $auth
     * @param array $data
     */
    public function __construct(Authentication $auth, array $data);

    /**
     * @return array|string|stdClass
     */
    public function progression(): array|string|stdClass;

    /**
     * @return array|string|stdClass
     */
    public function all(): array|string|stdClass;

    /**
     * @return array|string|stdClass
     */
    public function aliases(): array|string|stdClass;

    /**
     * @return array|string|stdClass
     */
    public function stats(): array|string|stdClass;
}