<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd($request);
        $hi=auth()->user();
        
        // dd($hi->usertype);
        
        if (auth()->check() && auth()->user()->usertype == 'admin') {
            return $next($request); // Proceed with the request
        }

        // If not an admin, return a 403 Forbidden response
        return response()->json(['error' => 'Forbidden'], 403);
        abort(403);  

        // return response()->json(['error' => 'Forbidden'], 403);

    }
}
