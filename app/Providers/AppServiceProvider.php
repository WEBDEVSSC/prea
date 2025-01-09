<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        // Menu para Administradores
        Gate::define('isAdmin', function ($user) {
            return $user->role === 'admin';
        });

        // Menu para Jurisdicciones
        Gate::define('isJurisdiccion', function ($user) {
            return $user->role === 'jurisdiccion';
        });

        // Menu para Administradores
        Gate::define('isUnidad', function ($user) {
            return $user->role === 'unidad';
        });
    }
}
