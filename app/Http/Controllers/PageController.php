<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Registro;
use App\Models\DetalleRegistro;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PageController extends Controller
{
    /**
     * Vista Acerca de
     * Ruta: /about
     */
    public function about(): Response
    {
        $empresa = Empresa::with(['detalleRegistros.registro' => function($query) {
                $query->where('estado', 'activo');
            }])
            ->where('estado', 'activo')
            ->first();

        $registros = collect();
        
        if ($empresa && $empresa->detalleRegistros) {
            $registros = $empresa->detalleRegistros
                ->sortBy('orden')
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
                });
        }

        return Inertia::render('About', [
            'empresa' => $empresa ? [
                'id' => $empresa->id,
                'nombre' => $empresa->nombre,
                'logo' => $empresa->logo,
            ] : null,
            'registros' => $registros,
        ]);
    }

    /**
     * Vista Contacto
     * Ruta: /contact
     */
    public function contact(): Response
    {
        return Inertia::render('Contact');
    }

    /**
     * Vista Sucursales
     * Ruta: /branches
     */
    public function branches(): Response
    {
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
                ];
            });

        return Inertia::render('Branches', [
            'sucursales' => $sucursales,
        ]);
    }

    /**
     * Vista Política de Privacidad
     * Ruta: /privacy
     */
    public function privacy(): Response
    {
        return Inertia::render('Privacy');
    }

    /**
     * Vista Términos y Condiciones
     * Ruta: /terms
     */
    public function terms(): Response
    {
        return Inertia::render('Terms');
    }
}