<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Models\Company;

class CheckReviewerMiddleware
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
        $company = Company::whereSlug($request->route('companySlug'))->first();

        if( Auth::id() && Auth::id() == $company->user_id){
            $request->session()->flash('error', 'A company holder cannot post review for his own company');
            return redirect()->back();
        }

        return $next($request);
    }
}
