<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Obtener todas las marcas activas
     */
    public function index()
    {
        $marcas = Marca::where('estado', 'activo')
            ->orderBy('orden')
            ->get()
            ->map(function ($marca) {
                return [
                    'id' => $marca->id,
                    'nombre' => $marca->nombre,
                    'logo' => $marca->logo_url,
                ];
            });

        return response()->json($marcas);
    }
}
