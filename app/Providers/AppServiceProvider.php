<?php

namespace App\Providers;

use App\Slide;
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
        view()->composer(['admin.slider.index', 'admin.slider.create'], function($view) {
            $view->with('slides', Slide::orderBy('position')->get());
        });
    }
}
