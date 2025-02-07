<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */

     protected function registerPolicies()
{
    //
}
    public function boot(): void
    {
        //

        


    }

    // Gate for creating complaints (Super Admin, Branch Admin)
    
}
