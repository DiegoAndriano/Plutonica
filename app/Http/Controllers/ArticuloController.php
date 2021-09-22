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
            'portada' => 'required',
            'fecha_publicacion' => 'nullable|date',
            'fijado' => 'required|boolean',
            'categoria' => 'nullable|max:35',
            'megusta' => 'numeric|required',
        ]);

        $articulo = Articulo::create([
            'titulo' => $attrs['titulo'],
            'descripcion' => $attrs['descripcion'],
            'articulo' => $attrs['articulo'],
            'fecha_publicacion' => $attrs['fecha_publicacion'],
            'fijado' => $attrs['fijado'],
            'portada' => $attrs['portada'],
        ]);

        //todo: Hay una forma mejor de hacer esto?
        $attrs['categoria'] !== null ? CategoriaArticuloStrategy::handle(Categoria::whereNombre($attrs['categoria']), $articulo) : '';

        Megusta::create([
            'articulo_id' => $articulo->id,
            'cantidad' => $attrs['megusta'],
            'likes_key' => 1000001,
        ]);

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
            'fijado' => 'required|boolean',
            'categoria' => 'nullable|max:35',
            'portada' => 'required',
        ]);

        //todo: Hay una forma mejor de hacer esto?
        $attrs['categoria'] !== null ? CategoriaArticuloStrategy::handle(Categoria::whereNombre($attrs['categoria']), $articulo) : '';

        $articulo->update([
            'titulo' => $attrs['titulo'],
            'descripcion' => $attrs['descripcion'],
            'articulo' => $attrs['articulo'],
            'fecha_publicacion' => $attrs['fecha_publicacion'],
            'fijado' => $attrs['fijado'],
            'portada' => $attrs['portada'],
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
        //todo: Borrar imagen de portada.
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
