<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Comentario;
use App\Services\CrearInvitado;

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

        if(auth()->guest()) {
            $crearinvitado = new CrearInvitado($attributes['nombre'], $attributes['email']);
            $crearinvitado->perform();
        }

        Comentario::create([
            'articulo' => $attributes['articulo'],
            'comentario' => $attributes['comentario'],
            'invitado_id' => auth()->id(),
        ]);

        //crear notificacion flash() que diga ¡Éxito! o algo asi lindo.
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
