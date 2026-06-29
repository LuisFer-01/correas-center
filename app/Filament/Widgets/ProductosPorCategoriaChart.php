<?php

namespace App\Filament\Widgets;

use App\Models\Categoria;
use App\Models\Producto;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Str;

class ProductosPorCategoriaChart extends ChartWidget
{
    protected ?string $heading = 'Productos por Categoría';
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'md';

    /**
     * Control de visibilidad por rol (preparado para Shield)
     */
    public static function canView(): bool
    {
        return true;
    }

    protected function getData(): array
    {
        $productos = Producto::where('estado', 'activo')
            ->withCount('categorias')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Categorías por Producto',
                    'data' => $productos->pluck('categorias_count')->toArray(),
                    'backgroundColor' => [
                        'rgba(234, 10, 42, 0.8)',
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(16, 185, 129, 0.8)',
                        'rgba(245, 158, 11, 0.8)',
                        'rgba(139, 92, 246, 0.8)',
                        'rgba(236, 72, 153, 0.8)',
                        'rgba(20, 184, 166, 0.8)',
                        'rgba(249, 115, 22, 0.8)',
                        'rgba(99, 102, 241, 0.8)',
                        'rgba(34, 197, 94, 0.8)',
                        'rgba(168, 85, 247, 0.8)',
                        'rgba(239, 68, 68, 0.8)',
                        'rgba(14, 165, 233, 0.8)',
                        'rgba(251, 191, 36, 0.8)',
                        'rgba(107, 114, 128, 0.8)',
                    ],
                    'borderColor' => [
                        'rgba(234, 10, 42, 1)',
                        'rgba(59, 130, 246, 1)',
                        'rgba(16, 185, 129, 1)',
                        'rgba(245, 158, 11, 1)',
                        'rgba(139, 92, 246, 1)',
                        'rgba(236, 72, 153, 1)',
                        'rgba(20, 184, 166, 1)',
                        'rgba(249, 115, 22, 1)',
                        'rgba(99, 102, 241, 1)',
                        'rgba(34, 197, 94, 1)',
                        'rgba(168, 85, 247, 1)',
                        'rgba(239, 68, 68, 1)',
                        'rgba(14, 165, 233, 1)',
                        'rgba(251, 191, 36, 1)',
                        'rgba(107, 114, 128, 1)',
                    ],
                    'borderWidth' => 2,
                    'hoverOffset' => 10,
                ],
            ],
            'labels' => $productos->pluck('nombre')->map(fn($nombre) => Str::limit($nombre, 15))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut'; // ✅ Cambiado a doughnut chart
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'cutout' => '60%', // ✅ Agregar agujero en el centro (doughnut)
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
                    'labels' => [
                        'padding' => 15,
                        'font' => [
                            'size' => 11,
                        ],
                        'boxWidth' => 12,
                        'boxHeight' => 12,
                    ],
                ],
                'tooltip' => [
                    'callbacks' => [
                        'label' => 'function(context) {
                            return context.label + ": " + context.parsed + " categorías";
                        }',
                    ],
                ],
            ],
        ];
    }
}
