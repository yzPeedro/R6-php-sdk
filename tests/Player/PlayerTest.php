<?php

namespace RainbowStats\RainbowStats\Stats;

use PHPUnit\Framework\TestCase;
use RainbowStats\RainbowStats\Auth\Authentication;

class PlayerTest extends TestCase
{
    private string $key = 'API_KEY';

    public function testProgression()
    {
        $auth = new Authentication($this->key);

        $player = new Player($auth, [
            'username' => 'Mumiia661',
            'platform' => 'pc'
        ]);

        $this->assertInstanceOf('stdClass', $player->progression());
    }

    public function testAll()
    {
        $auth = new Authentication($this->key);

        $player = new Player($auth, [
            'username' => 'Mumiia661',
            'platform' => 'pc'
        ]);

        $this->assertInstanceOf('stdClass', $player->all());
    }

    public function testAliases()
    {
        $auth = new Authentication($this->key);

        $player = new Player($auth, [
            'username' => 'Mumiia661',
            'platform' => 'pc'
        ]);

        $this->assertIsArray($player->aliases());
    }

    public function testStats()
    {
        $auth = new Authentication($this->key);

        $player = new Player($auth, [
            'username' => 'Mumiia661',
            'platform' => 'pc'
        ]);

        $this->assertInstanceOf('stdClass', $player->stats());
    }
}
