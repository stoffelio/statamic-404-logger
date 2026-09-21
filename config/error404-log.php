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

    /*
     * Requests whose path matches one of these patterns are never logged.
     * Bots probe every site for WordPress, admin panels and stray config
     * files, and none of it tells you anything about your own links.
     * Patterns are matched against the path with Str::is(), so * is a
     * wildcard. Set this to an empty array to log everything.
     */
    'ignore' => [
        '.env',
        '.env.*',
        '.git',
        '.git/*',
        '*.asp',
        '*.aspx',
        '*.cgi',
        '*.jsp',
        '*.php',
        'administrator',
        'administrator/*',
        'autodiscover/*',
        'cgi-bin/*',
        'phpmyadmin',
        'phpmyadmin/*',
        'vendor/*',
        'wordpress',
        'wordpress/*',
        'wp',
        'wp/*',
        'wp-admin',
        'wp-admin/*',
        'wp-content/*',
        'wp-includes/*',
        'wp-json',
        'wp-json/*',
    ],
];
