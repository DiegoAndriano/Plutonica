<?php

namespace App\Actions;

class AssociateCategoriaArticulo
{
    /**
     * Asocia una categoría a un artículo
     *
     * @param $cat
     * @param $articulo
     */
    public static function handle($cat, $articulo){
        $articulo->categoria()->associate($cat->first())->save();
    }
}
