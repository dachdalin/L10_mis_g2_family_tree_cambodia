<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\Setting;
use Illuminate\Support\Facades\Gate;
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
        Gate::before(function ($user, $ability) {
            return $user->roles('SuperAdmin') ? true : null;
        });

        view()->composer('*', function ($view) {
            $view->with('teams', Team::all());
        });
        $setting = Setting::all();
        $data = [
            'meta_title' => $setting->where('key', 'meta_title')->first()->value??'',
            'meta_description' => $setting->where('key', 'meta_description')->first()->value??'',
            'meta_keywords' => $setting->where('key', 'meta_keywords')->first()->value??'',
            'meta_author' => $setting->where('key', 'meta_author')->first()->value??'',
            'meta_image' => $setting->where('key', 'meta_image')->first()->value??'',
            'logo' => $setting->where('key', 'logo')->first()->value??'',
            'favicon' => $setting->where('key', 'favicon')->first()->value??'',
            
        ];
        View::share('web_config', $data);
    }
}
