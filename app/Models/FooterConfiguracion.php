<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterConfiguracion extends Model
{
    protected $table = 'footer_configuracions';

    protected $fillable = [
        'tipo',
        'campo_id',
        'titulo',
        'url',
        'icono',
        'orden',
        'mostrar',
        'estado',
    ];

    protected $casts = [
        'mostrar' => 'boolean',
        'orden' => 'integer',
    ];

    // Relaciones
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
}
