<?php

namespace App\Http\Middleware;

use Closure;
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
            return redirect()->back();
        }

        return $next($request);
    }
}
