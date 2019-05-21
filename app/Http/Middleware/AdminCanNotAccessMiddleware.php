<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminCanNotAccessMiddleware
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
            if(Auth::user()->isAdmin()){
                $request->session()->flash('error', 'You need to log in as user to perform that operation');
                return redirect()->route('admin.dashboard');
            }
        }
        return $next($request);
    }
}
