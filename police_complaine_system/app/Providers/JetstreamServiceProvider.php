<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Policies\UserPolicy;
use App\Models\User;
class JetstreamServiceProvider extends ServiceProvider
{

    protected $policies = [
        User::class => UserPolicy::class,
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        Gate::define('manageUsers', [UserPolicy::class, 'manageUsers']);
        Gate::define('manageBranch', [UserPolicy::class, 'manageBranch']);
        Gate::define('manageComplaints', [UserPolicy::class, 'manageComplaints']);
    
    }

    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
        Route::aliasMiddleware('userType', CheckRole::class);


       
        
    
    }
}
