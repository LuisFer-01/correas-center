<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable('nombre', 'slug', 'logo', 'estado',)]
class Marca extends Model
{
    protected $casts = [
        'estado' => 'string',
    ];

    // Relaciones
    public function detalleProductos(): HasMany
    {
        return $this->hasMany(DetalleProducto::class);
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'detalle_productos');
    }

    public function detalleCategorias(): HasMany
    {
        return $this->hasMany(DetalleCategoria::class);
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('estado', 'activo');
    }
}
