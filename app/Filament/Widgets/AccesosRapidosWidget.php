<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\CategoriaResource;
use App\Filament\Resources\ContactoResource;
use App\Filament\Resources\IndustriaResource;
use App\Filament\Resources\ProductoResource;
use App\Filament\Resources\ServicioResource;
use App\Filament\Resources\SucursalResource;
use Filament\Widgets\Widget;

class AccesosRapidosWidget extends Widget
{
    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 'full';
    protected string $view = 'filament.widgets.accesos-rapidos-widget';

    /**
     * ✅ Control de visibilidad por permiso específico
     */
    public static function canView(): bool
    {
        return auth()->user()?->can('View:AccesosRapidosWidget') ?? false;
    }
}
