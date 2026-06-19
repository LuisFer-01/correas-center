<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable('nombre', 'abreviatura', 'representacion', 'estado',)]
class TipoMedida extends Model
{
    protected $table = 'tipo_medidas';

    public function medidas(): HasMany
    {
        return $this->hasMany(Medida::class);
    }

    public function scopeActivos($query)
    {
        return $query->where('estado', 'activo');
    }
}
