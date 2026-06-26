<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Industria;
use App\Models\DetalleIndustria;
use App\Models\Registro;
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
        // ✅ CORREGIDO: Ordenar por 'orden' en lugar de 'nombre'
        $servicios = Servicio::where('estado', 'activo')
            ->orderBy('orden', 'asc')
            ->get()
            ->map(function ($servicio) {
                return [
                    'id' => $servicio->id,
                    'nombre' => $servicio->nombre,
                    'slug' => Str::slug($servicio->nombre),
                    'descripcion' => $servicio->descripcion,
                    'imagen' => $servicio->imagen_url,
                    'orden' => $servicio->orden,
                ];
            });

        // ✅ NUEVO: Cargar "Por qué elegirnos" desde la BD
        $porqueElegirnos = [];
        $registro = Registro::where('identificador', 'porque_elegirnos')
            ->where('estado', 'activo')
            ->first();

        if ($registro) {
            $porqueElegirnos = $registro->detalleRegistros()
                ->where('estado', 'activo')
                ->orderBy('orden', 'asc')
                ->get()
                ->map(function ($detalle) {
                    return [
                        'id' => $detalle->id,
                        'titulo' => $detalle->titulo,
                        'descripcion' => $detalle->descripcion,
                        'icono' => $detalle->icono,
                    ];
                })
                ->toArray();
        }

        return Inertia::render('Services/Index', [
            'servicios' => $servicios,
            'porque_elegirnos' => $porqueElegirnos,
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
                    'imagen' => $industria->imagen_url,
                ];
            });

        return Inertia::render('Services/Show', [
            'servicio' => [
                'id' => $servicio->id,
                'nombre' => $servicio->nombre,
                'slug' => Str::slug($servicio->nombre),
                'descripcion' => $servicio->descripcion,
                'imagen' => $servicio->imagen_url,
                'industrias' => $industrias,
            ],
        ]);
    }
}
