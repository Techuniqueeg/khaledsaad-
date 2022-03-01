<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Verified
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth('api')->check()) {
            if (auth('api')->user()->email_verified == '0') {

                return response()->json('please verify Email',406);

            } else {
                return $next($request);
            }
        }
    }
}
