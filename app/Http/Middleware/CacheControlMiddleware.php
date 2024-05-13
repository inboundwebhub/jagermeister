<?php

namespace App\Http\Middleware;

use Closure;

class CacheControlMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($response->getStatusCode() === 200 && $response->isSuccessful()) {
            $response->header('Cache-Control', 'public, max-age=31536000'); // Adjust the max-age as needed
        }

        return $response;
    }
}