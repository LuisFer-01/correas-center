<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('imagen', 'titulo', 'subtitulo', 'badge_text', 'cta_primary_text', 'cta_primary_href', 'cta_secondary_text', 'cta_secondary_href', 'orden', 'estado',)]
class Hero extends Model
{
    protected $table = 'heroes';

    protected $casts = [
        'orden' => 'integer',
        'estado' => 'string',
    ];

    // MUTATOR: Limpia la ruta antes de guardar
    public function setImagenAttribute($value)
    {
        // Si viene con /storage/ al inicio, lo quitamos para guardar solo el path relativo
        if ($value && str_starts_with($value, '/storage/')) {
            $value = substr($value, 9); // Quita '/storage/'
        }

        $this->attributes['imagen'] = $value;
    }

    // ACCESSOR: URL absoluta de la imagen
    public function getImagenUrlAttribute(): ?string
    {
        if (!$this->imagen) {
            return null;
        }

        // Si es URL externa, devolver tal cual
        if (str_starts_with($this->imagen, 'http://') || str_starts_with($this->imagen, 'https://')) {
            return $this->imagen;
        }

        // Si ya empieza con /storage/, devolver tal cual
        if (str_starts_with($this->imagen, '/storage/')) {
            return $this->imagen;
        }

        // Si empieza con storage/ (sin /), agregar / al inicio
        if (str_starts_with($this->imagen, 'storage/')) {
            return '/' . $this->imagen;
        }

        // Si empieza con / pero no es /storage/, agregar storage/
        if (str_starts_with($this->imagen, '/')) {
            return '/storage' . $this->imagen;
        }

        // Caso normal: agregar /storage/ al inicio
        return '/storage/' . $this->imagen;
    }


    public function scopeActivos($query)
    {
        return $query->where('estado', 'activo');
    }

    public function scopeOrdenados($query)
    {
        return $query->orderBy('orden', 'asc');
    }
}
