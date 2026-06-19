<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable('industria_id', 'grupo', 'campo_id', 'orden_id', 'estado',)]
class DetalleIndustria extends Model
{
    protected $table = 'detalle_industrias';

    // Relaciones
    protected $casts = [
        'orden' => 'integer',
        'estado' => 'string',
    ];

    public function industria(): BelongsTo
    {
        return $this->belongsTo(Industria::class);
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
