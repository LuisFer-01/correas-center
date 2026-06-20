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

    // ACCESSOR: URL absoluta de la imagen
    public function getImagenUrlAttribute(): ?string
    {
        if (!$this->imagen) {
            return null;
        }

        // Si ya es una URL absoluta (http/https), devolverla tal cual
        if (str_starts_with($this->imagen, 'http://') || str_starts_with($this->imagen, 'https://')) {
            return $this->imagen;
        }

        // Si ya empieza con /, devolverla tal cual
        if (str_starts_with($this->imagen, '/')) {
            return $this->imagen;
        }

        // Si empieza con storage/, agregar / al inicio
        if (str_starts_with($this->imagen, 'storage/')) {
            return '/' . $this->imagen;
        }

        // Cualquier otro caso, agregar / al inicio
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
