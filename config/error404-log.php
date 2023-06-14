<?php

return [

    /*
     * Turn the logging on and off her or in your env file.
     */
    'enabled' => env('ERROR404LOG_ENABLED', true),

    /*
     * You can automatically delete log files after a certain amount of days.
     * Setting this to 0 will prevent any deletions.
     */
    'delete-after' => 30,

    /*
     * Option to change the name of the log files to avoid any conflicts.
     */
    'log-name' => 'error404-log',
];