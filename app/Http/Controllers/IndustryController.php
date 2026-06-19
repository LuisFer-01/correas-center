<?php

namespace App\Http\Controllers;

use App\Models\Industria;
use App\Models\Categoria;
use App\Models\Servicio;
use App\Models\DetalleIndustria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

class IndustryController extends Controller
{
    /**
     * Listado general de industrias
     * Ruta: /applications
     */
    public function index(): Response
    {
        $industrias = Industria::withCount(['categorias', 'servicios'])
            ->where('estado', 'activo')
            ->orderBy('orden')
            ->get()
            ->map(function ($industria) {
                return [
                    'id' => $industria->id,
                    'nombre' => $industria->nombre,
                    'slug' => $industria->slug,
                    'imagen' => $industria->imagen,
                    'orden' => $industria->orden,
                    'categorias_count' => $industria->categorias_count,
                    'servicios_count' => $industria->servicios_count,
                ];
            });

        return Inertia::render('Applications/Index', [
            'industrias' => $industrias,
        ]);
    }

    /**
     * Detalle de una industria con sus categorías y servicios
     * Ruta: /applications/{slug}
     */
    public function show(string $slug): Response
    {
        $industria = Industria::where('slug', $slug)
            ->where('estado', 'activo')
            ->firstOrFail();

        // Obtener detalles de la industria
        $detalles = DetalleIndustria::where('industria_id', $industria->id)
            ->where('estado', 'activo')
            ->get();

        // Separar por grupo
        $categoriasIds = $detalles->where('grupo', 'Categoria')->pluck('campo_id');
        $serviciosIds = $detalles->where('grupo', 'Servicio')->pluck('campo_id');

        // Cargar categorías con sus productos
        $categorias = Categoria::with(['producto'])
            ->whereIn('id', $categoriasIds)
            ->where('estado', 'activo')
            ->orderBy('orden')
            ->get()
            ->map(function ($categoria) {
                return [
                    'id' => $categoria->id,
                    'nombre' => $categoria->nombre,
                    'slug' => $categoria->slug,
                    'imagen' => $categoria->imagen,
                    'descripcion' => $categoria->descripcion,
                    'descripcion_corta' => $categoria->descripcion_corta,
                    'producto' => $categoria->producto ? [
                        'id' => $categoria->producto->id,
                        'nombre' => $categoria->producto->nombre,
                        'slug' => $categoria->producto->slug,
                    ] : null,
                ];
            });

        // Cargar servicios
        $servicios = Servicio::whereIn('id', $serviciosIds)
            ->where('estado', 'activo')
            ->get()
            ->map(function ($servicio) {
                return [
                    'id' => $servicio->id,
                    'nombre' => $servicio->nombre,
                    'descripcion' => $servicio->descripcion,
                    'slug' => Str::slug($servicio->nombre),
                ];
            });

        return Inertia::render('Applications/Show', [
            'industria' => [
                'id' => $industria->id,
                'nombre' => $industria->nombre,
                'slug' => $industria->slug,
                'imagen' => $industria->imagen,
                'categorias' => $categorias,
                'servicios' => $servicios,
            ],
        ]);
    }
}