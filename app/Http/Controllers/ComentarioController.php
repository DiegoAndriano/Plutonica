<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            'articulo' => 'required|string|in:' . Articulo::all()->pluck('tituloGuionado')->implode(','),
            'nombre' => 'required|string',
            'email' => 'nullable|email',
            'comentario' => 'required|string',
        ]);

        Comentario::create([
            'articulo' => $attributes['articulo'],
            'comentario' => $attributes['comentario'],
        ]);

        return redirect(request()->path());
    }

    public function update($slug, Comentario $comentario)
    {
        $this->authorize('update', $comentario);

        $attributes = request()->validate([
            'articulo' => 'required|string|in:' . Articulo::all()->pluck('tituloGuionado')->implode(','),
            'nombre' => 'required|string',
            'email' => 'nullable|email',
            'comentario' => 'required|string',
        ]);

        $comentario->update($attributes);

        return redirect(request()->path());
    }

    public function delete($slug, Comentario $comentario)
    {
        $this->authorize('update', $comentario);

        $comentario->delete();

        return redirect(request()->path());
    }

}
