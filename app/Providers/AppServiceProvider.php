<?php

namespace App\Providers;

use View;
use Auth;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer('*', function ($view) {
            $latest_companies = Company::orderBy('created_at', 'desc')->limit(5)->get();
            $top_companies = Company::orderBy('alexa_global_rank', 'desc')->limit(5)->get();
            $global_companies = Company::whereIsPublic(1)->whereFeature(1)->orderBy('created_at', 'desc')->limit(4)->get();
            if(Auth::user()->hasCompany()){
                $hasProduct = Product::whereCompanyId(Auth::user()->company->id)->first();
                $view->with('hasProduct', $hasProduct->hasProduct());
            }

            $view->with('latest_companies', $latest_companies)
                ->with('top_companies', $top_companies)
                ->with('global_companies', $global_companies);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
