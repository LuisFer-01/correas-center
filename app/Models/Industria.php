<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable('nombre', 'slug', 'imagen', 'orden', 'estado',)]
class Industria extends Model
{
    protected $table = 'industrias';

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
    public function categorias(): BelongsToMany
    {
        return $this->belongsToMany(Categoria::class, 'detalle_industrias', 'industria_id', 'campo_id')
                    ->wherePivot('grupo', 'Categoria');
    }

    // Obtener servicios asociados
    public function servicios(): BelongsToMany
    {
        return $this->belongsToMany(Servicio::class, 'detalle_industrias', 'industria_id', 'campo_id')
                    ->wherePivot('grupo', 'Servicio');
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
