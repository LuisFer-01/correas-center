<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            <div class="flex items-center gap-2">
                <x-heroicon-o-chart-bar class="w-5 h-5 text-primary-500" style="width: 1.25rem; height: 1.25rem;" />
                <span>Estado del Sistema</span>
            </div>
        </x-slot>

        <x-slot name="description">
            Resumen general del contenido del sitio web
        </x-slot>

        <div class="space-y-4">
            {{-- Barra de progreso general --}}
            @php
                $totalProductos = App\Models\Producto::count();
                $productosActivos = App\Models\Producto::where('estado', 'activo')->count();
                $porcentajeProductos = $totalProductos > 0 ? round(($productosActivos / $totalProductos) * 100) : 0;
            @endphp

            <div>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Productos Activos</span>
                    <span class="text-sm font-bold text-primary-600">{{ $productosActivos }} / {{ $totalProductos }}</span>
                </div>
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                    <div class="bg-primary-500 h-2.5 rounded-full transition-all" style="width: {{ $porcentajeProductos }}%"></div>
                </div>
            </div>

            @php
                $totalCategorias = App\Models\Categoria::count();
                $categoriasActivas = App\Models\Categoria::where('estado', 'activo')->count();
                $porcentajeCategorias = $totalCategorias > 0 ? round(($categoriasActivas / $totalCategorias) * 100) : 0;
            @endphp

            <div>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Categorías Activas</span>
                    <span class="text-sm font-bold text-success-600">{{ $categoriasActivas }} / {{ $totalCategorias }}</span>
                </div>
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                    <div class="bg-success-500 h-2.5 rounded-full transition-all" style="width: {{ $porcentajeCategorias }}%"></div>
                </div>
            </div>

            @php
                $totalIndustrias = App\Models\Industria::count();
                $industriasActivas = App\Models\Industria::where('estado', 'activo')->count();
                $porcentajeIndustrias = $totalIndustrias > 0 ? round(($industriasActivas / $totalIndustrias) * 100) : 0;
            @endphp

            <div>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Industrias Activas</span>
                    <span class="text-sm font-bold text-info-600">{{ $industriasActivas }} / {{ $totalIndustrias }}</span>
                </div>
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                    <div class="bg-info-500 h-2.5 rounded-full transition-all" style="width: {{ $porcentajeIndustrias }}%"></div>
                </div>
            </div>

            @php
                $totalServicios = App\Models\Servicio::count();
                $serviciosActivos = App\Models\Servicio::where('estado', 'activo')->count();
                $porcentajeServicios = $totalServicios > 0 ? round(($serviciosActivos / $totalServicios) * 100) : 0;
            @endphp

            <div>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Servicios Activos</span>
                    <span class="text-sm font-bold text-warning-600">{{ $serviciosActivos }} / {{ $totalServicios }}</span>
                </div>
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                    <div class="bg-warning-500 h-2.5 rounded-full transition-all" style="width: {{ $porcentajeServicios }}%"></div>
                </div>
            </div>

            {{-- Alertas --}}
            @php
                $mensajesNuevos = App\Models\Contacto::where('estado', 'nuevo')->count();
                $productosSinCategorias = App\Models\Producto::where('estado', 'activo')
                    ->withCount('categorias')
                    ->having('categorias_count', '=', 0)
                    ->get()->count();
            @endphp

            @if($mensajesNuevos > 0 || $productosSinCategorias > 0)
                <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <h4 class="text-sm font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-2">
                        <x-heroicon-o-bell-alert class="w-5 h-5 text-danger-500" style="width: 1.25rem; height: 1.25rem;" />
                        Alertas Pendientes
                    </h4>
                    <div class="space-y-2">
                        @if($mensajesNuevos > 0)
                            <a href="{{ \App\Filament\Resources\Contactos\ContactoResource::getUrl('index') }}"
                               class="flex items-center gap-2 p-3 bg-danger-50 dark:bg-danger-900/20 rounded-lg hover:bg-danger-100 dark:hover:bg-danger-900/30 transition-colors">
                                <x-heroicon-o-envelope class="w-5 h-5 text-danger-500" style="width: 1.25rem; height: 1.25rem;" />
                                <span class="text-sm text-danger-700 dark:text-danger-300 font-medium">
                                    {{ $mensajesNuevos }} {{ $mensajesNuevos === 1 ? 'mensaje' : 'mensajes' }} sin leer
                                </span>
                                <x-heroicon-o-arrow-right class="w-4 h-4 text-danger-500 ml-auto" style="width: 1rem; height: 1rem;" />
                            </a>
                        @endif

                        @if($productosSinCategorias > 0)
                            <a href="{{ \App\Filament\Resources\Productos\ProductoResource::getUrl('index') }}"
                               class="flex items-center gap-2 p-3 bg-warning-50 dark:bg-warning-900/20 rounded-lg hover:bg-warning-100 dark:hover:bg-warning-900/30 transition-colors">
                                <x-heroicon-o-exclamation-triangle class="w-5 h-5 text-warning-500" style="width: 1.25rem; height: 1.25rem;" />
                                <span class="text-sm text-warning-700 dark:text-warning-300 font-medium">
                                    {{ $productosSinCategorias }} {{ $productosSinCategorias === 1 ? 'producto sin' : 'productos sin' }} categorías
                                </span>
                                <x-heroicon-o-arrow-right class="w-4 h-4 text-warning-500 ml-auto" style="width: 1rem; height: 1rem;" />
                            </a>
                        @endif
                    </div>
                </div>
            @else
                <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex items-center gap-2 p-3 bg-success-50 dark:bg-success-900/20 rounded-lg">
                        <x-heroicon-o-check-circle class="w-5 h-5 text-success-500" style="width: 1.25rem; height: 1.25rem;" />
                        <span class="text-sm text-success-700 dark:text-success-300 font-medium">
                            ¡Todo está al día! 🎉
                        </span>
                    </div>
                </div>
            @endif
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
