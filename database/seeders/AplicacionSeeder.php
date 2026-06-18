<?php

namespace Database\Seeders;

use App\Models\Aplicacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AplicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aplicaciones = [
            ['nombre' => 'Industria general'],
            ['nombre' => 'Equipo de HVAC'],
            ['nombre' => 'Césped y Jardín'],
            ['nombre'=> 'Agricultura'],
        ];

        $orden = 1;
        foreach ($aplicaciones as $app) {
            Aplicacion::create([
                'nombre' => $app['nombre'],
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }
    }
}
