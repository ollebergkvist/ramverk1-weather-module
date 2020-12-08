<?php

namespace Anax\View;

?>

<!-- API INFO -->
<h3>
    Weather API
</h3>
<p>
    The API receives GET requests at <code>weather-json</code>.
</p>
<p>
    Example how to enter query string: <code>?ip=216.58.217.36</code>.
</p>
<p>
    Result is returned in JSON format:
</p>

<pre>
{
    "location": {
        "city": "Herndon",
        "country": "United States"
    },
    "currentWeather": {
        "date": "2020-12-03",
        "description": "overcast clouds",
        "temperature": 11.32,
        "wind": 0.45,
        "humidity": 36,
        "iconUrl": "http://openweathermap.org/img/wn/04d@2x.png"
    },
    "weatherHistory": [
        {
            "date": "2020-12-02",
            "description": "overcast clouds",
            "temperature": 4.47,
            "wind": 8.7,
            "humidity": 64,
            "iconUrl": "http://openweathermap.org/img/wn/04d@2x.png"
        },
        {
            "date": "2020-12-01",
            "description": "broken clouds",
            "temperature": 5.38,
            "wind": 6.2,
            "humidity": 52,
            "iconUrl": "http://openweathermap.org/img/wn/04d@2x.png"
        },
        ...
    ]
}
</pre>

<!-- TEST ROUTES -->
<h3>Test route</h3>
<ul>
    <li>
        <a href="<?= url("weather-json?ip=216.58.217.36") ?>">Valid IP</a>
    </li>
</ul>
