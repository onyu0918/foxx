<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
        Paginator::useBootstrapFive();

        \Debugbar::enable();

        $topUsers = Cache::remember("topUsers", now()->addMinutes(5) , function () {
            return User::withCount('foxx')
            ->orderBy('created_at', 'DESC')
            ->take(10)->get();
        });

        View::share(
            'topUsers',
            $topUsers,
        );

    }
}
