<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SampleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        app()->bind('SampleSP',function(){
            
            return 'Returning from the sample service provider';

        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
