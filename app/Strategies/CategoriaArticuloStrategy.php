<?php

namespace App\Strategies;

use App\Actions\AssociateCategoriaArticulo;
use App\Actions\CreateAndAssociateCategoriaArticulo;
use App\Models\Articulo;

class CategoriaArticuloStrategy
{
    /**
     * Crea o asocia una categoria a un articulo
     *
     * @param $cat
     * @param Articulo $articulo
     */
    public static function handle($cat, Articulo $articulo){
        $cat->exists() ? AssociateCategoriaArticulo::handle($cat, $articulo): CreateAndAssociateCategoriaArticulo::handle($articulo);
    }
}
