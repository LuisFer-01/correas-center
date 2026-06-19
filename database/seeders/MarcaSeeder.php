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
            ['nombre' => 'ABIX','logo'=> 'storage/marca/ABIX.png'],
            ['nombre' => 'APC','logo'=> 'storage/marca/APC.png'],
            ['nombre' => 'ARCA','logo'=> 'storage/marca/ARCA.png'],
            ['nombre' => 'F&D','logo'=> 'storage/marca/F&D.png'],
            ['nombre' => 'FAG','logo'=> 'storage/marca/FAG-2.png'],
            ['nombre' => 'FBJ', 'logo' => 'storage/marca/FBJ.png'],
            ['nombre' => 'GATES', 'logo' => 'storage/marca/GATES.png'],
            ['nombre' => 'GMORS', 'logo' => 'storage/marca/GMORS.jpg'],
            ['nombre' => 'HERCULES', 'logo' => 'storage/marca/HERCULES.jpg'],
            ['nombre' => 'INA', 'logo' => 'storage/marca/INA.jpg'],
            ['nombre' => 'JASON MEGADYNE', 'logo' => 'storage/marca/JASON_MEGADYNE.jpg'],
            ['nombre' => 'KFB', 'logo' => 'storage/marca/KFB.png'],
            ['nombre' => 'MITSUBA', 'logo' => 'storage/marca/mitsuba.jpg'],
            ['nombre' => 'NSK', 'logo' => 'storage/marca/NSK.png'],
            ['nombre' => 'NTN', 'logo' => 'storage/marca/NTN.png'],
            ['nombre' => 'PABOVI', 'logo' => 'storage/marca/Pabovi.png'],
            ['nombre' => 'PERFECT POWER', 'logo' => 'storage/marca/Perfect Power.png'],
            ['nombre' => 'PIX', 'logo' => 'storage/marca/PIX.jpg'],
            ['nombre' => 'SAV', 'logo' => 'storage/marca/SAV.png'],
            ['nombre' => 'SKF', 'logo' => 'storage/marca/SKF-DISTRIBUIDOR-ESPECIALISTA-EN-SELLOS-VERTICAL.png'],
            ['nombre' => 'TOP-Q', 'logo' => 'storage/marca/TOP-Q.jpg'],
            ['nombre' => 'WORLD GASKET', 'logo' => 'storage/marca/WORLD GASKET.png'],
            ['nombre' => 'ZMTE', 'logo' => 'storage/marca/ZMTE.png'],
        ];

        foreach ($marcas as $marca) {
            Marca::create([
                'nombre' => $marca['nombre'],
                'slug' => Str::slug($marca['nombre']),
                'logo' => $marca['logo'],
                'estado' => 'activo',
            ]);
        }
    }
}
