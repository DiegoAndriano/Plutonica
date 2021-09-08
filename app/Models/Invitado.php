<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Invitado extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'email',
        'passcode',
    ];

    public function me_gustas()
    {
        return $this->hasMany(MeGusta::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
