<?php

namespace InnovaCondomi\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\ContactoWeb;
use InnovaCondomi\Entities\Com\Direccion;
use InnovaCondomi\Entities\Com\Telefono;
use InnovaCondomi\Entities\Pro\Proveedor;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'Cliente' => Cliente::class,
            'Direccion' => Direccion::class,
            'Telefono' => Telefono::class,
            'ContactoWeb' => ContactoWeb::class,
            'Proveedor' => Proveedor::class
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
