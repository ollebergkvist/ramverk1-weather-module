<?php
/**
 * Configuration file to create router as $di service.
 */

return [
    "services" => [
        "ipgeoposition" => [
            "active" => false,
            "shared" => true,
            "callback" => function () {
                $ipGeoPosition = new \Olbe19\Weather\Models\IPGeoPosition();
                $cfg = $this->get("configuration");
                $config = $cfg->load("config.php");

                $apiKey = $config["config"]["apikey-ip"];
                $baseUrl = $config["config"]["baseurl-ip"];

                $ipGeoPosition->setApiKey($apiKey);
                $ipGeoPosition->setBaseUrl($baseUrl);

                return $ipGeoPosition;
            },
        ],
    ],
];
