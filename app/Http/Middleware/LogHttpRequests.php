<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogHttpRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Log details to the 'http' channel
        Log::channel('http')->info(sprintf(
            '[%s] %s - %d - %s',
            $request->method(),
            $request->fullUrl(),
            $response->getStatusCode(),
            json_encode($response->headers->all()) // Optional: log headers
        ));

        return $response;
    }
}
