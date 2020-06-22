<?php

namespace App\Providers;

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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        
        Gate::resource('users','App\Policies\UserPolicy');
        Gate::resource('posts','App\Policies\PostPolicy');
        Gate::define('posts.tag','App\Policies\PostPolicy@tag');
        Gate::define('posts.category','App\Policies\PostPolicy@category');
        Gate::define('posts.role','App\Policies\PostPolicy@role');
        Gate::define('posts.permission','App\Policies\PostPolicy@permission');
        Gate::define('posts.publish','App\Policies\PostPolicy@publish');
    }
}
