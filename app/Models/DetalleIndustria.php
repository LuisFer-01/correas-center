<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable('industria_id', 'grupo', 'campo_id', 'estado',)]
class DetalleIndustria extends Model
{
    protected $table = 'detalle_industrias';

    protected $casts = [
        'estado' => 'string',
    ];

    // Relaciones
    public function industria(): BelongsTo
    {
        return $this->belongsTo(Industria::class);
    }

    // Relación polimórfica simplificada
    public function campo()
    {
        if ($this->grupo === 'Categoria') {
            return $this->belongsTo(Categoria::class, 'campo_id');
        } elseif ($this->grupo === 'Servicio') {
            return $this->belongsTo(Servicio::class, 'campo_id');
        }
        return null;
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('estado', 'activo');
    }
}
