<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'articulo',
        'fecha_publicacion',
        'publicado',
        'fijado',
    ];

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function megustas()
    {
        return $this->hasMany(Megusta::class);
    }
}
