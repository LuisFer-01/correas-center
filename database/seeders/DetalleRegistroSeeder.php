<?php

namespace Database\Seeders;

use App\Models\DetalleRegistro;
use App\Models\Empresa;
use App\Models\Registro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetalleRegistroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empresa = Empresa::first();
        $registros = Registro::all();

        $orden = 1;
        foreach ($registros as $registro) {
            DetalleRegistro::create([
                'empresa_id' => $empresa->id,
                'grupo' => 'Información Corporativa',
                'registro_id' => $registro->id,
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }
    }
}
