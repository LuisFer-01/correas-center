<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('titulo', 'descripcion', 'stats', 'icon', 'orden', 'estado',)]
class CaracteristicaInfraestructura extends Model
{
    protected $table = 'caracteristicas_infraestructura';

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
