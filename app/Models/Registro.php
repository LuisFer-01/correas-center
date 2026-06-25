<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable('identificador', 'nombre', 'descripcion', 'orden', 'estado')]
class Registro extends Model
{
    protected $table = 'registros';

    protected $casts = [
        'orden' => 'integer',
        'estado' => 'string',
    ];

    // Relaciones
    public function detalleRegistros(): HasMany
    {
        return $this->hasMany(DetalleRegistro::class);
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('estado', 'activo');
    }
}
