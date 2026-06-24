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
        'estado' => 'string',
    ];

    // EVENTO: Asignar orden automáticamente al crear
    protected static function booted(): void
    {
        static::creating(function (CapacidadInfraestructura $registro) {
            if (empty($registro->orden) || $registro->orden === 0) {
                $registro->orden = (self::max('orden') ?? 0) + 1;
            }
        });
    }

    public function scopeActivos($query)
    {
        return $query->where('estado', 'activo');
    }

    public function scopeOrdenados($query)
    {
        return $query->orderBy('orden', 'asc');
    }
}
