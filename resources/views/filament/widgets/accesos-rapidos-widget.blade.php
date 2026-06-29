<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            <div class="flex items-center gap-2">
                <x-heroicon-o-bolt class="w-5 h-5 text-primary-500" style="width: 1.25rem; height: 1.25rem;" />
                <span>Accesos Rápidos</span>
            </div>
        </x-slot>

        <x-slot name="description">
            Accede rápidamente a las secciones más utilizadas del panel
        </x-slot>

        {{-- ✅ GRID MEJORADO: Distribución uniforme con gap consistente --}}
        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">
            {{-- Productos --}}
            <a href="{{ \App\Filament\Resources\Productos\ProductoResource::getUrl('index') }}"
               class="group flex flex-col items-center gap-2 p-4 rounded-xl bg-gradient-to-br from-primary-50 to-primary-100 dark:from-primary-900/20 dark:to-primary-800/20 hover:shadow-lg transition-all hover:scale-105 border border-primary-200 dark:border-primary-800">
                <div class="w-12 h-12 rounded-full bg-primary-500 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <x-heroicon-o-cube class="w-6 h-6 text-white" style="width: 1.5rem; height: 1.5rem;" />
                </div>
                <span class="text-sm font-semibold text-gray-900 dark:text-white text-center">Productos</span>
                <span class="text-xs text-gray-500 dark:text-gray-400 text-center">
                    {{ \App\Models\Producto::where('estado', 'activo')->count() }} activos
                </span>
            </a>

            {{-- Categorías --}}
            <a href="{{ \App\Filament\Resources\Categorias\CategoriaResource::getUrl('index') }}"
               class="group flex flex-col items-center gap-2 p-4 rounded-xl bg-gradient-to-br from-success-50 to-success-100 dark:from-success-900/20 dark:to-success-800/20 hover:shadow-lg transition-all hover:scale-105 border border-success-200 dark:border-success-800">
                <div class="w-12 h-12 rounded-full bg-success-500 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <x-heroicon-o-tag class="w-6 h-6 text-white" style="width: 1.5rem; height: 1.5rem;" />
                </div>
                <span class="text-sm font-semibold text-gray-900 dark:text-white text-center">Categorías</span>
                <span class="text-xs text-gray-500 dark:text-gray-400 text-center">
                    {{ \App\Models\Categoria::where('estado', 'activo')->count() }} activas
                </span>
            </a>

            {{-- Industrias --}}
            <a href="{{ \App\Filament\Resources\Industrias\IndustriaResource::getUrl('index') }}"
               class="group flex flex-col items-center gap-2 p-4 rounded-xl bg-gradient-to-br from-info-50 to-info-100 dark:from-info-900/20 dark:to-info-800/20 hover:shadow-lg transition-all hover:scale-105 border border-info-200 dark:border-info-800">
                <div class="w-12 h-12 rounded-full bg-info-500 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <x-heroicon-o-building-office class="w-6 h-6 text-white" style="width: 1.5rem; height: 1.5rem;" />
                </div>
                <span class="text-sm font-semibold text-gray-900 dark:text-white text-center">Industrias</span>
                <span class="text-xs text-gray-500 dark:text-gray-400 text-center">
                    {{ \App\Models\Industria::where('estado', 'activo')->count() }} activas
                </span>
            </a>

            {{-- Servicios --}}
            <a href="{{ \App\Filament\Resources\Servicios\ServicioResource::getUrl('index') }}"
               class="group flex flex-col items-center gap-2 p-4 rounded-xl bg-gradient-to-br from-warning-50 to-warning-100 dark:from-warning-900/20 dark:to-warning-800/20 hover:shadow-lg transition-all hover:scale-105 border border-warning-200 dark:border-warning-800">
                <div class="w-12 h-12 rounded-full bg-warning-500 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <x-heroicon-o-wrench-screwdriver class="w-6 h-6 text-white" style="width: 1.5rem; height: 1.5rem;" />
                </div>
                <span class="text-sm font-semibold text-gray-900 dark:text-white text-center">Servicios</span>
                <span class="text-xs text-gray-500 dark:text-gray-400 text-center">
                    {{ \App\Models\Servicio::where('estado', 'activo')->count() }} activos
                </span>
            </a>

            {{-- Contactos --}}
            <a href="{{ \App\Filament\Resources\Contactos\ContactoResource::getUrl('index') }}"
               class="group relative flex flex-col items-center gap-2 p-4 rounded-xl bg-gradient-to-br from-danger-50 to-danger-100 dark:from-danger-900/20 dark:to-danger-800/20 hover:shadow-lg transition-all hover:scale-105 border border-danger-200 dark:border-danger-800">
                @if(\App\Models\Contacto::where('estado', 'nuevo')->count() > 0)
                    <span class="absolute top-2 right-2 bg-danger-500 text-white text-xs font-bold px-2 py-1 rounded-full animate-pulse">
                        {{ \App\Models\Contacto::where('estado', 'nuevo')->count() }}
                    </span>
                @endif
                <div class="w-12 h-12 rounded-full bg-danger-500 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <x-heroicon-o-envelope class="w-6 h-6 text-white" style="width: 1.5rem; height: 1.5rem;" />
                </div>
                <span class="text-sm font-semibold text-gray-900 dark:text-white text-center">Contactos</span>
                <span class="text-xs text-gray-500 dark:text-gray-400 text-center">
                    {{ \App\Models\Contacto::where('estado', 'nuevo')->count() }} nuevos
                </span>
            </a>

            {{-- Sucursales --}}
            <a href="{{ \App\Filament\Resources\Sucursals\SucursalResource::getUrl('index') }}"
               class="group flex flex-col items-center gap-2 p-4 rounded-xl bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900/20 dark:to-gray-800/20 hover:shadow-lg transition-all hover:scale-105 border border-gray-200 dark:border-gray-800">
                <div class="w-12 h-12 rounded-full bg-gray-500 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <x-heroicon-o-map-pin class="w-6 h-6 text-white" style="width: 1.5rem; height: 1.5rem;" />
                </div>
                <span class="text-sm font-semibold text-gray-900 dark:text-white text-center">Sucursales</span>
                <span class="text-xs text-gray-500 dark:text-gray-400 text-center">
                    {{ \App\Models\Sucursal::where('estado', 'activo')->count() }} activas
                </span>
            </a>

            {{-- Marcas --}}
            <a href="{{ \App\Filament\Resources\Marcas\MarcaResource::getUrl('index') }}"
               class="group flex flex-col items-center gap-2 p-4 rounded-xl bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 hover:shadow-lg transition-all hover:scale-105 border border-purple-200 dark:border-purple-800">
                <div class="w-12 h-12 rounded-full bg-purple-500 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <x-heroicon-o-star class="w-6 h-6 text-white" style="width: 1.5rem; height: 1.5rem;" />
                </div>
                <span class="text-sm font-semibold text-gray-900 dark:text-white text-center">Marcas</span>
                <span class="text-xs text-gray-500 dark:text-gray-400 text-center">
                    {{ \App\Models\Marca::where('estado', 'activo')->count() }} activas
                </span>
            </a>

            {{-- Empresa --}}
            <a href="{{ \App\Filament\Resources\Empresas\EmpresaResource::getUrl('index') }}"
               class="group flex flex-col items-center gap-2 p-4 rounded-xl bg-gradient-to-br from-pink-50 to-pink-100 dark:from-pink-900/20 dark:to-pink-800/20 hover:shadow-lg transition-all hover:scale-105 border border-pink-200 dark:border-pink-800">
                <div class="w-12 h-12 rounded-full bg-pink-500 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <x-heroicon-o-building-office-2 class="w-6 h-6 text-white" style="width: 1.5rem; height: 1.5rem;" />
                </div>
                <span class="text-sm font-semibold text-gray-900 dark:text-white text-center">Empresa</span>
                <span class="text-xs text-gray-500 dark:text-gray-400 text-center">Configuración general</span>
            </a>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
