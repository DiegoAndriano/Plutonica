<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Megusta extends Model
{
    use HasFactory;

    protected $fillable = ['articulo', 'invitado_id', 'cantidad'];

}
