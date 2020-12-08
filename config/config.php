<?php
/**
 * Configuration.
 *
 */

if (getenv("ENV")) {
    return [
        "apikey-ip" => getenv("APIKEYIP"),
        "apikey-map" => getenv("APIKEYMAP"),
        "baseurl-ip" => "http://api.ipstack.com/",
        "baseurl-map" => "https://api.openweathermap.org/",
    ];
}

return [
    "apikey-ip" => file_get_contents(ANAX_INSTALL_PATH . "/config/api_key_ip.txt"),
    "apikey-map" => file_get_contents(ANAX_INSTALL_PATH . "/config/api_key_map.txt"),
    "baseurl-ip" => "http://api.ipstack.com/",
    "baseurl-map" => "https://api.openweathermap.org/",
];
