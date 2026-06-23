<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable('nombre', 'logo', 'estado',)]
class Empresa extends Model
{
    protected $table = 'empresas';

    protected $casts = [
        'estado' => 'string',
    ];

    // Relaciones
    public function sucursales(): HasMany
    {
        return $this->hasMany(Sucursal::class);
    }

    public function detalleRegistros(): HasMany
    {
        return $this->hasMany(DetalleRegistro::class);
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
    public function getImagenUrlAttribute(): ?string
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
