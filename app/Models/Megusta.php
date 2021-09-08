<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class megusta extends Model
{
    use HasFactory;

    protected $fillable = ['articulo', 'invitado_id', 'cantidad'];

    public function invitado()
    {
        return $this->belongsTo(Invitado::class);
    }
}
