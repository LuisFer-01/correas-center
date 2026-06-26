<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable('empresa_id', 'grupo', 'campo_id', 'ruta', 'icon', 'estado',)]
class Menu extends Model
{
    protected $table = 'menus';

    protected $casts = [
        'estado' => 'string',
    ];

    protected static function booted(): void
    {
        static::creating(function (Menu $registro) {
            if (empty($registro->empresa_id)) {
                $registro->empresa_id = 1; // TODO: Cambiar por lógica dinámica más adelante
            }

            if (empty($registro->orden) || $registro->orden === 0) {
                $registro->orden = (self::max('orden') ?? 0) + 1;
            }
        });
    }

    // Relaciones
    public function detalleMenus(): HasMany
    {
        return $this->hasMany(DetalleMenu::class);
    }

    // Relación dinámica según el grupo
    public function campo()
    {
        switch ($this->grupo) {
            case 'Producto':
                return $this->belongsTo(Producto::class, 'campo_id');
            case 'Aplicacion':
                return $this->belongsTo(Industria::class, 'campo_id');
            case 'Servicio':
                return $this->belongsTo(Servicio::class, 'campo_id');
            default:
                return null;
        }
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('estado', 'activo');
    }
}
