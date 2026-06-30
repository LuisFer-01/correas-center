<?php

namespace App\Filament\Widgets;

use App\Models\Categoria;
use App\Models\Contacto;
use App\Models\Industria;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\Sucursal;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    /**
     * ✅ Control de visibilidad por permiso específico
     */
    public static function canView(): bool
    {
        return auth()->user()?->can('View:StatsOverview') ?? false;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Productos Activos', Producto::where('estado', 'activo')->count())
                ->description('Total de productos en el catálogo')
                ->descriptionIcon('heroicon-o-cube')
                ->color('primary')
                ->chart([
                    Producto::where('estado', 'activo')->count(),
                    Producto::where('estado', 'activo')->count(),
                    Producto::where('estado', 'activo')->count(),
                ]),

            Stat::make('Categorías', Categoria::where('estado', 'activo')->count())
                ->description('Categorías activas')
                ->descriptionIcon('heroicon-o-tag')
                ->color('success'),

            Stat::make('Industrias', Industria::where('estado', 'activo')->count())
                ->description('Sectores atendidos')
                ->descriptionIcon('heroicon-o-building-office')
                ->color('info'),

            Stat::make('Servicios', Servicio::where('estado', 'activo')->count())
                ->description('Servicios disponibles')
                ->descriptionIcon('heroicon-o-wrench-screwdriver')
                ->color('warning'),

            Stat::make('Mensajes Nuevos', Contacto::where('estado', 'nuevo')->count())
                ->description('Mensajes sin leer')
                ->descriptionIcon('heroicon-o-envelope')
                ->color(Contacto::where('estado', 'nuevo')->count() > 0 ? 'danger' : 'success')
                ->url(route('filament.admin.resources.contactos.index')),

            Stat::make('Sucursales', Sucursal::where('estado', 'activo')->count())
                ->description('Sucursales activas')
                ->descriptionIcon('heroicon-o-map-pin')
                ->color('gray'),
        ];
    }
}
