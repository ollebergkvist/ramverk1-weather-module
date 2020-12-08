<?php

namespace Olbe19\Weather\Controllers;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Controller for Weather API.
 */
class WeatherJsonController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * This is the index method action, it handles:
     * GET METHOD mountpoint
     *
     * @return array
     */
    public function indexActionGet(): array
    {
        // General framework setup
        $request = $this->di->get("request");
        $ipAddress = $request->getGet("ip") ?? "missing ip";

        // Validate IP
        $ipValidator = $this->di->get("ipvalidator");
        $ipValidator->isIPValid($ipAddress);

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

        // Location
        $location = [
            "city" => $ipGeoPositionResult["city"] ?? null,
            "country" => $ipGeoPositionResult["country"] ?? null,
        ];

        // Current weather
        $currentWeather = [
            "date" => date("Y-m-d") ?? null,
            "description" => $weatherForecast["description"] ?? null,
            "temperature" => $weatherForecast["temperature"] ?? null,
            "wind" => $weatherForecast["wind"] ?? null,
            "humidity" => $weatherForecast["humidity"] ?? null,
            "iconUrl" => $iconUrl ?? null,
        ];

        // Get weather history
        $getWeather->setUrlHistory();
        $getWeather->setUrls();
        $weatherHistory = $getWeather->getDataMulti();
        $filteredResult =  $getWeather->filterHistory($weatherHistory);

        // Data to return as JSON
        $data = [
            "location" => $location ?? null,
            "currentWeather" => $currentWeather ?? null,
            "weatherHistory" => $filteredResult ?? null,
        ];

        $json = [$data];

        return [$json];
    }
}
