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
            ['nombre' => 'Industria Alimenticia', 'imagen' => 'storage/industria/alimenticia.jpg'],
            ['nombre' => 'Agroindustrial', 'imagen' => 'storage/industria/agroindustrial.jpg'],
            ['nombre' => 'Industria Minera', 'imagen' => 'storage/industria/minera.jpg'],
            ['nombre' => 'Industria Metalúrgica', 'imagen' => 'storage/industria/metalurgica.jpg'],
            ['nombre' => 'Petróleo y Gas', 'imagen' => 'storage/industria/petroleo-gas.jpg'],
            ['nombre' => 'Manufactura', 'imagen' => 'storage/industria/manufactura.jpg'],
            ['nombre' => 'Construcción', 'imagen' => 'storage/industria/construccion.jpg'],
            ['nombre' => 'Transporte', 'imagen' => 'storage/industria/transporte.jpg'],
            ['nombre' => 'Logística', 'imagen' => 'storage/industria/logistica.jpg'],
        ];

        $orden = 1;
        foreach ($industrias as $industria) {
            Industria::create([
                'empresa_id' => 1,
                'nombre' => $industria['nombre'],
                'slug' => Str::slug($industria['nombre']),
                'imagen' => $industria['imagen'],
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }
    }
}
