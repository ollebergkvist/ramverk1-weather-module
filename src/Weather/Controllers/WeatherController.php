<?php

namespace Olbe19\Weather\Controllers;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Controller for Weather.
 */
class WeatherController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * This is the index method action, it handles:
     * GET METHOD mountpoint
     *
     * @return object
     */
    public function indexActionGet(): object
    {
        // General framework setup
        $page = $this->di->get("page");
        $title = "Weather";
        $request = $this->di->get("request");
        $ipAddress = $request->getGet("ip");

        // Get user ip
        if (empty($ipAddress)) {
            $getUserIP = $this->di->get("getuserip");
            $ipAddress = $getUserIP->getIP();
        }

        // Validate IP
        $ipValidator = $this->di->get("ipvalidator");
        $isValidIP = $ipValidator->isIPValid($ipAddress);

        // Get IP position
        $ipGeoPosition = $this->di->get("ipgeoposition");
        $ipGeoPosition->setUrl($ipAddress);
        $ipGeoPositionResult = $ipGeoPosition->getData();
        $latitude = $ipGeoPositionResult["latitude"] ?? null;
        $longitude = $ipGeoPositionResult["longitude"] ?? null;

        // Get weather forecast
        $getWeather = $this->di->get("getweathermodel");
        $getWeather->setCoordinates($latitude, $longitude);
        $getWeather->setUrl();
        $weatherForecast = $getWeather->getData();
        $iconUrl = $getWeather->getIconUrl($weatherForecast["icon"]);

        // Get weather history
        $getWeather->setUrlHistory();
        $getWeather->setUrls();
        $weatherHistory = $getWeather->getDataMulti();
        $filteredResult =  $getWeather->filterHistory($weatherHistory);

        // Data to send to view
        $data = [
            "ip" => $ipAddress ?? null,
            "isValidIP" => $isValidIP ?? null,
            "latitude" => $ipGeoPositionResult["latitude"] ?? null,
            "longitude" => $ipGeoPositionResult["longitude"] ?? null,
            "country" => $ipGeoPositionResult["country"] ?? null,
            "city" => $ipGeoPositionResult["city"] ?? null,
            "weather" => $weatherForecast["weather"] ?? null,
            "description" => $weatherForecast["description"] ?? null,
            "iconUrl" => $iconUrl ?? null,
            "temperature" => $weatherForecast["temperature"] ?? null,
            "wind" => $weatherForecast["wind"] ?? null,
            "humidity" => $weatherForecast["humidity"] ?? null,
            "weatherHistory" => $filteredResult ?? null,
        ];

        $page->add("weather/index", $data);

        return $page->render([
            "title" => $title,
        ]);
    }
}
