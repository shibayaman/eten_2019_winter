<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class EnsureNotOwner
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
        if(Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        }
        return $next($request);
    }
}
