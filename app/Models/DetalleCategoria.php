<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable('categoria_id', 'marca_id', 'gama_producto_id', 'caracteristica_id', 'medida_id', 'composicion_id', 'aplicacion_id', 'valor_personalizado', 'orden', 'estado',)]
class DetalleCategoria extends Model
{
    protected $table = 'detalle_categorias';

    protected $casts = [
        'valor_personalizado' => 'decimal:4',
        'orden' => 'integer',
        'estado' => 'string',
    ];

    // Relaciones
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function marca(): BelongsTo
    {
        return $this->belongsTo(Marca::class);
    }

    public function gamaProducto(): BelongsTo
    {
        return $this->belongsTo(GamaProducto::class);
    }

    public function caracteristica(): BelongsTo
    {
        return $this->belongsTo(Caracteristica::class);
    }

    public function medida(): BelongsTo
    {
        return $this->belongsTo(Medida::class);
    }

    public function composicion(): BelongsTo
    {
        return $this->belongsTo(Composicion::class);
    }

    public function aplicacion(): BelongsTo
    {
        return $this->belongsTo(Aplicacion::class);
    }

    // Accessor para obtener el valor final (personalizado o por defecto)
    public function getValorFinalAttribute(): ?float
    {
        if ($this->valor_personalizado !== null) {
            return $this->valor_personalizado;
        }

        return $this->medida?->magnitud;
    }

    // Accessor para obtener la medida completa con el valor final
    public function getMedidaCompletaFinalAttribute(): ?string
    {
        if (!$this->medida) {
            return null;
        }

        $tipo = $this->medida->tipoMedida;
        if (!$tipo) {
            return null;
        }

        $valor = $this->valor_final ?? '';
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
