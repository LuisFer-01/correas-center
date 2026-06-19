<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Producto;
use App\Models\Marca;
use App\Models\Servicio;
use App\Models\Industria;
use App\Models\Sucursal;
use App\Models\Registro;
use App\Models\DetalleRegistro;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * Vista principal del Landing
     * Ruta: /
     */
    public function index(): Response
    {
        // Cargar heroes del slider
        $heroes = Hero::where('estado', 'activo')
            ->orderBy('orden')
            ->get()
            ->map(function ($hero) {
                return [
                    'id' => $hero->id,
                    'imagen' => $hero->imagen,
                    'titulo' => $hero->titulo,
                    'subtitulo' => $hero->subtitulo,
                    'badge_text' => $hero->badge_text,
                ];
            });

        // Productos destacados (primeros 8)
        $productosDestacados = Producto::with(['categorias' => function($query) {
                $query->where('estado', 'activo')->orderBy('orden')->limit(1);
            }])
            ->where('estado', 'activo')
            ->orderBy('orden')
            ->limit(8)
            ->get()
            ->map(function ($producto) {
                return [
                    'id' => $producto->id,
                    'nombre' => $producto->nombre,
                    'slug' => $producto->slug,
                    'imagen' => $producto->imagen,
                    'descripcion_corta' => $producto->categorias->first()?->descripcion_corta ?? 'Productos de alta calidad para tu industria',
                ];
            });

        // Marcas únicas
        $marcas = Marca::where('estado', 'activo')
            ->orderBy('nombre')
            ->get()
            ->map(function ($marca) {
                return [
                    'id' => $marca->id,
                    'nombre' => $marca->nombre,
                    'logo' => $marca->logo,
                ];
            });

        // Servicios
        $servicios = Servicio::where('estado', 'activo')
            ->get()
            ->map(function ($servicio) {
                return [
                    'id' => $servicio->id,
                    'nombre' => $servicio->nombre,
                    'descripcion' => $servicio->descripcion,
                ];
            });

        // Industrias
        $industrias = Industria::where('estado', 'activo')
            ->orderBy('orden')
            ->get()
            ->map(function ($industria) {
                return [
                    'id' => $industria->id,
                    'nombre' => $industria->nombre,
                    'slug' => $industria->slug,
                    'imagen' => $industria->imagen,
                ];
            });

        // Registros (Visión, Misión, Valores)
        $registros = Registro::where('estado', 'activo')
            ->get()
            ->map(function ($registro) {
                return [
                    'id' => $registro->id,
                    'nombre' => $registro->nombre,
                    'descripcion' => $registro->descripcion,
                ];
            });

        // Sucursales
        $sucursales = Sucursal::where('estado', 'activo')
            ->orderByDesc('es_principal')
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
                    'es_principal' => $sucursal->es_principal,
                ];
            });

        return Inertia::render('Home', [
            'heroes' => $heroes,
            'productosDestacados' => $productosDestacados,
            'marcas' => $marcas,
            'servicios' => $servicios,
            'industrias' => $industrias,
            'registros' => $registros,
            'sucursales' => $sucursales,
        ]);
    }
}
