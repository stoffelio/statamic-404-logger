# Statamic 404 Logger

> Statamic addon to automatically log all 404 requests.

## Features

Any request to your website resulting in a 404 error will be written to a log file. The file contains the timestamp as well as the exact url that was requested. Use the information to fix your internal links or redirect users to the correct resource.

You can add a ERROR404LOG_ENABLED variable to your .env file to turn the logging on or off (defaults to on).

## How to Install

Run the following command from your project root:

``` bash
composer require stoffelio/statamic-404-logger
```

Optional: Change the name of the log file and the retention period in config/error404-log.php
