<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class LimitReq
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

        $executed = RateLimiter::attempt('send-message:', 5, function() {});
        if(! $executed){
            return response()->json('There Is Something Wrong , Please Contact Technical Support (11)', 500);
        }
        return $next($request);
    }
}
