<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable('empresa_id', 'tipo', 'campo_id', 'titulo', 'url', 'icono', 'orden', 'mostrar', 'estado',)]
class Footer extends Model
{
    protected $table = 'footers';

    protected $casts = [
        'mostrar' => 'boolean',
        'orden' => 'integer',
    ];

    // Relaciones
    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'campo_id');
    }

    public function industria()
    {
        return $this->belongsTo(Industria::class, 'campo_id');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'campo_id');
    }

    // Scopes
    public function scopeActivos($query)
    {
        return $query->where('estado', 'activo')->where('mostrar', true);
    }

    public function scopeOrdenados($query)
    {
        return $query->orderBy('orden', 'asc');
    }

    public function scopeTipo($query, string $tipo)
    {
        return $query->where('tipo', $tipo);
    }
}
