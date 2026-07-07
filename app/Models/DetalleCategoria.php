<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable('categoria_id', 'caracteristica_id', 'medida_id', 'composicion_id', 'aplicacion_id', 'orden', 'estado')]
class DetalleCategoria extends Model
{
    protected $table = 'detalle_categorias';

    protected $casts = [
        'orden' => 'integer',
        'estado' => 'string',
    ];

    // Relaciones
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
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
