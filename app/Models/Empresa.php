<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable('nombre', 'logo', 'estado',)]
class Empresa extends Model
{
    protected $table = 'empresas';

    protected $casts = [
        'estado' => 'string',
    ];

    // Relaciones
    public function sucursales(): HasMany
    {
        return $this->hasMany(Sucursal::class);
    }

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
