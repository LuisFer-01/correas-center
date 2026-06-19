<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    /**
     * Obtener todas las sucursales activas
     */
    public function index()
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
                    'whatsapp' => preg_replace('/[^0-9]/', '', $sucursal->telefono),
                ];
            });

        return response()->json($sucursales);
    }

    /**
     * Obtener una sucursal específica
     */
    public function show($id)
    {
        $sucursal = Sucursal::findOrFail($id);

        return response()->json([
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
        ]);
    }
}
