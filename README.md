# ramverk1-weather-module

## Travis

[![Build Status](https://travis-ci.com/ollebergkvist/ramverk1-weather-module.svg?branch=main)](https://travis-ci.com/ollebergkvist/ramverk1-weather-module)

## Circle CI

[![CircleCI](https://circleci.com/gh/ollebergkvist/ramverk1-weather-module.svg?style=shield)](https://circleci.com/gh/ollebergkvist/ramverk1-weather-module)

## Scrutinizer

[![Build Status](https://scrutinizer-ci.com/g/ollebergkvist/ramverk1-weather-module/badges/build.png?b=main)](https://scrutinizer-ci.com/g/ollebergkvist/ramverk1-weather-module/build-status/main)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ollebergkvist/ramverk1-weather-module/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/ollebergkvist/ramverk1-weather-module/?branch=main)
[![Code Coverage](https://scrutinizer-ci.com/g/ollebergkvist/ramverk1-weather-module/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/ollebergkvist/ramverk1-weather-module/?branch=main)

## Code climate

[![Maintainability](https://api.codeclimate.com/v1/badges/a99a88d28ad37a79dbf6/maintainability)](https://codeclimate.com/github/codeclimate/codeclimate/maintainability)

## Codacy

[![Codacy Badge](https://app.codacy.com/project/badge/Grade/3272676487af451aa0b6ee000b9db104)](https://www.codacy.com/gh/ollebergkvist/ramverk1-weather-module/dashboard?utm_source=github.com&utm_medium=referral&utm_content=ollebergkvist/ramverk1-weather-module&utm_campaign=Badge_Grade)

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
