<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterPorqueElegirnos extends Model
{
    protected $table = 'footer_porque_elegirnos';

    protected $fillable = [
        'titulo',
        'descripcion',
        'icono',
        'orden',
        'mostrar',
        'estado',
    ];

    protected $casts = [
        'mostrar' => 'boolean',
        'orden' => 'integer',
    ];

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('estado', 'activo')->where('mostrar', true);
    }

    public function scopeOrdenados($query)
    {
        return $query->orderBy('orden', 'asc');
    }
}
