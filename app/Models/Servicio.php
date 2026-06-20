<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable('nombre', 'descripcion', 'imagen', 'estado',)]
class Servicio extends Model
{
    protected $table = 'servicios';

    protected $casts = [
        'estado' => 'string',
    ];

    // Relaciones
    public function industrias(): BelongsToMany
    {
        return $this->belongsToMany(Industria::class, 'detalle_industrias', 'campo_id', 'industria_id')
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
}
