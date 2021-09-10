<?php

namespace App\Providers;

use App\Models\Articulo;
use App\Models\Comentario;
use App\Policies\ArticuloPolicy;
use App\Policies\ComentarioPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         Comentario::class => ComentarioPolicy::class,
         Articulo::class => ArticuloPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
