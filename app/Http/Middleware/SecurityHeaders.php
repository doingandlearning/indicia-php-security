<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->headers->set('x-test-header', "This is a test");
        // $response->headers->set('Content-Security-Policy', "default-src 'self' https://api.example.com'; script-src 'self' 'unsafe-inline'; style-src 'self';");
        return $response;
    }

}
