# ramverk1-weather-module

## Travis

## Circle CI

## Scrutinizer

## Code climate

## Codacy

## Requirements

```
PHP 7.4 or newer version

composer

git

Not needed but recommended:

A webserver with PHP enabled.

make

node and npm to work with the theme/.

Docker and docker-compose to run in containers.
```

## Clone repo

```
git clone https://github.com/ollebergkvist/ramverk1-weather-module

```

## Issues

```
https://github.com/ollebergkvist/ramverk1-weather-module/issues

```

## Setup

Set up the environment and install dependencies

```
composer install
chmod 777 cache/*
bash vendor/olbe19/weather/.anax/scaffold/postprocess.d/001_olbe19_weather.bash
composer dump
```

# Config

```
Rename config_sample.php to config.php in \config
Update api keys to your own in the config file
```
