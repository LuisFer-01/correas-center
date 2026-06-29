<?php

namespace App\Filament\Widgets;

use App\Models\Categoria;
use App\Models\Contacto;
use App\Models\Industria;
use App\Models\Producto;
use App\Models\Servicio;
use Filament\Widgets\Widget;

class EstadoSistemaWidget extends Widget
{
    protected static ?int $sort = 5;

    protected int | string | array $columnSpan = 'md';

    protected string $view = 'filament.widgets.estado-sistema-widget';

    /**
     * Control de visibilidad por rol (preparado para Shield)
     * public static function canView(): bool
     * {
     *     return auth()->user()->hasRole('admin');
     * }
     */
}
