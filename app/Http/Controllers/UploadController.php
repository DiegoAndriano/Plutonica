<?php

namespace App\Http\Controllers;

use App\Models\Articulo;

class UploadController extends Controller
{
    public function store()
    {
        if (request()->user()->cannot('create', Articulo::class)) {
            abort(403);
        }

        $attrs = request()->validate([
            'imagen' => 'image|max:2560',
        ]);

        $path = request()->file('imagen')->store('images');

        return $path;
    }
}
