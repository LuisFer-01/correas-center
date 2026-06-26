<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\Servicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empresa = Empresa::first();

        if (!$empresa) {
            $this->command->error("❌ No se encontró la empresa. Ejecuta primero el EmpresaSeeder.");
            return;
        }

        $servicios = [
            [
                'nombre' => 'Fabricacion de Sellos SKF',
                'descripcion' => 'Fabricación especializada de sellos y retenes con licencia exclusiva SKF para Bolivia',
                'imagen' => 'servicio/Fabricacion_SKF.jpeg',
            ],
            [
                'nombre' => 'Prensado de Mangueras',
                'descripcion' => 'Prensado profesional de mangueras con equipos de última generación de alta precisión',
                'imagen' => 'servicio/Manguera_Prensada.jpeg',
            ],
            [
                'nombre' => 'Reparacion de Cilindros',
                'descripcion' => 'Reparación y mantenimiento especializado de cilindros hidráulicos y neumáticos',
                'imagen' => 'servicio/reparacion-cilindros.jpeg',
            ],
            [
                'nombre' => 'Fabricacion de O-rings',
                'descripcion' => 'Fabricación de juntas tóricas a medida según especificaciones del cliente',
                'imagen' => 'servicio/fabricacion-orings.jpg',
            ],
            [
                'nombre' => 'Asesoria Tecnica Industrial',
                'descripcion' => 'Asesoría especializada en selección de productos y soluciones técnicas',
                'imagen' => 'servicio/Servicio_Tecnico.png',
            ],
            [
                'nombre' => 'Empalmes y Montaje de Bandas',
                'descripcion' => 'Servicio de empalme y montaje de bandas transportadoras',
                'imagen' => 'servicio/empalmes-montaje.jpg',
            ],
        ];

        $orden = 1;
        foreach ($servicios as $servicio) {
            Servicio::create([
                'empresa_id' => $empresa->id,
                ...$servicio,
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }

        $this->command->info("✅ " . count($servicios) . " servicios creados");
    }
}
