<?php

namespace Desire2Learn\Providers;

use Desire2Learn\User;
use Desire2Learn\Category;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Desire2Learn\Model' => 'Desire2Learn\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param \Illuminate\Contracts\Auth\Access\Gate $gate
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);

        // Superadmin and special user can create and edit a category
        $gate->define('super-special-admin', function ($user) {
            return $user->role_id === 2 || 3;
        });

        // special user can create a superadmin user and can delete a catgory
        $gate->define('special-admin', function ($user) {
            return $user->role_id === 3;
        });

        // Regular User cannot create, edit and create a category
        $gate->define('super-special-admin', function ($user) {
            return $user->role_id !== 1;
        });
    }
}
