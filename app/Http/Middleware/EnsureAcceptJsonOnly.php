<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAcceptJsonOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //dd("handle header");
        // Check if the 'Accept' header is present
        if (!$request->hasHeader('Accept')) {
            // Add the 'Accept' header with the default value
            $request->headers->set('Accept', 'application/json');
        }

        return $next($request);
    }
}
