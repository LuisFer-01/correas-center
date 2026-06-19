<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('nombre', 'empresa', 'telefono', 'email', 'mensaje', 'estado',)]
class Contacto extends Model
{
    protected $casts = [
        'estado' => 'string',
    ];

    // Scopes
    public function scopeNuevos($query)
    {
        return $query->where('estado', 'nuevo');
    }

    public function scopeRecientes($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
