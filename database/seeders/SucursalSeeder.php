<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\Sucursal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empresa = Empresa::first();

        $sucursales = [
            [
                'nombre' => 'Oficina Central',
                'direccion' => 'Av. Grigotas 2do anillo, Santa Cruz de la Sierra',
                'telefono' => '+591 7 730-6576',
                'email' => 'ventas@correascenter.com',
                'horarios' => 'Lun-Vie: 8:00-18:00 | Sáb: 8:00-13:00',
                'mapa_incrustado' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3808.123!2d-63.18!3d-17.78!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTfCsDQ2JzQ4LjAiUyA2M8KwMTAnNDguMCJX!5e0!3m2!1ses!2sbo!4v1234567890',
                'latitud' => -17.78000000,
                'longitud' => -63.18000000,
                'es_principal' => true,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Sucursal Banzer',
                'direccion' => 'Av. Cristo Redentor 2260, Santa Cruz de la Sierra',
                'telefono' => '+591 7 500-8216',
                'email' => 'ccajabanzer.correasc@gmail.com',
                'horarios' => 'Lun-Vie: 8:00-12:00 y 14:00-18:00 | Sáb: 8:00-13:00',
                'mapa_incrustado' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3808.123!2d-63.17!3d-17.77!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTfCsDQ2JzEyLjAiUyA2M8KwMTAnMTIuMCJX!5e0!3m2!1ses!2sbo!4v1234567891',
                'latitud' => -17.77000000,
                'longitud' => -63.17000000,
                'es_principal' => false,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Sucursal Pampa de la Isla',
                'direccion' => 'Av Virgen De Cotoca, Santa Cruz de la Sierra',
                'telefono' => '+591 7 416-2510',
                'email' => 'ronalsanchez@correascenter.com',
                'horarios' => 'Lun-Vie: 8:00-18:00 | Sáb: 8:00-13:00',
                'mapa_incrustado' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3808.123!2d-63.19!3d-17.79!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTfCsDQ3JzI0LjAiUyA2M8KwMTEnMjQuMCJX!5e0!3m2!1ses!2sbo!4v1234567892',
                'latitud' => -17.79000000,
                'longitud' => -63.19000000,
                'es_principal' => false,
                'estado' => 'activo',
            ],
            [
                'nombre' => 'Sucursal Montero',
                'direccion' => 'Av. Hernando Siles #789, Montero',
                'telefono' => '+591 7 500-8215',
                'email' => 'cajamontero.correasc@gmail.com',
                'horarios' => 'Lun-Vie: 8:00-18:00 | Sáb: 8:00-13:00',
                'mapa_incrustado' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3808.123!2d-63.25!3d-17.48!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTfCsDI4JzQ4LjAiUyA2M8KwMTUnMDAuMCJX!5e0!3m2!1ses!2sbo!4v1234567893',
                'latitud' => -17.48000000,
                'longitud' => -63.25000000,
                'es_principal' => false,
                'estado' => 'activo',
            ],
        ];

        foreach ($sucursales as $sucursal) {
            Sucursal::create([
                'empresa_id' => $empresa->id,
                ...$sucursal,
            ]);
        }
    }
}
