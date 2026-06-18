<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('nombre', 'descripcion', 'estado',)]
class Servicio extends Model
{
    protected $casts = [
        'estado' => 'string',
    ];

    // Relaciones
    public function industrias()
    {
        return $this->belongsToMany(Industria::class, 'detalle_industrias', 'campo_id', 'industria_id')
                    ->wherePivot('grupo', 'Servicio');
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('estado', 'activo');
    }
}
