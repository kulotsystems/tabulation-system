<?php

namespace App\Providers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Http;
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
        Blade::if('devserver', function() {
            if(app()->environment('production')) {
                return false;
            }
            else {
                try {
                    Http::get(env('VITE_URL'));
                    return true;
                }
                catch (ConnectionException $exception) {
                    return false;
                }
            }
        });
    }
}
