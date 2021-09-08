<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\megusta;
use App\Services\CrearInvitado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Sodium\increment;

class MegustaController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            'articulo' => 'required|string|in:' . Articulo::all()->pluck('tituloGuionado')->implode(','),
        ]);

        if (auth()->guest()) {
            $crearinvitado = new CrearInvitado();
            $crearinvitado->perform();
        }

        $mg = MeGusta::whereArticulo($attributes['articulo'])->whereInvitado_id(auth()->id())->first();

        if ($mg && $mg->cantidad < 10) {
            $mg->increment('cantidad', 1);
            return redirect('/articulos/' . $attributes['articulo']);
        }

        Megusta::create(
            [
                'articulo' => $attributes['articulo'],
                'invitado_id' => auth()->id(),
                'cantidad' => 1,
            ]
        );

        return redirect('/articulos/' . $attributes['articulo']);
    }
}
