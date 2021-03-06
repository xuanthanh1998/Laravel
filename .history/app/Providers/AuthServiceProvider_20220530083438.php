<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        \App\Models\TheLoaiModel::class => \App\Policies\TheloaiPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        Gate::define('view-page-admin', function ($user) {

            if ($user->admin == "1") {
      
                return true;
      
            }
      
            return false;
      
        });
      
      
        Gate::define('view-page-guest', function ($user) {
      
            if ($user->admin == "1" || $user->admin == "0") {
      
                return true;
      
            }
      
            return false;
      
        });
    }
}