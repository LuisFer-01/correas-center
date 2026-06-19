<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use App\Models\Menu;
use App\Models\Producto;
use App\Models\Industria;
use App\Models\Servicio;
use App\Models\Sucursal;
use App\Models\Empresa;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        // Obtener empresa principal
        $empresa = Empresa::where('estado', 'activo')->first();

        // Obtener menús dinámicos agrupados por grupo
        $menus = Menu::with(['detalleMenus'])
            ->where('estado', 'activo')
            ->orderBy('id')
            ->get()
            ->groupBy('grupo');

        // Obtener productos con sus categorías
        $productos = Producto::with(['categorias' => function($query) {
            $query->where('estado', 'activo')->orderBy('orden');
        }])
        ->where('estado', 'activo')
        ->orderBy('orden')
        ->get();

        // Obtener industrias
        $industrias = Industria::where('estado', 'activo')
            ->orderBy('orden')
            ->get();

        // Obtener servicios
        $servicios = Servicio::where('estado', 'activo')
            ->get();

        // Obtener sucursales (principal primero)
        $sucursales = Sucursal::where('estado', 'activo')
            ->orderByDesc('es_principal')
            ->get();

        return [
            ...parent::share($request),
            'name' => config('app.name'),
            'auth' => [
                'user' => $request->user(),
            ],
            'sidebarOpen' => ! $request->hasCookie('sidebar_state') || $request->cookie('sidebar_state') === 'true',

            // Datos globales para todas las vistas
            'globals' => [
                'empresa' => $empresa,
                'menus' => $menus,
                'productos' => $productos,
                'industrias' => $industrias,
                'servicios' => $servicios,
                'sucursales' => $sucursales,
                'whatsapp' => [
                    'numero' => '59177306576',
                    'mensaje' => 'Hola, necesito información sobre sus productos y servicios',
                ],
            ],
            'flash' => [
                'success' => fn () => $request->session()->get('success'),
                'error' => fn () => $request->session()->get('error'),
            ],
        ];
    }
}
