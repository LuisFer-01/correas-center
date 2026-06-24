<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\Sucursal;
use Illuminate\Database\Seeder;

class SucursalSeeder extends Seeder
{
    public function run(): void
    {
        $empresa = Empresa::first();

        if (!$empresa) {
            $this->command->error("❌ No se encontró la empresa. Ejecuta primero el EmpresaSeeder.");
            return;
        }

        $sucursales = [
            [
                'nombre' => 'Oficina Central',
                'direccion' => 'Segundo anillo 5, Santa Cruz de la Sierra',
                'telefono' => '+591 7 7306576',
                'email' => 'ventas@correascenter.com',
                'horarios' => 'Lun - Vie: 8:00 - 18:00 | Sáb: 8:00 - 13:00',
                'mapa_incrustado' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20802.77187535896!2d-63.22224718533964!3d-17.79752330000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e818129b636f%3A0xb79a33ec5254f60c!2sCORREAS%20CENTER%20LTDA!5e1!3m2!1ses-419!2sbo!4v1780433048739!5m2!1ses-419!2sbo',
                'latitud' => -17.7975233,
                'longitud' => -63.2222472,
                'es_principal' => true,
                'orden' => 1,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Sucursal Banzer',
                'direccion' => 'Av. Cristo Redentor 2260, Santa Cruz de la Sierra',
                'telefono' => '+591 7 5008216',
                'email' => 'cajabanzer.correasc@gmail.com',
                'horarios' => 'Lun - Vie: 8:00 - 12:00 y 14:00 - 18:00 | Sáb: 8:00 - 13:00',
                'mapa_incrustado' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20806.27427524379!2d-63.211398785339654!3d-17.76744909999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e7c2698f3d4b%3A0x1d491b56825dba72!2sCorreas%20Center%20Ltda%20Sucursal%201!5e1!3m2!1ses-419!2sbo!4v1780432576106!5m2!1ses-419!2sbo',
                'latitud' => -17.7674491,
                'longitud' => -63.2113988,
                'es_principal' => false,
                'orden' => 2,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Sucursal Pampa de la Isla',
                'direccion' => 'Av Virgen De Cotoca, Santa Cruz de la Sierra',
                'telefono' => '+591 7 4162510',
                'email' => 'ronalsanchez@correascenter.com',
                'horarios' => 'Lun - Vie: 8:00 - 12:00 y 14:00 - 18:00 | Sáb: 8:00 - 13:00',
                'mapa_incrustado' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20805.695440343206!2d-63.15496336566989!3d-17.77242280214628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e965c22926a9%3A0xa4a21021c446dd9a!2sCORREAS%20CENTER%20Ltda%20Sucursal%202!5e1!3m2!1ses-419!2sbo!4v1780432463578!5m2!1ses-419!2sbo',
                'latitud' => -17.7724228,
                'longitud' => -63.1549634,
                'es_principal' => false,
                'orden' => 3,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Sucursal Montero',
                'direccion' => 'Av. Hernando Siles #789, Montero',
                'telefono' => '+591 7 5008215',
                'email' => 'cajamontero.correasc@gmail.com',
                'horarios' => 'Lun - Vie: 8:00 - 12:00 y 14:00 - 18:00 | Sáb: 8:00 - 13:00',
                'mapa_incrustado' => 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3188.6736409998502!2d-63.261638324836305!3d-17.336964783541582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTfCsDIwJzEzLjEiUyA2M8KwMTUnMzIuNiJX!5e1!3m2!1ses!2sbo!4v1780489828187!5m2!1ses!2sbo',
                'latitud' => -17.3369648,
                'longitud' => -63.2616383,
                'es_principal' => false,
                'orden' => 4,
                'estado' => 'activo',
            ],
        ];

        foreach ($sucursales as $sucursal) {
            Sucursal::updateOrCreate(
                ['nombre' => $sucursal['nombre']],
                [
                    'empresa_id' => $empresa->id,
                    ...$sucursal,
                ]
            );
        }

        $this->command->info("✅ " . count($sucursales) . " sucursales creadas/actualizadas");
    }
}
