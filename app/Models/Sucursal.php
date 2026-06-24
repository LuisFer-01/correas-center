<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable('empresa_id', 'nombre', 'direccion', 'telefono', 'email', 'horarios', 'mapa_incrustado', 'latitud', 'longitud', 'es_principal', 'orden', 'estado',)]
class Sucursal extends Model
{
    protected $table = 'sucursales';

    protected $casts = [
        'latitud' => 'decimal:8',
        'longitud' => 'decimal:8',
        'es_principal' => 'boolean',
        'orden' => 'integer',
        'estado' => 'string',
    ];

    // EVENTO: Asignar orden automáticamente al crear
    protected static function booted(): void
    {
        // BOOT: Asignar automáticamente empresa_id al crear una sucursal
        /*
        * Por el momento se asigna el ID 1 por defecto.
        * Más adelante, este valor se obtendrá dinámicamente según el usuario autenticado
        * o la empresa seleccionada en el panel de administración.
        */
        static::creating(function (Sucursal $sucursal) {
            // Si no se ha asignado un empresa_id, usar el valor por defecto (1)
            if (empty($sucursal->empresa_id)) {
                $sucursal->empresa_id = 1; // TODO: Cambiar por lógica dinámica más adelante
            }
        });

        // Asignar orden automáticamente si no se define
        static::creating(function (Sucursal $sucursal) {
            if (empty($sucursal->orden) || $sucursal->orden === 0) {
                $sucursal->orden = (self::max('orden') ?? 0) + 1;
            }
        });
    }

    // Relaciones
    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('estado', 'activo');
    }

    public function scopePrincipal($query)
    {
        return $query->where('es_principal', true);
    }
}
