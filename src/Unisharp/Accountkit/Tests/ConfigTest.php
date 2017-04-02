<?php

namespace Ingresse\Accountkit\Tests;

use Ingresse\Accountkit\Config;
use PHPUnit_Framework_TestCase;

class ConfigTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers Unisharp\Accountkit\Config
     */
    public function testConfig()
    {
        $config = new Config(['app_id' => 123, 'app_secret' => 'abc123']);

        $this->assertEquals(123, $config->getAppId());
        $this->assertEquals('abc123', $config->getAppSecret());
    }

    /**
     * @covers Unisharp\Accountkit\Config
     * @expectedException OutOfBoundsException
     */
    public function testConfigThrowsException()
    {
        $config = new Config(['app_id' => 123, 'secret' => 'abc123']);
    }

    /**
     * @covers Unisharp\Accountkit\Config
     */
    public function testConfigGetUrlToken()
    {
        $config = new Config(['app_id' => 123, 'app_secret' => 'abc123']);

        $this->assertEquals(
            'https://graph.accountkit.com/v1.1/access_token',
            $config->getUrlToken()
        );
    }

    /**
     * @covers Unisharp\Accountkit\Config
     */
    public function testConfigGetUrlUser()
    {
        $config = new Config(['app_id' => 123, 'app_secret' => 'abc123']);

        $this->assertEquals(
            'https://graph.accountkit.com/v1.1/me',
            $config->getUrlUser()
        );
    }
}
