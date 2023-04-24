<?php

namespace App\Http\Middleware;

use Closure;

class CheckOriginAndReferer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $allowedOrigins = ['https://www.christotherapymission.org/'];
        $referer = $request->headers->get('referer');
        $origin = $request->headers->get('origin');

     

        if (in_array($origin, $allowedOrigins) && strpos($referer, 'example.com') !== false) {
            return $next($request);
        }

        return response('Unauthorized.', 401);
    }
}
