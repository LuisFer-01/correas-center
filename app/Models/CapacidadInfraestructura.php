<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('empresa_id', 'nombre', 'icon', 'orden', 'estado',)]
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
            if (empty($registro->empresa_id)) {
                $registro->empresa_id = 1; // TODO: Cambiar por lógica dinámica más adelante
            }

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
