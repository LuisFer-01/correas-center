<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable('empresa_id', 'registro_id', 'titulo', 'descripcion', 'icono', 'stats', 'subtitulo', 'orden', 'estado')]
class DetalleRegistro extends Model
{
    protected $table = 'detalle_registros';

    protected $casts = [
        'orden' => 'integer',
        'estado' => 'string',
    ];

    protected static function booted(): void
    {
        static::creating(function (DetalleRegistro $detalleRegistro) {
            // Si no se ha asignado un empresa_id, usar el valor por defecto (1)
            if (empty($detalleRegistro->empresa_id)) {
                $detalleRegistro->empresa_id = 1; // TODO: Cambiar por lógica dinámica más adelante
            }
        });

        static::creating(function (DetalleRegistro $registro) {
            if (empty($registro->orden) || $registro->orden === 0) {
                $registro->orden = (self::max('orden') ?? 0) + 1;
            }
        });
    }

    // Relaciones
    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }

    public function registro(): BelongsTo
    {
        return $this->belongsTo(Registro::class);
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('estado', 'activo');
    }

    public function scopeOrdenados($query)
    {
        return $query->orderBy('orden', 'asc');
    }
}
