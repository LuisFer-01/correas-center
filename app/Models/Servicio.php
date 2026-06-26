<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable('empresa_id', 'nombre', 'descripcion', 'imagen', 'orden', 'estado',)]
class Servicio extends Model
{
    protected $table = 'servicios';

    protected $casts = [
        'orden' => 'integer',
        'estado' => 'string',
    ];

    // EVENTO: Asignar orden automáticamente al crear
    protected static function booted(): void
    {
        static::creating(function (Servicio $servicio) {
            if (empty($servicio->empresa_id)) {
                $servicio->empresa_id = 1; // TODO: Cambiar por lógica dinámica más adelante
            }

            if (empty($servicio->orden) || $servicio->orden === 0) {
                $servicio->orden = (self::max('orden') ?? 0) + 1;
            }
        });
    }

    // Relaciones
    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }

    public function industrias(): BelongsToMany
    {
        return $this->belongsToMany(Industria::class, 'detalle_industrias', 'campo_id', 'industria_id')
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
