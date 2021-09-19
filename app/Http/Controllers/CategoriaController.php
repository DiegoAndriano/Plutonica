<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function update(Categoria $categoria)
    {
        if(request()->user()->cannot('update', $categoria)){
            abort(403);
        }

        $attrs = request()->validate([
            'nombre' => 'required|string|max:35'
        ]);

        $categoria->update($attrs)->save();

        return redirect(route('articulos.index'));
    }

    public function destroy(Categoria $categoria)
    {
        if(request()->user()->cannot('destroy', $categoria)){
            abort(403);
        }

        $categoria->delete();

        return redirect(route('articulos.index'));
    }
}
