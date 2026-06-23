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
use App\Models\Hero;
use App\Models\Diferencial;
use App\Models\CaracteristicaInfraestructura;
use App\Models\CapacidadInfraestructura;
use App\Models\PasoWizard;
use App\Models\Marca;
use App\Models\FooterConfiguracion;
use App\Models\FooterPorqueElegirnos;
use App\Models\FooterEstadistica;
use App\Models\Registro;
use App\Models\DetalleRegistro;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        $empresa = Empresa::where('estado', 'activo')->first();

        // NUEVO: Cargar registros (Visión, Misión, Valores) para About
        $registros = [];
        if ($empresa) {
            $registros = DetalleRegistro::with(['registro' => function($query) {
                    $query->where('estado', 'activo');
                }])
                ->where('empresa_id', $empresa->id)
                ->where('estado', 'activo')
                ->orderBy('orden')
                ->get()
                ->map(function ($detalle) {
                    return [
                        'id' => $detalle->id,
                        'grupo' => $detalle->grupo,
                        'orden' => $detalle->orden,
                        'registro' => $detalle->registro ? [
                            'id' => $detalle->registro->id,
                            'nombre' => $detalle->registro->nombre,
                            'descripcion' => $detalle->registro->descripcion,
                        ] : null,
                    ];
                })
                ->toArray();
        }

        $menus = Menu::with(['detalleMenus'])
            ->where('estado', 'activo')
            ->orderBy('id')
            ->get()
            ->groupBy('grupo');

        $productos = Producto::with([
            'categorias' => function($query) {
                $query->where('categorias.estado', 'activo')
                    ->orderBy('categorias.orden');
            },
            'marcas' => function($query) {
                $query->where('marcas.estado', 'activo');
            }
        ])
        ->where('estado', 'activo')
        ->orderBy('orden')
        ->get()
        ->map(function ($producto) {
            $primeraCategoria = $producto->categorias->first();
            return [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'slug' => $producto->slug,
                'imagen' => $producto->imagen_url,
                'orden' => $producto->orden,
                'categorias' => $producto->categorias->map(function ($categoria) {
                    return [
                        'id' => $categoria->id,
                        'nombre' => $categoria->nombre,
                        'slug' => $categoria->slug,
                        'imagen' => $categoria->imagen_url,
                        'uso' => $categoria->uso,
                        'descripcion_corta' => $categoria->descripcion_corta,
                        'descripcion' => $categoria->descripcion,
                    ];
                }),
                'marcas' => $producto->marcas->map(function ($marca) {
                    return [
                        'id' => $marca->id,
                        'nombre' => $marca->nombre,
                        'logo' => $marca->logo_url,
                    ];
                }),
                'uso' => $primeraCategoria?->uso ?? '',
                'descripcion_corta' => $primeraCategoria?->descripcion_corta ?? '',
            ];
        });

        $productosPopulares = Producto::with(['marcas' => function($query) {
                $query->where('marcas.estado', 'activo');
            }])
            ->where('estado', 'activo')
            ->orderBy('orden')
            ->limit(5)
            ->get()
            ->map(function ($producto) {
                return [
                    'id' => $producto->id,
                    'nombre' => $producto->nombre,
                    'slug' => $producto->slug,
                ];
            });

        $todasLasMarcas = Marca::where('estado', 'activo')
            ->orderBy('nombre')
            ->get()
            ->map(function ($marca) {
                return [
                    'id' => $marca->id,
                    'nombre' => $marca->nombre,
                    'logo' => $marca->logo_url,
                ];
            });

        $industrias = Industria::where('estado', 'activo')
            ->orderBy('orden')
            ->get()
            ->map(function ($industria) {
                return [
                    'id' => $industria->id,
                    'nombre' => $industria->nombre,
                    'slug' => $industria->slug,
                    'imagen' => $industria->imagen_url,
                    'orden' => $industria->orden,
                ];
            });

        $servicios = Servicio::where('estado', 'activo')
            ->orderBy('nombre')
            ->get()
            ->map(function ($servicio) {
                return [
                    'id' => $servicio->id,
                    'nombre' => $servicio->nombre,
                    'descripcion' => $servicio->descripcion,
                    'imagen' => $servicio->imagen_url,
                ];
            });

        $sucursales = Sucursal::where('estado', 'activo')
            ->orderByDesc('es_principal')
            ->orderBy('nombre')
            ->get()
            ->map(function ($sucursal) {
                return [
                    'id' => $sucursal->id,
                    'nombre' => $sucursal->nombre,
                    'direccion' => $sucursal->direccion,
                    'telefono' => $sucursal->telefono,
                    'email' => $sucursal->email,
                    'horarios' => $sucursal->horarios,
                    'mapa_incrustado' => $sucursal->mapa_incrustado,
                    'latitud' => $sucursal->latitud,
                    'longitud' => $sucursal->longitud,
                    'es_principal' => $sucursal->es_principal,
                    'whatsapp' => preg_replace('/[^0-9]/', '', $sucursal->telefono),
                ];
            });

        $heroes = Hero::where('estado', 'activo')
            ->orderBy('orden')
            ->get()
            ->map(function ($hero) {
                return [
                    'id' => $hero->id,
                    'imagen' => $hero->imagen_url,
                    'titulo' => $hero->titulo,
                    'subtitulo' => $hero->subtitulo,
                    'badge_text' => $hero->badge_text,
                    'cta_primary_text' => $hero->cta_primary_text,
                    'cta_primary_href' => $hero->cta_primary_href,
                    'cta_secondary_text' => $hero->cta_secondary_text,
                    'cta_secondary_href' => $hero->cta_secondary_href,
                ];
            });

        $diferenciales = Diferencial::activos()->ordenados()->get();
        $caracteristicasInfraestructura = CaracteristicaInfraestructura::activos()->ordenados()->get();
        $capacidadesInfraestructura = CapacidadInfraestructura::activos()->ordenados()->get();
        $pasosWizard = PasoWizard::activos()->ordenados()->get();

        $footerProductos = FooterConfiguracion::where('tipo', 'producto')
            ->activos()
            ->ordenados()
            ->with('producto')
            ->get();

        $footerIndustrias = FooterConfiguracion::where('tipo', 'industria')
            ->activos()
            ->ordenados()
            ->with('industria')
            ->get();

        $footerServicios = FooterConfiguracion::where('tipo', 'servicio')
            ->activos()
            ->ordenados()
            ->with('servicio')
            ->get();

        $footerRedesSociales = FooterConfiguracion::where('tipo', 'red_social')
            ->activos()
            ->ordenados()
            ->get();

        $footerPorqueElegirnos = FooterPorqueElegirnos::activos()->ordenados()->get();
        $footerEstadisticas = FooterEstadistica::activos()->ordenados()->get();

        return [
            ...parent::share($request),
            'name' => config('app.name'),
            'auth' => [
                'user' => $request->user(),
            ],
            'sidebarOpen' => ! $request->hasCookie('sidebar_state') || $request->cookie('sidebar_state') === 'true',
            'flash' => [
                'success' => fn () => $request->session()->get('success'),
                'error' => fn () => $request->session()->get('error'),
            ],
            'globals' => [
                'empresa' => $empresa,
                'menus' => $menus,
                'productos' => $productos,
                'productos_populares' => $productosPopulares,
                'marcas' => $todasLasMarcas,
                'industrias' => $industrias,
                'servicios' => $servicios,
                'sucursales' => $sucursales,
                'heroes' => $heroes,
                'diferenciales' => $diferenciales,
                'caracteristicas_infraestructura' => $caracteristicasInfraestructura,
                'capacidades_infraestructura' => $capacidadesInfraestructura,
                'pasos_wizard' => $pasosWizard,
                'footer_productos' => $footerProductos,
                'footer_industrias' => $footerIndustrias,
                'footer_servicios' => $footerServicios,
                'footer_redes_sociales' => $footerRedesSociales,
                'footer_porque_elegirnos' => $footerPorqueElegirnos,
                'footer_estadisticas' => $footerEstadisticas,
                'whatsapp' => [
                    'numero' => '59177306576',
                    'mensaje' => 'Hola, necesito información sobre sus productos y servicios',
                ],
            ],
            // NUEVO: Compartir registros específicamente para la página About
            'registros' => $registros,
        ];
    }
}
