<?php

namespace App\Providers;

use Illuminate\Auth\Access\AuthorizationResponse;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [];

    public function boot(): void
    {
        // (opsional) superadmin bypass
        Gate::before(function ($user, string $ability) {
            if ($user && strcasecmp(trim($user->role ?? ''), 'superadmin') === 0) {
                return true;
            }
            return null;
        });

        Gate::define('access-admin-panel', function ($user) {
            if (!$user) {
                return AuthorizationResponse::deny('Silakan login.');
            }
            $isAdmin = strcasecmp(trim($user->role ?? ''), 'admin') === 0;
            return $isAdmin
                ? AuthorizationResponse::allow()
                : AuthorizationResponse::deny('Bukan admin.');
        });
    }
}
