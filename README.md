# ramverk1-weather-module

[![Latest Stable Version](https://poser.pugx.org/olbe19/weather/v)](//packagist.org/packages/olbe19/weather)
[![Total Downloads](https://poser.pugx.org/olbe19/weather/downloads)](//packagist.org/packages/olbe19/weather)
[![License](https://poser.pugx.org/olbe19/weather/license)](//packagist.org/packages/olbe19/weather)

### Travis

[![Build Status](https://travis-ci.com/ollebergkvist/ramverk1-weather-module.svg?branch=main)](https://travis-ci.com/ollebergkvist/ramverk1-weather-module)

### Circle CI

[![CircleCI](https://circleci.com/gh/ollebergkvist/ramverk1-weather-module.svg?style=shield)](https://circleci.com/gh/ollebergkvist/ramverk1-weather-module)

### Scrutinizer

[![Build Status](https://scrutinizer-ci.com/g/ollebergkvist/ramverk1-weather-module/badges/build.png?b=main)](https://scrutinizer-ci.com/g/ollebergkvist/ramverk1-weather-module/build-status/main)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ollebergkvist/ramverk1-weather-module/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/ollebergkvist/ramverk1-weather-module/?branch=main)
[![Code Coverage](https://scrutinizer-ci.com/g/ollebergkvist/ramverk1-weather-module/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/ollebergkvist/ramverk1-weather-module/?branch=main)

### Code climate

[![Maintainability](https://api.codeclimate.com/v1/badges/a99a88d28ad37a79dbf6/maintainability)](https://codeclimate.com/github/codeclimate/codeclimate/maintainability)

### Codacy

[![Codacy Badge](https://app.codacy.com/project/badge/Grade/3272676487af451aa0b6ee000b9db104)](https://www.codacy.com/gh/ollebergkvist/ramverk1-weather-module/dashboard?utm_source=github.com&utm_medium=referral&utm_content=ollebergkvist/ramverk1-weather-module&utm_campaign=Badge_Grade)

## Installation

Install by cloning repo or with composer.

```
git clone https://github.com/ollebergkvist/ramverk1-weather-module

or

composer require olbe19/weather

```

## Setup

Set up the environment and install dependencies

```
composer install
chmod 777 cache/*
make install
bash vendor/olbe19/weather/.anax/scaffold/postprocess.d/001_olbe19_weather.
composer dump
```

## API keys

Module utilizes 2 public API:s to function, IPStack and Openweathermap.

```
Add 2 files named "api_key_ip.txt" and "api_key_map.txt" to config/
containing your keys for Ipstack and Openweathermap respectively.
```

## Navbar

Instructions how to mount the module in the navbar.

```
Add the Weather and API Documentation controllers to the navbar in config/navbar/header.php and config/navbar/responsive.php.

[
    "text" => "Weather",
    "url" => "weather",
    "title" => "Weather",
],
[
    "text" => "API Documentation",
    "url" => "api",
    "title" => "API Documentation",
],
```

## Issues

Kindly open issues here.

```
https://github.com/ollebergkvist/ramverk1-weather-module/issues

```
