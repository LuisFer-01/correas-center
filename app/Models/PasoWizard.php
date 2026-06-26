<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('empresa_id', 'identificador', 'titulo', 'descripcion', 'fuente_datos', 'campo_filtro', 'orden', 'estado',)]
class PasoWizard extends Model
{
    protected $table = 'pasos_wizard';

    protected $casts = [
        'orden' => 'integer',
        'estado' => 'string',
    ];

    // EVENTO: Asignar orden automáticamente al crear
    protected static function booted(): void
    {
        static::creating(function (PasoWizard $paso) {
            if (empty($paso->empresa_id)) {
                $paso->empresa_id = 1; // TODO: Cambiar por lógica dinámica más adelante
            }

            if (empty($paso->orden) || $paso->orden === 0) {
                $paso->orden = (self::max('orden') ?? 0) + 1;
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
