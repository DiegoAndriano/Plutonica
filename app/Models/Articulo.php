<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function megustas()
    {
        return $this->hasMany(Megusta::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
