<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable('menu_id', 'ruta', 'estado',)]
class DetalleMenu extends Model
{
    protected $table = 'detalle_menus';

    protected $casts = [
        'estado' => 'string',
    ];

    // Relaciones
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('estado', 'activo');
    }
}
