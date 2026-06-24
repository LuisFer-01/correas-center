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
        'estado' => 'string',
    ];

    // EVENTO: Asignar orden automáticamente al crear
    protected static function booted(): void
    {
        static::creating(function (CaracteristicaInfraestructura $registro) {
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
