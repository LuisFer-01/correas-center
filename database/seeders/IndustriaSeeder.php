<?php

namespace Database\Seeders;

use App\Models\Industria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class IndustriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $industrias = [
            ['nombre' => 'Industria Alimenticia', 'imagen' => '/industria/alimenticia.jpg'],
            ['nombre' => 'Agroindustrial', 'imagen' => '/industria/agroindustrial.jpg'],
            ['nombre' => 'Industria Minera', 'imagen' => '/industria/minera.jpg'],
            ['nombre' => 'Industria Metalúrgica', 'imagen' => '/industria/metalurgica.jpg'],
            ['nombre' => 'Petróleo y Gas', 'imagen' => '/industria/petroleo-gas.jpg'],
            ['nombre' => 'Manufactura', 'imagen' => '/industria/manufactura.jpg'],
            ['nombre' => 'Construcción', 'imagen' => '/industria/construccion.jpg'],
            ['nombre' => 'Transporte', 'imagen' => '/industria/transporte.jpg'],
            ['nombre' => 'Logística', 'imagen' => '/industria/logistica.jpg'],
        ];

        $orden = 1;
        foreach ($industrias as $industria) {
            Industria::create([
                'nombre' => $industria['nombre'],
                'slug' => Str::slug($industria['nombre']),
                'imagen' => $industria['imagen'],
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }
    }
}
