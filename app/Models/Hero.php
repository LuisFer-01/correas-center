<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('imagen', 'titulo', 'subtitulo', 'badge_text', 'cta_primary_text', 'cta_primary_href', 'cta_secondary_text', 'cta_secondary_href', 'orden', 'estado',)]
class Hero extends Model
{
    protected $table = 'heroes';

    protected $casts = [
        'orden' => 'integer',
        'estado' => 'string',
    ];

    public function scopeActivos($query)
    {
        return $query->where('estado', 'activo');
    }

    public function scopeOrdenados($query)
    {
        return $query->orderBy('orden', 'asc');
    }
}
