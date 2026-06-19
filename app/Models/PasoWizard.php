<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('identificador', 'titulo', 'descripcion', 'fuente_datos', 'campo_filtro', 'orden', 'estado',)]
class PasoWizard extends Model
{
    protected $table = 'pasos_wizard';

    protected $casts = [
        'orden' => 'integer',
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
