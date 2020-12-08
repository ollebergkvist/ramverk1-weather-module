<?php
/**
 * Configuration file to create Weather as $di service.
 */

return [
    "services" => [
        "getweathermodel" => [
            "active" => false,
            "shared" => true,
            "callback" => function () {
                $getWeatherModel = new \Olbe19\Weather\Models\GetWeatherModel();
                $cfg = $this->get("configuration");
                $config = $cfg->load("config.php");

                $apiKey = $config["config"]["apikey-map"];
                $baseUrl = $config["config"]["baseurl-map"];

                $getWeatherModel->setApiKey($apiKey);
                $getWeatherModel->setBaseUrl($baseUrl);

                return $getWeatherModel;
            },
        ],
    ],
];
