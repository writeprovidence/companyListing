<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\Company;
class ApprovedCompanyMiddleware
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
        if(! $company){
            return abort(404);
        }

        if(! $company->companyApproved()){
            if(Auth::user()->role == 'admin'){
                request()->session()->flash('error', 'Company Not Approved Yet!');
            }
            return redirect()->back();
        }

        return $next($request);
    }
}
