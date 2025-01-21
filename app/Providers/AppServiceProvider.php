<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;

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
    Schema::defaultStringLength(191);

    // Menu para Administradores
    Gate::define('isAdmin', function ($user) {
        return $user->role === 'admin';
    });

    // Menu para Jurisdicciones
    Gate::define('isJurisdiccion', function ($user) {
        return $user->role === 'jurisdiccion';
    });

    // Menu para Unidades
    Gate::define('isUnidad', function ($user) {
        return $user->role === 'unidad';
    });
}
}
