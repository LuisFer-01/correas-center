<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable('nombre', 'slug', 'imagen', 'orden', 'estado',)]
class Industria extends Model
{
    protected $casts = [
        'orden' => 'integer',
        'estado' => 'string',
    ];

    // Relaciones
    public function detalleIndustrias(): HasMany
    {
        return $this->hasMany(DetalleIndustria::class);
    }

    // Obtener categorías asociadas
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'detalle_industrias', 'industria_id', 'campo_id')
                    ->wherePivot('grupo', 'Categoria');
    }

    // Obtener servicios asociados
    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'detalle_industrias', 'industria_id', 'campo_id')
                    ->wherePivot('grupo', 'Servicio');
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
