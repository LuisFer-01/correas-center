<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('titulo', 'subtitulo', 'descripcion', 'icon', 'orden', 'estado',)]
class Diferencial extends Model
{
    protected $table = 'diferenciales';

    protected $casts = [
        'orden' => 'integer',
    ];

    public function scopeActivos($query)
    {
        return $query->where('estado', 'activo');
    }

    public function scopeOrdenados($query)
    {
        return $query->orderBy('orden', 'asc');
    }
}
