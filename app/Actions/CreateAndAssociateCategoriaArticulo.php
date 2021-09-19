<?php

namespace App\Actions;

use App\Models\Categoria;

class CreateAndAssociateCategoriaArticulo
{
    /**
     * Crea y asocia una categoria a un artículo
     *
     * @param $articulo
     */
    public static function handle($articulo){
        $cat = Categoria::create([
            'nombre' => request()->categoria,
        ]);

        $articulo->categoria()->associate($cat)->save();
    }
}
