<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Industria;
use App\Models\DetalleIndustria;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Listado general de servicios
     * Ruta: /services
     */
    public function index(): Response
    {
        $servicios = Servicio::where('estado', 'activo')
            ->orderBy('nombre')
            ->get()
            ->map(function ($servicio) {
                return [
                    'id' => $servicio->id,
                    'nombre' => $servicio->nombre,
                    'slug' => Str::slug($servicio->nombre),
                    'descripcion' => $servicio->descripcion,
                    'imagen' => $servicio->imagen_url, // Usar accessor
                ];
            });

        return Inertia::render('Services/Index', [
            'servicios' => $servicios,
        ]);
    }

    /**
     * Detalle de un servicio con sus industrias asociadas
     * Ruta: /services/{slug}
     */
    public function show(string $slug): Response
    {
        $servicio = Servicio::where('estado', 'activo')
            ->get()
            ->first(function ($s) use ($slug) {
                return Str::slug($s->nombre) === $slug;
            });

        if (!$servicio) {
            abort(404);
        }

        // Obtener industrias asociadas a este servicio
        $detalleIndustrias = DetalleIndustria::where('grupo', 'Servicio')
            ->where('campo_id', $servicio->id)
            ->where('estado', 'activo')
            ->pluck('industria_id');

        $industrias = Industria::whereIn('id', $detalleIndustrias)
            ->where('estado', 'activo')
            ->orderBy('orden')
            ->get()
            ->map(function ($industria) {
                return [
                    'id' => $industria->id,
                    'nombre' => $industria->nombre,
                    'slug' => $industria->slug,
                    'imagen' => $industria->imagen_url, // Usar accessor
                ];
            });

        return Inertia::render('Services/Show', [
            'servicio' => [
                'id' => $servicio->id,
                'nombre' => $servicio->nombre,
                'slug' => Str::slug($servicio->nombre),
                'descripcion' => $servicio->descripcion,
                'imagen' => $servicio->imagen_url, // Usar accessor
                'industrias' => $industrias,
            ],
        ]);
    }
}
