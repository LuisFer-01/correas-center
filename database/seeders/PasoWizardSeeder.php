<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PasoWizard;

class PasoWizardSeeder extends Seeder
{
    public function run(): void
    {
        $pasos = [
            [
                'identificador' => 'industria',
                'titulo' => '¿En qué industria trabajas?',
                'descripcion' => 'Selecciona tu sector para recomendarte los mejores productos',
                'fuente_datos' => 'industrias',
                'campo_filtro' => null,
            ],
            [
                'identificador' => 'producto',
                'titulo' => '¿Qué tipo de producto necesitas?',
                'descripcion' => 'Elige la categoría principal de producto',
                'fuente_datos' => 'productos',
                'campo_filtro' => null,
            ],
            [
                'identificador' => 'categoria',
                'titulo' => 'Selecciona la subcategoría específica',
                'descripcion' => 'Elige la variante que mejor se adapte a tu necesidad',
                'fuente_datos' => 'categorias',
                'campo_filtro' => 'producto_id', // Filtra por el producto seleccionado
            ],
        ];

        $orden = 1;
        foreach ($pasos as $paso) {
            PasoWizard::create([
                'empresa_id' => 1,
                ...$paso,
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }
    }
}
