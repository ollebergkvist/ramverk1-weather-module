<?php

/**
 * Weather model
 */

namespace Olbe19\Weather\Models;

/**
 * Get Weather data from API.
 */
class GetWeatherModel
{
    protected $curl;
    private $baseUrl;
    private $apiKey;
    private $url;
    private $urls;
    private $latitude;
    private $longitude;

    /**
     * Constructor for Weather
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
     * Set API key
     *
     * @return void.
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Set coordinates
     *
     * @var string $coordinate1 Latitude
     * @var string $coordinate2 Longitude
     *
     * @return void.
     */
    public function setCoordinates($coordinate1, $coordinate2)
    {
        $this->latitude = $coordinate1;
        $this->longitude = $coordinate2;
    }

    /**
     * Get coordinates
     *
     * @var string $coordinate1 Latitude
     * @var string $coordinate2 Longitude
     *
     * @return void.
     */
    public function getCoordinates()
    {
        $coordinates = [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude
        ];
        return $coordinates;
    }

    /**
     * Set base URL
     *
     * @var string $url API base URL
     *
     * @return void.
     */
    public function setBaseUrl($url)
    {
        $this->baseUrl = $url;
    }

    /**
     * Get base URL
     *
     * @var string $url API base URL
     *
     * @return void.
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * Set URL
     *
     * @return void.
     */
    public function setUrl()
    {
        $this->url = $this->baseUrl . "data/2.5/weather" . "?lat=" . $this->latitude .
        "&lon=" . $this->longitude . "&appid=" . $this->apiKey . "&units=metric";
    }

    /**
     * Get URL
     *
     * @return void.
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set URL
     *
     * @return void.
     */
    public function setUrlHistory()
    {
        $this->url = $this->baseUrl . "data/2.5/onecall/timemachine" . "?lat=" . $this->latitude .
        "&lon=" . $this->longitude . "&appid=" . $this->apiKey . "&units=metric";
    }

    /**
     * Set URL
     *
     * @return void.
     */
    public function getUrlHistory()
    {
        return $this->url;
    }


    /**
     * Set URL:s
     *
     * @return void.
     */
    public function setUrls()
    {
        for ($i=-5; $i<=-1; $i++) {
            $timestamp = strtotime("$i days");
            $this->urls[] = $this->url . "&dt=" . $timestamp;
        }
    }

    /**
     * Get URL:s
     *
     * @return array.
     */
    public function getUrls()
    {
        return $this->urls;
    }

    /**
     * Get data from API
     *
     * @return array $result    Result from IP API.
     */
    public function getData()
    {
        $result = $this->curl->getData($this->url);

        $result = [
            "description" => $result["weather"][0]["description"] ?? null,
            "icon" => $result["weather"][0]["icon"] ?? null,
            "temperature" => $result["main"]["temp"] ?? null,
            "humidity" => $result["main"]["humidity"] ?? null,
            "wind" => $result["wind"]["speed"] ?? null,
        ];

        return $result;
    }

    /**
     * Get multi data from API
     *
     *
     * @return array $result    Result from Ipstack API.
     */
    public function getDataMulti()
    {
        $result = $this->curl->getDataMultiCurl($this->urls);

        return $result;
    }

    /**
     * Filter result from fetch
     *
     * @return array $result    Filtered result.
     */
    public function filterHistory(array $array)
    {
        $historyArray = $array;
        $filteredHistory = [];

        foreach ($historyArray as $date) {
            $filteredHistory[] = [
                "date" => date("Y-m-d", $date["hourly"][15]["dt"]),
                "description" => $date["hourly"][15]["weather"][0]["description"],
                "temperature" => $date["hourly"][15]["temp"],
                "wind" => $date["hourly"][15]["wind_speed"],
                "humidity" => $date["hourly"][15]["humidity"],
                "iconUrl" => "http://openweathermap.org/img/wn/"
                . $date["hourly"][15]["weather"][0]["icon"] . "@2x.png",
            ];
        }

        return array_reverse($filteredHistory);
    }

    /**
     * Get url to generate icon
     *
     * @var string $number      Icon number
     *
     * @return array $url       Icon URL.
     */
    public function getIconUrl($number)
    {
        $preBaseUrl = "http://openweathermap.org/img/wn/";
        $postBaseUrl = "@2x.png";
        $iconNumber = $number;
        $url = $preBaseUrl . $iconNumber . $postBaseUrl;

        return $url;
    }
}
