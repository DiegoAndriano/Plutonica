<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Articulo extends Model
{
    public $titulo;
    public $tituloGuionado;
    public $cuerpo;
    public $descripcion;
    public $pinned;

    public function __construct($cuerpo, $titulo, $tituloGuionado,$pinned, $descripcion)
    {
        $this->cuerpo = $cuerpo;
        $this->pinned = $pinned;
        $this->titulo = $titulo;
        $this->tituloGuionado = $tituloGuionado;
        $this->descripcion = $descripcion;
    }


    public static function todos()
    {
        return collect(File::files(resource_path('views/components/_articulos')))
            ->map(function ($file) {
                return YamlFrontMatter::parseFile($file);
            })
            ->map(function ($doc) {
                return new Articulo(
                    $doc->body(),
                    $doc->titulo,
                    $doc->tituloGuionado,
                    $doc->pinned,
                    $doc->descripcion
                );
            })->sortByDesc('date');
    }

    public static function buscar($tituloGuionado)
    {
        return static::todos()->firstWhere('tituloGuionado', $tituloGuionado);
    }
}
