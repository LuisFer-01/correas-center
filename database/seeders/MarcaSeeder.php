<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas = [
            ['nombre' => 'PERFECT POWER', 'logo' => 'marca/Perfect Power.png'],
            ['nombre' => 'SKF', 'logo' => 'marca/SKF-DISTRIBUIDOR-ESPECIALISTA-EN-SELLOS-VERTICAL.png'],
            ['nombre' => 'SAV', 'logo' => 'marca/SAV.png'],
            ['nombre' => 'ARCA', 'logo' => 'marca/ARCA.png'],
            ['nombre' => 'FAG', 'logo' => 'marca/FAG-2.png'],
            ['nombre' => 'INA', 'logo' => 'marca/INA.jpg'],
            ['nombre' => 'NSK', 'logo' => 'marca/NSK.png'],
            ['nombre' => 'NTN', 'logo' => 'marca/NTN.png'],
            ['nombre' => 'JASON MEGADYNE', 'logo' => 'marca/JASON_MEGADYNE.jpg'],
            ['nombre' => 'MITSUBA', 'logo' => 'marca/mitsuba.jpg'],
            ['nombre' => 'GATES', 'logo' => 'marca/GATES.png'],
            ['nombre' => 'ABIX', 'logo' => 'marca/ABIX.png'],
            ['nombre' => 'PIX', 'logo' => 'marca/PIX.jpg'],
            ['nombre' => 'ZMTE', 'logo' => 'marca/ZMTE.png'],
            ['nombre' => 'PABOVI', 'logo' => 'marca/Pabovi.png'],
            ['nombre' => 'APC', 'logo' => 'marca/APC.png'],
            ['nombre' => 'GMORS', 'logo' => 'marca/GMORS.jpg'],
            ['nombre' => 'HERCULES', 'logo' => 'marca/HERCULES.jpg'],
            ['nombre' => 'WORLD GASKET', 'logo' => 'marca/WORLD GASKET.png'],
            ['nombre' => 'F&D', 'logo' => 'marca/F&D.png'],
            ['nombre' => 'FBJ', 'logo' => 'marca/FBJ.png'],
            ['nombre' => 'KFB', 'logo' => 'marca/KFB.png'],
            ['nombre' => 'TOP-Q', 'logo' => 'marca/TOP-Q.jpg'],
        ];

        $orden = 1;
        foreach ($marcas as $marca) {
            Marca::create([
                'nombre' => $marca['nombre'],
                'slug' => Str::slug($marca['nombre']),
                'logo' => $marca['logo'],
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }

        $this->command->info("✅ " . count($marcas) . " marcas creadas");
    }
}
