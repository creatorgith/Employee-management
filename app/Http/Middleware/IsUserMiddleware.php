<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $hi=auth()->user();
        dd('Middleware is being executed');
        if (auth()->check() && auth()->user()->usertype == 'user') {
            dd($hi);
            return $next($request); // Proceed with the request
        }

    }
}
