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
                'imagen' => 'storage/servicio/Fabricacion_SKF.jpeg',
            ],
            [
                'nombre' => 'Prensado de Mangueras',
                'descripcion' => 'Prensado profesional de mangueras con equipos de última generación de alta precisión',
                'imagen' => 'storage/servicio/Manguera_Prensada.jpeg',
            ],
            [
                'nombre' => 'Reparacion de Cilindros',
                'descripcion' => 'Reparación y mantenimiento especializado de cilindros hidráulicos y neumáticos',
                'imagen' => 'storage/servicio/reparacion-cilindros.jpeg',
            ],
            [
                'nombre' => 'Fabricacion de O-rings',
                'descripcion' => 'Fabricación de juntas tóricas a medida según especificaciones del cliente',
                'imagen' => 'storage/servicio/fabricacion-orings.jpg',
            ],
            [
                'nombre' => 'Asesoria Tecnica Industrial',
                'descripcion' => 'Asesoría especializada en selección de productos y soluciones técnicas',
                'imagen' => 'storage/servicio/Servicio_Tecnico.png',
            ],
            [
                'nombre' => 'Empalmes y Montaje de Bandas',
                'descripcion' => 'Servicio de empalme y montaje de bandas transportadoras',
                'imagen' => 'storage/servicio/empalmes-montaje.jpg',
            ],
        ];

        foreach ($servicios as $servicio) {
            Servicio::create([
                'nombre' => $servicio['nombre'],
                'descripcion' => $servicio['descripcion'],
                'imagen' => $servicio['imagen'],
                'estado' => 'activo',
            ]);
        }
    }
}
