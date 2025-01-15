<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
        // Livewire::setUpdateRoute(function ($handle) {
        //     return Route::post(LaravelLocalization::setLocale() . '/livewire/update', $handle)
        ////         ->middleware(['web', 'auth']); // Add any other middleware as needed
        //         ->middleware(['web', 'auth:student,web']); // Add any other middleware as needed
        // });
    
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post(LaravelLocalization::setLocale() . '/livewire/update', $handle)
                ->middleware(['web', 'livewire.guard.check']); // Apply custom guard-check middleware
        });
        DB::listen(function ($query) {
            Log::info($query->sql, $query->bindings);
        });
    }
    
}
