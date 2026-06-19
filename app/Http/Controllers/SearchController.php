<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SearchController extends Controller
{
    /**
     * Buscar productos
     * Ruta: GET /search
     */
    public function index(Request $request): Response
    {
        $query = $request->get('q', '');

        if (empty($query)) {
            return Inertia::render('Search/Results', [
                'query' => '',
                'productos' => [],
                'categorias' => [],
                'total' => 0,
            ]);
        }

        // Buscar en productos
        $productos = Producto::with(['categorias' => function($q) {
                $q->where('estado', 'activo')->limit(3);
            }])
            ->where('estado', 'activo')
            ->where(function($q) use ($query) {
                $q->where('nombre', 'LIKE', "%{$query}%")
                  ->orWhereHas('categorias', function($subQ) use ($query) {
                      $subQ->where('nombre', 'LIKE', "%{$query}%")
                           ->orWhere('descripcion', 'LIKE', "%{$query}%");
                  });
            })
            ->orderBy('orden')
            ->limit(20)
            ->get()
            ->map(function ($producto) {
                return [
                    'id' => $producto->id,
                    'nombre' => $producto->nombre,
                    'slug' => $producto->slug,
                    'imagen' => $producto->imagen,
                    'categorias' => $producto->categorias->map(function($cat) {
                        return [
                            'nombre' => $cat->nombre,
                            'slug' => $cat->slug,
                        ];
                    }),
                ];
            });

        // Buscar en categorías
        $categorias = Categoria::with(['producto'])
            ->where('estado', 'activo')
            ->where(function($q) use ($query) {
                $q->where('nombre', 'LIKE', "%{$query}%")
                  ->orWhere('descripcion', 'LIKE', "%{$query}%")
                  ->orWhere('descripcion_corta', 'LIKE', "%{$query}%");
            })
            ->orderBy('orden')
            ->limit(15)
            ->get()
            ->map(function ($categoria) {
                return [
                    'id' => $categoria->id,
                    'nombre' => $categoria->nombre,
                    'slug' => $categoria->slug,
                    'imagen' => $categoria->imagen,
                    'descripcion_corta' => $categoria->descripcion_corta,
                    'producto' => $categoria->producto ? [
                        'nombre' => $categoria->producto->nombre,
                        'slug' => $categoria->producto->slug,
                    ] : null,
                ];
            });

        $total = $productos->count() + $categorias->count();

        return Inertia::render('Search/Results', [
            'query' => $query,
            'productos' => $productos,
            'categorias' => $categorias,
            'total' => $total,
        ]);
    }
}
