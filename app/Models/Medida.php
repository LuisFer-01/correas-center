<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable('tipo_medida_id', 'nombre', 'magnitud', 'orden', 'estado',)]
class Medida extends Model
{
    protected $table = 'medidas';

    protected $casts = [
        'magnitud' => 'decimal:4',
        'orden' => 'integer',
        'estado' => 'string',
    ];

    // EVENTO: Asignar orden automáticamente al crear
    protected static function booted(): void
    {
        static::creating(function (Medida $medida) {
            if (empty($medida->orden) || $medida->orden === 0) {
                $medida->orden = (self::max('orden') ?? 0) + 1;
            }
        });
    }

    // Relaciones
    public function tipoMedida(): BelongsTo
    {
        return $this->belongsTo(TipoMedida::class);
    }

    public function detalleCategorias(): HasMany
    {
        return $this->hasMany(DetalleCategoria::class);
    }

    // Accessors
    public function getMedidaCompletaAttribute(): string
    {
        $tipo = $this->tipoMedida;
        if (!$tipo) return '';

        $valor = $this->magnitud ?? '';
        return trim("{$valor} {$tipo->representacion}");
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
