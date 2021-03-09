<?php

namespace App\Providers;

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Schema;
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
        // Enable custom action for publish posts
        Voyager::addAction(\App\Actions\ConfirmAction::class);
        Schema::defaultStringLength(191);
    }
}
