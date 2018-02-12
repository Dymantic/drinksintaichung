<?php

namespace App\Providers;

use App\Establishments\SuggestedEstablishment;
use App\Establishments\SuggestedEstablishmentObserver;
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
        SuggestedEstablishment::observe(SuggestedEstablishmentObserver::class);
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
