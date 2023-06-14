<?php

namespace Stoffelio\Statamic404Logger\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Error404LogMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (config('error404-log.enabled', false) && $response->status() === 404) {
            Log::channel('error404-log')->info($request->fullUrl());
        }

        return $response;
    }
}