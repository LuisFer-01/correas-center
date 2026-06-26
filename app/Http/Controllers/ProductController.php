<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    /**
     * Listado general de productos
     */
    public function index(): Response
    {
        $productos = Producto::with([
                'categorias' => function($query) {
                    $query->where('categorias.estado', 'activo');
                },
                'marcas' => function($query) {
                    $query->where('marcas.estado', 'activo')
                            ->wherePivot('estado', 'activo');
                }
            ])
            ->withCount(['categorias' => function($query) {
                $query->where('categorias.estado', 'activo');
            }])
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
                    'categorias_count' => $producto->categorias_count,
                    // NUEVO: usar campo 'uso' y 'descripcion_corta'
                    'uso' => $primeraCategoria?->uso ?? '',
                    'descripcion_corta' => $primeraCategoria?->descripcion_corta ?? 'Productos de alta calidad para tu industria',
                    'marcas' => $producto->marcas->map(function ($marca) {
                        return [
                            'id' => $marca->id,
                            'nombre' => $marca->nombre,
                            'logo' => $marca->logo_url,
                        ];
                    }),
                ];
            });

        return Inertia::render('Products/Index', [
            'productos' => $productos,
        ]);
    }

    /**
     * Detalle de un producto con sus categorías
     */
    public function show(string $slug): Response
    {
        $producto = Producto::with([
                'categorias' => function($query) {
                    $query->where('categorias.estado', 'activo')
                          ->orderBy('categorias.orden');
                },
                'categorias.marcas' => function($query) {
                    $query->where('marcas.estado', 'activo');
                },
                'marcas' => function($query) {
                    $query->where('marcas.estado', 'activo')
                          ->wherePivot('estado', 'activo');
                }
            ])
            ->where('slug', $slug)
            ->where('estado', 'activo')
            ->firstOrFail();

        return Inertia::render('Products/Show', [
            'producto' => [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'slug' => $producto->slug,
                'imagen' => $producto->imagen_url,
                'categorias' => $producto->categorias->map(function ($categoria) {
                    return [
                        'id' => $categoria->id,
                        'nombre' => $categoria->nombre,
                        'slug' => $categoria->slug,
                        'imagen' => $categoria->imagen_url,
                        'uso' => $categoria->uso,
                        'descripcion_corta' => $categoria->descripcion_corta,
                        'descripcion' => $categoria->descripcion,
                        // NUEVO: marcas de esta categoría específica
                        'marcas' => $categoria->marcas->map(function ($marca) {
                            return [
                                'id' => $marca->id,
                                'nombre' => $marca->nombre,
                                'logo' => $marca->logo_url,
                            ];
                        }),
                    ];
                }),
            ],
        ]);
    }

    /**
     * Detalle de una categoría
     */
    public function categoryDetail(string $productoSlug, string $categoriaSlug): Response
    {
        $producto = Producto::where('slug', $productoSlug)
            ->where('estado', 'activo')
            ->firstOrFail();

        $categoria = Categoria::with([
                'detalleCategorias' => function($query) {
                    $query->where('detalle_categorias.estado', 'activo')
                          ->with(['gamaProducto', 'caracteristica', 'medida', 'composicion'])
                          ->orderBy('detalle_categorias.orden');
                }
            ])
            ->where('producto_id', $producto->id)
            ->where('slug', $categoriaSlug)
            ->where('estado', 'activo')
            ->firstOrFail();

        return Inertia::render('Products/CategoryDetail', [
            'producto' => [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'slug' => $producto->slug,
            ],
            'categoria' => [
                'id' => $categoria->id,
                'nombre' => $categoria->nombre,
                'slug' => $categoria->slug,
                'imagen' => $categoria->imagen_url,
                'uso' => $categoria->uso,
                'descripcion' => $categoria->descripcion,
                'descripcion_corta' => $categoria->descripcion_corta,
                'detalles' => $categoria->detalleCategorias->map(function ($detalle) {
                    return [
                        'id' => $detalle->id,
                        'orden' => $detalle->orden,
                        // SIN MARCA - solo características generales
                        'gama_producto' => $detalle->gamaProducto ? [
                            'id' => $detalle->gamaProducto->id,
                            'nombre' => $detalle->gamaProducto->nombre,
                        ] : null,
                        'caracteristica' => $detalle->caracteristica ? [
                            'id' => $detalle->caracteristica->id,
                            'nombre' => $detalle->caracteristica->nombre,
                            'descripcion' => $detalle->caracteristica->descripcion,
                        ] : null,
                        'medida' => $detalle->medida ? [
                            'id' => $detalle->medida->id,
                            'nombre' => $detalle->medida->nombre,
                            'medida' => $detalle->medida->medida,
                        ] : null,
                        'composicion' => $detalle->composicion ? [
                            'id' => $detalle->composicion->id,
                            'nombre' => $detalle->composicion->nombre,
                            'descripcion' => $detalle->composicion->descripcion,
                        ] : null,
                    ];
                }),
            ],
        ]);
    }
}
