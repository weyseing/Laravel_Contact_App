<?php

namespace App\Providers;

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
        // -----------------------------
        // add this to set Laravel to Bootstrap CSS from Default Tailwind CSS
        // -----------------------------
        \Illuminate\Pagination\Paginator::useBootstrap();
    }
}
