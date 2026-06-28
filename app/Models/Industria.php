<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    // EVENTO: Asignar empresa_id y orden automáticamente al crear
    protected static function booted(): void
    {
        static::creating(function (Industria $industria) {
            if (empty($industria->empresa_id)) {
                $industria->empresa_id = 1; // TODO: Cambiar por lógica dinámica más adelante
            }

            if (empty($industria->orden) || $industria->orden === 0) {
                $industria->orden = (self::max('orden') ?? 0) + 1;
            }
        });
    }

    // Relaciones
    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }

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

    // MUTATOR: Limpia el prefijo 'storage/' antes de guardar en BD
    public function setImagenAttribute($value)
    {
        if ($value && str_starts_with($value, 'storage/')) {
            $value = substr($value, 8); // Quita 'storage/'
        }
        $this->attributes['imagen'] = $value;
    }

    // ACCESSOR: URL pública absoluta
    public function getImagenUrlAttribute(): ?string
    {
        if (!$this->imagen) {
            return null;
        }

        if (str_starts_with($this->imagen, 'http://') || str_starts_with($this->imagen, 'https://')) {
            return $this->imagen;
        }

        if (str_starts_with($this->imagen, '/storage/')) {
            return $this->imagen;
        }

        if (str_starts_with($this->imagen, 'storage/')) {
            return '/' . $this->imagen;
        }

        if (str_starts_with($this->imagen, '/')) {
            return '/storage' . $this->imagen;
        }

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
