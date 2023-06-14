<?php

namespace Stoffelio\Statamic404Logger;

use Statamic\Providers\AddonServiceProvider;
use Statamic\Statamic;
use Stoffelio\Statamic404Logger\Middleware\Error404LogMiddleware;

class ServiceProvider extends AddonServiceProvider
{
    protected $middlewareGroups = [
        'web' => [
            Error404LogMiddleware::class
        ],
    ];
    public function bootAddon()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/error404-log.php', 'error404-log');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/error404-log.php' => config_path('error404-log.php'),
            ], 'error404-log');
        }

        Statamic::afterInstalled(function ($command) {
            $command->call('vendor:publish', ['--tag' => 'error404-log']);
        });

        $this->app->make('config')->set('logging.channels.error404-log', [
            'driver' => 'daily',
            'path' => storage_path('logs/'.config('error404-log.log-name', 'error404-log').'.log'),
            'level' => 'debug',
            'days' => config('error404-log.delete-after', 30),
        ]);
    }
}
