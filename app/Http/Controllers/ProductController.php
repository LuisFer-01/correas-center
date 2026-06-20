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
        $productos = Producto::withCount(['categorias' => function($query) {
                $query->where('estado', 'activo');
            }])
            ->where('estado', 'activo')
            ->orderBy('orden')
            ->get()
            ->map(function ($producto) {
                return [
                    'id' => $producto->id,
                    'nombre' => $producto->nombre,
                    'slug' => $producto->slug,
                    'imagen' => $producto->imagen_url, // Usar accessor
                    'orden' => $producto->orden,
                    'categorias_count' => $producto->categorias_count,
                    'descripcion_corta' => $producto->categorias->first()?->descripcion_corta ?? 'Productos de alta calidad para tu industria',
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
        $producto = Producto::with(['categorias' => function($query) {
                $query->where('estado', 'activo')->orderBy('orden');
            }])
            ->where('slug', $slug)
            ->where('estado', 'activo')
            ->firstOrFail();

        return Inertia::render('Products/Show', [
            'producto' => [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'slug' => $producto->slug,
                'imagen' => $producto->imagen_url, // Usar accessor
                'categorias' => $producto->categorias->map(function ($categoria) {
                    return [
                        'id' => $categoria->id,
                        'nombre' => $categoria->nombre,
                        'slug' => $categoria->slug,
                        'imagen' => $categoria->imagen_url, // Usar accessor
                        'descripcion' => $categoria->descripcion,
                        'descripcion_corta' => $categoria->descripcion_corta,
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

        $categoria = Categoria::with(['detalleCategorias' => function($query) {
                $query->where('estado', 'activo')
                    ->with(['marca', 'gamaProducto', 'caracteristica', 'medida', 'composicion'])
                    ->orderBy('orden');
            }])
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
                'imagen' => $categoria->imagen_url, // Usar accessor
                'descripcion' => $categoria->descripcion,
                'descripcion_corta' => $categoria->descripcion_corta,
                'detalles' => $categoria->detalleCategorias->map(function ($detalle) {
                    return [
                        'id' => $detalle->id,
                        'orden' => $detalle->orden,
                        'marca' => $detalle->marca ? [
                            'id' => $detalle->marca->id,
                            'nombre' => $detalle->marca->nombre,
                            'logo' => $detalle->marca->logo_url, // Usar accessor
                        ] : null,
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
