<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use RainbowStats\RainbowStats\Auth\Authentication;

class AuthenticationTest extends TestCase
{
    public function testInvalidApiKeyMustReturnFalse()
    {
        $auth = new Authentication('INVALID_API_KEY');
        $this->assertFalse($auth->isKeyValid());
    }

    public function testNoApiKeyProvided()
    {
        $auth = new Authentication('');
        $this->assertFalse($auth->isKeyValid());
    }
}
