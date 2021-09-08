<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\comentario;
use App\Models\megusta;

class ArticuloController extends Controller
{
    public function index()
    {
        return view('articulos.index',
            [
                'articulos' => Articulo::todos()
            ]
        );
    }

    public function show($titulo)
    {
        $comentarios = Comentario::with('invitado')->whereArticulo($titulo)->get();
        $megustas = MeGusta::with('invitado')->whereArticulo($titulo)->get();

        return view('components._articulos.' . $titulo, [
            'articulo' => Articulo::buscar($titulo),
            'comentarios' => $comentarios,
            'megustas' => $megustas,
        ]);
    }

}
