<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Solicitacao;
use App\Models\Gestor;
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
        Gate::define('update-solicitacao', function (Gestor $user, Solicitacao $solicitacao) {
            return $user->id === $solicitacao->user_id;
        });
    }
}
