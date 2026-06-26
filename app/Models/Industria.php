<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable('empresa_id', 'nombre', 'slug', 'imagen', 'orden', 'estado',)]
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

    protected static function booted(): void
    {
        static::creating(function (Industria $registro) {
            if (empty($registro->empresa_id)) {
                $registro->empresa_id = 1; // TODO: Cambiar por lógica dinámica más adelante
            }

            if (empty($registro->orden) || $registro->orden === 0) {
                $registro->orden = (self::max('orden') ?? 0) + 1;
            }
        });
    }

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
