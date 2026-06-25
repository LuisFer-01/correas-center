<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\PorqueElegirnos;
use Illuminate\Database\Seeder;

class PorqueElegirnosSeeder extends Seeder
{
    public function run(): void
    {
        $empresa = Empresa::first();

        if (!$empresa) {
            $this->command->error("❌ No se encontró la empresa. Ejecuta primero el EmpresaSeeder.");
            return;
        }

        $items = [
            ['titulo' => 'Calidad Garantizada', 'descripcion' => 'Productos de las mejores marcas internacionales con garantía de calidad', 'icono' => 'CheckCircle2'],
            ['titulo' => 'Asesoría Técnica Especializada', 'descripcion' => 'Equipo técnico capacitado para brindarte la mejor solución', 'icono' => 'CheckCircle2'],
            ['titulo' => 'Cobertura Nacional', 'descripcion' => '4 sucursales estratégicamente ubicadas para atenderte mejor', 'icono' => 'CheckCircle2'],
            ['titulo' => 'Entregas Rápidas', 'descripcion' => 'Amplio inventario para entregas inmediatas en todo Bolivia', 'icono' => 'CheckCircle2'],
            ['titulo' => 'Fabricante Autorizado SKF', 'descripcion' => 'Únicos autorizados para fabricar sellos SKF en Bolivia', 'icono' => 'CheckCircle2'],
            ['titulo' => 'Servicio Personalizado', 'descripcion' => 'Soluciones a medida para cada cliente y cada industria', 'icono' => 'CheckCircle2'],
        ];

        $orden = 1;
        foreach ($items as $item) {
            PorqueElegirnos::create([
                'empresa_id' => $empresa->id,
                ...$item,
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }

        $this->command->info("✅ " . count($items) . " elementos de 'Por qué elegirnos' creados");
    }
}
