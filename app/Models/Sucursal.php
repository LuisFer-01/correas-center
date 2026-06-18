<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable('empresa_id', 'nombre', 'direccion', 'telefono', 'email', 'horarios', 'mapa_incrustado', 'latitud', 'longitud', 'es_principal', 'estado',)]
class Sucursal extends Model
{
    protected $casts = [
        'latitud' => 'decimal:8',
        'longitud' => 'decimal:8',
        'es_principal' => 'boolean',
        'estado' => 'string',
    ];

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
