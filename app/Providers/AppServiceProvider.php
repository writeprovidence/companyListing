<?php

namespace App\Providers;

use View;
use App\Models\Company;
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
            $view->with('latest_companies', $latest_companies)
                ->with('top_companies', $top_companies);
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
