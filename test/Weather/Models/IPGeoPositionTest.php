<?php

namespace Olbe19\Weather\Models;

use PHPUnit\Framework\TestCase;

/**
 * Tests for the IP Validator class
 */
class IPGeoPositionTest extends TestCase
{
    private $ipGeoPosition;

    /**
     * Create validator before each test
     */
    protected function setUp() : void
    {
        $this->ipGeoPosition = new IPGeoPosition();
    }

    /**
     * Test that valid IP returns host
     */
    public function testSetAndGetApiKey()
    {
        $apiKey = "test";
        $this->ipGeoPosition->setApiKey($apiKey);
        $expected = $this->ipGeoPosition->getApiKey();

        $this->assertEquals($apiKey, $expected);
    }

    /**
     * Test that valid IP returns host
     */
    public function testGetData()
    {
        $url = "test";
        $ipAddress = "216.58.217.36";

        $this->ipGeoPosition->setBaseUrl($url);
        $this->ipGeoPosition->setUrl($ipAddress);

        $result = $this->ipGeoPosition->getData();

        $this->assertIsArray($result);
    }
}
