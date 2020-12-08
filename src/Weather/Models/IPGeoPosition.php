<?php

/**
 * IP geo position model
 */

namespace Olbe19\Weather\Models;

/**
 * Get IP data from IPstack
 *
 */
class IPGeoPosition
{
    protected $curl;
    private $apiKey;
    private $baseUrl;
    private $url;

    /**
     * Constructor for IP Geo Position Class
     *
     * @var Curl $curl  Curl model
     */
    public function __construct()
    {
        $this->curl = new Curl();
    }

    /**
     * Set API key
     *
     * @var string $key API key
     *
     * @return void.
     */
    public function setApiKey(String $key)
    {
        $this->apiKey = $key;
    }

    /**
     * Get API key
     *
     * @return string.
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Set base URL
     *
     * @var string $url URL to curl
     *
     * @return void.
     */
    public function setBaseUrl($url)
    {
        $this->baseUrl = $url;
    }

    /**
     * Set URL
     *
     * @var string $ipAddress IP address to geo position
     *
     * @return void.
     */
    public function setUrl($ipAddress)
    {
        $this->url = $this->baseUrl . $ipAddress . "?access_key=" . $this->apiKey;
    }

    /**
     * Get data from API
     *
     * @return array $result Result from API
     */
    public function getData()
    {
        $fetch = $this->curl->getData($this->url);

        $result = [
            "country" => $fetch["country_name"] ?? null,
            "city" => $fetch["city"] ?? null,
            "longitude" => $fetch["longitude"] ?? null,
            "latitude" => $fetch["latitude"] ?? null,
        ];

        return $result;
    }
}
