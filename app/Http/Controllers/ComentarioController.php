<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    public function store()
    {
        $attrs = request()->validate([
            'articulo' => 'required|exists:articulos,id',
            'nombre' => 'required|string',
            'email' => 'nullable|email',
            'comentario' => 'required|string',
        ]);

        Articulo::whereId($attrs['articulo'])->first()->comentarios()->create([
            'nombre' => $attrs['nombre'],
            'email' => $attrs['email'],
            'comentario' => $attrs['comentario'],
        ]);

        return redirect(route('articulos.index', $attrs['articulo']));
    }

    public function destroy(Comentario $comentario)
    {
        if(request()->user()->cannot('destroy', $comentario)){
            abort(403);
        }
        $articulo_id = $comentario->articulo()->first()->id;

        $comentario->delete();

        return redirect(route('articulos.index', $articulo_id));
    }

}
