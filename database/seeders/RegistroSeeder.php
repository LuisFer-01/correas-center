<?php

namespace Database\Seeders;

use App\Models\Registro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $registros = [
            [
                'nombre' => 'Visión',
                'descripcion' => 'Ser la empresa líder en soluciones industriales, hidráulicas y neumáticas en Bolivia, reconocida por nuestra calidad, servicio técnico especializado y compromiso con el desarrollo industrial del país.',
            ],
            [
                'nombre' => 'Misión',
                'descripcion' => 'Proveer soluciones integrales de transmisión de potencia, sistemas hidráulicos y neumáticos con los más altos estándares de calidad, brindando asesoría técnica especializada y servicio personalizado a nuestros clientes.',
            ],
            [
                'nombre' => 'Valores',
                'descripcion' => 'Ética decidida, integridad, compromiso, calidad, innovación, servicio al cliente, responsabilidad social y trabajo en equipo.',
            ],
        ];

        foreach ($registros as $registro) {
            Registro::create([
                'nombre' => $registro['nombre'],
                'descripcion' => $registro['descripcion'],
                'estado' => 'activo',
            ]);
        }
    }
}
