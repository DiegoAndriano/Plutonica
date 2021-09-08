<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
      'invitado_id',
      'comentario',
      'articulo',
    ];

    public function invitado()
    {
        return $this->belongsTo(Invitado::class);
    }

}
