<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Fox;
use App\Models\User;
use App\Policies\FoxPermissions;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Fox::class => FoxPermissions::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin', function(User $user) : bool{
            return (bool) $user->is_admin;
        });

        // Gate::define('edit', function(User $user) : bool{
        //     return (bool) $user->is_admin;
        // });

        // Gate::define('fox.delete', function(User $user, Fox $fox) : bool{
        //     return ((bool) $user->is_admin || $user->id === $fox->user_id);
        // });

        // Gate::define('fox.edit', function(User $user, Fox $fox) : bool{
        //     return ((bool) $user->is_admin || $user->id === $fox->user_id);
        // });
    }
}
