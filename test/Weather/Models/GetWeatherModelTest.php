<?php

namespace Olbe19\Weather\Models;

use PHPUnit\Framework\TestCase;

/**
 * Tests for the IP Validator class
 */
class GetWeatherModelTest extends TestCase
{
    private $ipGeoPosition;

    /**
     * Create validator before each test
     */
    protected function setUp() : void
    {
        $this->getWeather = new GetWeatherModel();
    }

    /**
     * Test that valid IP returns host
     */
    public function testSetAndGetApiKey()
    {
        $apiKey = "test";
        $this->getWeather->setApiKey($apiKey);
        $expected = $this->getWeather->getApiKey();

        $this->assertEquals($apiKey, $expected);
    }

    /**
     * Test that valid IP returns host
     */
    public function testSetAndGetCoordinates()
    {
        $latitude = "test";
        $longitude = "test2";

        $this->getWeather->setCoordinates($latitude, $longitude);
        $coordinates = $this->getWeather->getCoordinates();
        $expectedLatitude = $coordinates['latitude'];
        $expectedLongitude = $coordinates['longitude'];

        $this->assertEquals($latitude, $expectedLatitude);
        $this->assertEquals($longitude, $expectedLongitude);
    }

    /**
     * Test that valid IP returns host
     */
    public function testSetAndGetBaseUrl()
    {
        $baseUrl = "test";
        $this->getWeather->setBaseUrl($baseUrl);
        $expected = $this->getWeather->getBaseUrl();

        $this->assertEquals($baseUrl, $expected);
    }

    /**
     * Test that valid IP returns host
     */
    public function testSetAndGetUrl()
    {
        $url = "data/2.5/weather?lat=&lon=&appid=&units=metric";
        $this->getWeather->setUrl();
        $expected = $this->getWeather->getUrl();

        $this->assertEquals($url, $expected);
    }

    /**
     * Test that valid IP returns host
     */
    public function testSetAndGetUrlHistory()
    {
        $url = "data/2.5/onecall/timemachine?lat=&lon=&appid=&units=metric";
        $this->getWeather->setUrlHistory();
        $expected = $this->getWeather->getUrlHistory();

        $this->assertEquals($url, $expected);
    }

    /**
     * Test that valid IP returns host
     */
    public function testSetAndGetUrls()
    {
        $this->getWeather->setUrls();
        $result = $this->getWeather->getUrls();

        $this->assertIsArray($result);
    }

    /**
     * Test that valid IP returns host
     */
    public function testGetData()
    {
        $this->getWeather->setUrl();
        $result = $this->getWeather->getData();

        $this->assertIsArray($result);
    }

    /**
     * Test that valid IP returns host
     */
    public function testGetDataMulti()
    {
        $this->getWeather->setUrls();
        $result = $this->getWeather->getDataMulti();

        $this->assertIsArray($result);
    }

    /**
     * Test filterHistory method
     */
    // public function testFilterHistory()
    // {
    //     $array = ["test"];

    //     $result = $this->getWeather->filterHistory($array);;

    //     $this->assertIsArray($result);
    // }

    /**
     * Test getIconUrl method
     */
    public function testGetIconUrl()
    {
        $icon = "1";
        $url = $this->getWeather->getIconUrl($icon);
        $expected = "http://openweathermap.org/img/wn/1@2x.png";

        $this->assertEquals($url, $expected);
    }
}
