<?php

namespace Database\Seeders;

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
        $servicios = [
            [
                'nombre' => 'Fabricacion de Sellos SKF',
                'descripcion' => 'Fabricación especializada de sellos y retenes con licencia exclusiva SKF para Bolivia',
            ],
            [
                'nombre' => 'Prensado de Mangueras',
                'descripcion' => 'Prensado profesional de mangueras con equipos de última generación de alta precisión',
            ],
            [
                'nombre' => 'Reparacion de Cilindros',
                'descripcion' => 'Reparación y mantenimiento especializado de cilindros hidráulicos y neumáticos',
            ],
            [
                'nombre' => 'Fabricacion de O-rings',
                'descripcion' => 'Fabricación de juntas tóricas a medida según especificaciones del cliente',
            ],
            [
                'nombre' => 'Asesoria Tecnica Industrial',
                'descripcion' => 'Asesoría especializada en selección de productos y soluciones técnicas',
            ],
            [
                'nombre' => 'Empalmes y Montaje de Bandas',
                'descripcion' => 'Servicio de empalme y montaje de bandas transportadoras',
            ],
        ];

        foreach ($servicios as $servicio) {
            Servicio::create([
                'nombre' => $servicio['nombre'],
                'descripcion' => $servicio['descripcion'],
                'estado' => 'activo',
            ]);
        }
    }
}
