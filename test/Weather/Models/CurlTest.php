<?php

namespace Olbe19\Weather\Models;

use PHPUnit\Framework\TestCase;

/**
 * Tests for the IP Validator class
 */
class CurlTest extends TestCase
{
    private $curl;

    /**
     * Create validator before each test
     */
    protected function setUp() : void
    {
        $this->curl = new Curl();
    }

    /**
     * Test that valid IP returns host
     */
    public function testGetData()
    {
        $url = "http://universities.hipolabs.com/search?country=United+Kingdom";
        $result = $this->curl->getData($url);

        $this->assertIsArray($result);
    }

    /**
     * Test that valid IP returns host
     */
    public function testGetMultiData()
    {
        $urls = [
            "http://universities.hipolabs.com/search?country=United+Kingdom",
            "http://universities.hipolabs.com/search?country=Sweden"
        ];
        $result = $this->curl->getDataMultiCurl($urls);

        $this->assertIsArray($result);
    }
}
