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

        return redirect(request()->path());
    }

    public function destroy(Comentario $comentario)
    {
        $this->authorize('destroy', $comentario);
        $comentario->delete();

        return redirect(request()->path());
    }

}
