<?php

namespace Faryar\Cdnjs\Providers;

use Illuminate\Support\ServiceProvider;
use Faryar\Cdnjs\Cdnjs as facadee;
class CdnjsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('cdnjs-facade',function(){
            return new facadee();
        });  
         \Cdnjs::directive();
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
