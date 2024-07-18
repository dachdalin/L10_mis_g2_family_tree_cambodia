<?php

namespace App\Providers;

use App\Models\Team;
use Illuminate\Support\Facades\Gate;
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
        Gate::before(function ($user, $ability) {
            return $user->roles('SuperAdmin') ? true : null;
        });

        view()->composer('*', function ($view) {
            $view->with('teams', Team::all());
        });
    }
}
