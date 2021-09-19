<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\megusta;
use Illuminate\Support\Str;

class MegustaController extends Controller
{
    public function generateKey()
    {
        $likes_key = Str::random(32);

        if(Megusta::whereLikes_key($likes_key)->first() !== null){
            $this->generateKey();
            return null;
        }
        return $likes_key;
    }

    public function store(Articulo $articulo)
    {
//        dd(request()->articulo);
////        //esto es un json en realidad
//        $attrs = request()->validate([
//            'articulo' => 'required|exists:articulos,id',
//        ]);
//dd("Hola");
        if (request()->session()->get("likes_key") === null) {
            $likes_key = $this->generateKey();
            request()->session()->put("likes_key", $likes_key);
            Megusta::create(
                [
                    'articulo_id' => request()->articulo->id,
                    'cantidad' => 1,
                    'likes_key' => $likes_key,
                ]
            );
            return "ok";
        }

        $mg = Megusta::whereLikes_key(request()->session()->get("likes_key"))->first();
        $cantidad = $mg->cantidad + 1;
        if($cantidad > 10){
            return "Máximo límite de likes alcanzado.";
        }

        $mg->update(['cantidad' => $cantidad]);
        return "ok";

    }
}
