<?php

namespace Database\Seeders;

use App\Models\FooterPorqueElegirnos;
use Illuminate\Database\Seeder;

class FooterPorqueElegirnosSeeder extends Seeder
{
    public function run(): void
    {
        $datos = [
            ['titulo' => 'Calidad Garantizada', 'descripcion' => 'Productos de las mejores marcas internacionales con garantía de calidad', 'icono' => 'CheckCircle2', 'orden' => 1],
            ['titulo' => 'Asesoría Técnica Especializada', 'descripcion' => 'Equipo técnico capacitado para brindarte la mejor solución', 'icono' => 'CheckCircle2', 'orden' => 2],
            ['titulo' => 'Cobertura Nacional', 'descripcion' => '4 sucursales estratégicamente ubicadas para atenderte mejor', 'icono' => 'CheckCircle2', 'orden' => 3],
            ['titulo' => 'Entregas Rápidas', 'descripcion' => 'Amplio inventario para entregas inmediatas en todo Bolivia', 'icono' => 'CheckCircle2', 'orden' => 4],
            ['titulo' => 'Fabricante Autorizado SKF', 'descripcion' => 'Únicos autorizados para fabricar sellos SKF en Bolivia', 'icono' => 'CheckCircle2', 'orden' => 5],
            ['titulo' => 'Servicio Personalizado', 'descripcion' => 'Soluciones a medida para cada cliente y cada industria', 'icono' => 'CheckCircle2', 'orden' => 6],
        ];

        foreach ($datos as $dato) {
            FooterPorqueElegirnos::create([
                'titulo' => $dato['titulo'],
                'descripcion' => $dato['descripcion'],
                'icono' => $dato['icono'],
                'orden' => $dato['orden'],
                'mostrar' => true,
                'estado' => 'activo',
            ]);
        }
    }
}
