<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable('producto_id', 'nombre', 'slug', 'imagen', 'descripcion', 'descripcion_corta', 'uso', 'orden', 'estado',)]
class Categoria extends Model
{
    protected $table = 'categorias';

    protected $casts = [
        'orden' => 'integer',
        'estado' => 'string',
    ];

    // Relaciones
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }

    public function detalleCategorias(): HasMany
    {
        return $this->hasMany(DetalleCategoria::class);
    }

    // Relación con marcas a través de detalle_categorias
    public function marcas()
    {
        return $this->belongsToMany(Marca::class, 'detalle_categorias')
                    ->where('marcas.estado', 'activo')
                    ->where('detalle_categorias.estado', 'activo');
    }

    // ACCESSOR: URL absoluta de la imagen
    public function getImagenUrlAttribute(): ?string
    {
        if (!$this->imagen) {
            return null;
        }

        if (str_starts_with($this->imagen, 'http://') || str_starts_with($this->imagen, 'https://')) {
            return $this->imagen;
        }

        if (str_starts_with($this->imagen, '/')) {
            return $this->imagen;
        }

        if (str_starts_with($this->imagen, 'storage/')) {
            return '/' . $this->imagen;
        }

        return '/' . $this->imagen;
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
