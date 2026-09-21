<?php

namespace Stoffelio\Statamic404Logger\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Error404LogMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (config('error404-log.enabled', false) && $response->status() === 404 && ! $this->ignored($request)) {
            Log::channel('error404-log')->info($request->fullUrl());
        }

        return $response;
    }

    protected function ignored(Request $request): bool
    {
        $patterns = config('error404-log.ignore', []);

        return $patterns ? Str::is($patterns, $request->path()) : false;
    }
}
