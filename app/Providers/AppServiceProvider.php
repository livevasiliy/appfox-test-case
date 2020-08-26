<?php

namespace App\Providers;

use App\CompanyPost;
use App\CompanyProduct;
use App\Observers\CompanyPostObserver;
use App\Observers\CompanyProductObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        CompanyProduct::observe(CompanyProductObserver::class);
        CompanyPost::observe(CompanyPostObserver::class);
    }
}
