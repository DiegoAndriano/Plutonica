<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\megusta;

class MegustaController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            'articulo' => 'required|string|in:' . Articulo::all()->pluck('tituloGuionado')->implode(','),
        ]);

//        $mg = MeGusta::whereArticulo($attributes['articulo'])->whereInvitado_id(auth()->id())->first();
//
//        if ($mg && $mg->cantidad < 10) {
//            $mg->increment('cantidad', 1);
//            return redirect('/articulos/' . $attributes['articulo']);
//        }

        Megusta::create(
            [
                'articulo' => $attributes['articulo'],
                'cantidad' => 1,
            ]
        );

        return redirect('/articulos/' . $attributes['articulo']);
    }
}
