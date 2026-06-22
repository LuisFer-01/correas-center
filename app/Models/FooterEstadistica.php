<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterEstadistica extends Model
{
    protected $table = 'footer_estadisticas';

    protected $fillable = [
        'titulo',
        'subtitulo',
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
