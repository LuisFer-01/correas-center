<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable('industria_id', 'grupo', 'campo_id', 'orden', 'estado',)]
class DetalleIndustria extends Model
{
    protected $table = 'detalle_industrias';

    protected $casts = [
        'orden' => 'integer',
        'estado' => 'string',
    ];

    // Relaciones
    public function industria(): BelongsTo
    {
        return $this->belongsTo(Industria::class);
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
