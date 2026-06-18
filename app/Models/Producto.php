<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable('nombre', 'slug', 'imagen', 'orden', 'estado',)]
class Producto extends Model
{
    protected $casts = [
        'orden' => 'integer',
        'estado' => 'string',
    ];

    // Relaciones
    public function categorias(): HasMany
    {
        return $this->hasMany(Categoria::class);
    }

    public function detalleProductos(): HasMany
    {
        return $this->hasMany(DetalleProducto::class);
    }

    public function marcas()
    {
        return $this->belongsToMany(Marca::class, 'detalle_productos');
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
