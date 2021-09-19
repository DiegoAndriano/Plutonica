<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\comentario;
use App\Models\megusta;
use App\Strategies\CategoriaArticuloStrategy;
use Tests\Feature\CategoriaTest;

class ArticuloController extends Controller
{
    public function index()
    {
        $articulos = Articulo::with('comentarios')->get();

        return view('articulos.index', compact('articulos'));
    }

    public function store()
    {
        if (request()->user()->cannot('create', Articulo::class)) {
            abort(403);
        }

        $attrs = request()->validate([
            'titulo' => 'required|max:255|min:3',
            'descripcion' => 'required|max:255|min:3',
            'articulo' => 'required',
            'fecha_publicacion' => 'nullable|date',
            'publicado' => 'required|boolean',
            'fijado' => 'required|boolean',
            'categoria' => 'nullable|max:35',
        ]);

        $articulo = Articulo::create([
            'titulo' => $attrs['titulo'],
            'descripcion' => $attrs['descripcion'],
            'articulo' => $attrs['articulo'],
            'fecha_publicacion' => $attrs['fecha_publicacion'],
            'publicado' => $attrs['publicado'],
            'fijado' => $attrs['fijado'],
        ]);
        
        $attrs['categoria'] !== null ? CategoriaArticuloStrategy::handle(Categoria::whereNombre($attrs['categoria']), $articulo) : '';

        return redirect(route('articulos.index'));
    }


    public function create()
    {
        if (request()->user()->cannot('create', Articulo::class)) {
            abort(403);
        }

        return view('articulos.create');
    }

    public function update(Articulo $articulo)
    {
        if (request()->user()->cannot('update', Articulo::class)) {
            abort(403);
        }

        $attrs = request()->validate([
            'titulo' => 'required|max:255|min:3',
            'descripcion' => 'required|max:255|min:3',
            'articulo' => 'required',
            'fecha_publicacion' => 'nullable|date',
            'publicado' => 'required|boolean',
            'fijado' => 'required|boolean',
            'categoria' => 'nullable|max:35',
        ]);

        $attrs['categoria'] !== null ? CategoriaArticuloStrategy::handle(Categoria::whereNombre($attrs['categoria']), $articulo) : '';


        $articulo->update([
            'titulo' => $attrs['titulo'],
            'descripcion' => $attrs['descripcion'],
            'articulo' => $attrs['articulo'],
            'fecha_publicacion' => $attrs['fecha_publicacion'],
            'publicado' => $attrs['publicado'],
            'fijado' => $attrs['fijado'],
        ]);

        return redirect(route('articulos.index'));
    }

    public function edit()
    {
        if (request()->user()->cannot('update', Articulo::class)) {
            abort(403);
        }

        return view('articulos.edit');
    }

    public function destroy(Articulo $articulo)
    {
        if (request()->user()->cannot('destroy', Articulo::class)) {
            abort(403);
        }

        $articulo->delete();

        return redirect(route('articulos.index'));
    }

    public function show(Articulo $articulo)
    {
        return view('articulos.show', compact($articulo));
    }

}
