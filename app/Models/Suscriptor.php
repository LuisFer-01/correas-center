<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('email', 'nombre', 'estado', 'email_verificado_at')]
class Suscriptor extends Model
{
    protected $table = 'suscriptores';

    protected $casts = [
        'email_verificado_at' => 'datetime',
        'estado' => 'string',
    ];

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('estado', 'activo');
    }

    public function scopeRecientes($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
