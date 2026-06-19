<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('nombre', 'icon', 'orden', 'estado',)]
class CapacidadInfraestructura extends Model
{
    protected $table = 'capacidades_infraestructura';

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
