<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable('nombre', 'slug', 'logo', 'orden', 'estado',)]
class Marca extends Model
{
    protected $table = 'marcas';

    protected $casts = [
        'orden' => 'integer',
        'estado' => 'string',
    ];

    // EVENTO: Asignar orden automáticamente al crear
    protected static function booted(): void
    {
        static::creating(function (Marca $marca) {
            // Solo asignar automáticamente si el orden no fue definido o es 0
            if (empty($marca->orden) || $marca->orden === 0) {
                $marca->orden = (self::max('orden') ?? 0) + 1;
            }
        });
    }

    // Relaciones
    public function detalleProductos(): HasMany
    {
        return $this->hasMany(DetalleProducto::class);
    }

    public function productos(): BelongsToMany
    {
        return $this->belongsToMany(Producto::class, 'detalle_productos');
    }

    // MUTATOR: Limpia el prefijo 'storage/' antes de guardar en BD
    public function setLogoAttribute($value)
    {
        if ($value && str_starts_with($value, 'storage/')) {
            $value = substr($value, 8); // Quita 'storage/'
        }
        $this->attributes['logo'] = $value;
    }

    // ACCESSOR: URL pública absoluta (para frontend, AdminPanelProvider, etc.)
    public function getLogoUrlAttribute(): ?string
    {
        if (!$this->logo) {
            return null;
        }

        // Si es URL externa
        if (str_starts_with($this->logo, 'http://') || str_starts_with($this->logo, 'https://')) {
            return $this->logo;
        }

        // Si ya empieza con /storage/
        if (str_starts_with($this->logo, '/storage/')) {
            return $this->logo;
        }

        // Si empieza con storage/ (sin /)
        if (str_starts_with($this->logo, 'storage/')) {
            return '/' . $this->logo;
        }

        // Si empieza con / pero no es /storage/
        if (str_starts_with($this->logo, '/')) {
            return '/storage' . $this->logo;
        }

        // Caso normal: agregar /storage/ al inicio
        return '/storage/' . $this->logo;
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('estado', 'activo');
    }
}
