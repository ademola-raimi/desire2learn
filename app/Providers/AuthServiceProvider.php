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

        // Superadmin user can create and edit a category
        $gate->define('super-admin', function ($user) {
            return $user->role_id === 2 || 3;
        });
    }
}
