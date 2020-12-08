#!/usr/bin/env bash
#
# olbe19/weather
#
# Integrate the Weather module onto an existing anax installation.
#

# Copy the configuration files
rsync -av vendor/olbe19/weather/config ./

# Copy source files
rsync -av vendor/olbe19/weather/src ./

# Copy test files
rsync -av vendor/olbe19/weather/test ./

# Copy view files
rsync -av vendor/olbe19/weather/view ./
