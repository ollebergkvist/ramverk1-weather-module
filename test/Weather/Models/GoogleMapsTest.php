<?php

namespace Olbe19\Weather\Models;

use PHPUnit\Framework\TestCase;

/**
 * Tests for GoogleMaps class
 */
class GoogleMapsTest extends TestCase
{
    private $map;

    /**
     * Create validator before each test
     */
    protected function setUp() : void
    {
        $this->map = new GoogleMaps();
    }

    /**
     * Test that valid IP returns true
     */
    public function testGetMap()
    {
        $latitude = "38.98371887207";
        $longitude = "-77.382759094238";
        $result = $this->map->getMap($latitude, $longitude);
        $expected = "https://www.google.com/maps/search/?api=1&query=-77.382759094238,38.98371887207";

        $this->assertEquals($result, $expected);
    }

    /**
     * Test that valid IP returns true
     */
    public function testGetMapInvalid()
    {
        $latitude = "";
        $longitude = "";
        $result = $this->map->getMap($latitude, $longitude);
        $expected = "";

        $this->assertEquals($result, $expected);
    }
}
