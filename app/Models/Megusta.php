<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Megusta extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }
}
