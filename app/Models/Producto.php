<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable('empresa_id', 'nombre', 'slug', 'imagen', 'orden', 'estado',)]
class Producto extends Model
{
    protected $table = 'productos';

    protected $casts = [
        'orden' => 'integer',
        'estado' => 'string',
    ];

    // EVENTO: Asignar empresa_id y orden automáticamente al crear
    protected static function booted(): void
    {
        static::creating(function (Producto $producto) {
            if (empty($producto->empresa_id)) {
                $producto->empresa_id = 1; // TODO: Cambiar por lógica dinámica más adelante
            }

            if (empty($producto->orden) || $producto->orden === 0) {
                $producto->orden = (self::max('orden') ?? 0) + 1;
            }
        });
    }

    // Relaciones
    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }

    public function categorias(): HasMany
    {
        return $this->hasMany(Categoria::class);
    }

    public function detalleProductos(): HasMany
    {
        return $this->hasMany(DetalleProducto::class);
    }

    public function marcas(): BelongsToMany
    {
        return $this->belongsToMany(Marca::class, 'detalle_productos', 'producto_id', 'marca_id');
    }

    // MUTATOR: Limpia el prefijo 'storage/' antes de guardar en BD
    public function setImagenAttribute($value)
    {
        if ($value && str_starts_with($value, 'storage/')) {
            $value = substr($value, 8); // Quita 'storage/'
        }
        $this->attributes['imagen'] = $value;
    }

    // ACCESSOR: URL pública absoluta (para frontend, AdminPanelProvider, etc.)
    public function getImagenUrlAttribute(): ?string
    {
        if (!$this->imagen) {
            return null;
        }

        // Si es URL externa
        if (str_starts_with($this->imagen, 'http://') || str_starts_with($this->imagen, 'https://')) {
            return $this->imagen;
        }

        // Si ya empieza con /storage/
        if (str_starts_with($this->imagen, '/storage/')) {
            return $this->imagen;
        }

        // Si empieza con storage/ (sin /)
        if (str_starts_with($this->imagen, 'storage/')) {
            return '/' . $this->imagen;
        }

        // Si empieza con / pero no es /storage/
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
