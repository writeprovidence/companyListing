<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckUserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(! Auth::user()->isAdmin()){
                return redirect()->route('dashboard');
            }
        }
        return $next($request);
    }
}
