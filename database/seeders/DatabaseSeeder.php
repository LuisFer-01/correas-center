<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            EmpresaSeeder::class,
            RegistroSeeder::class,
            DetalleRegistroSeeder::class,
            SucursalSeeder::class,
            ProductoSeeder::class,
            MarcaSeeder::class,
            DetalleProductoSeeder::class,
            CategoriaSeeder::class,
            GamaProductoSeeder::class,
            CaracteristicaSeeder::class,
            MedidaSeeder::class,
            ComposicionSeeder::class,
            AplicacionSeeder::class,
            DetalleCategoriaSeeder::class,
            ServicioSeeder::class,
            IndustriaSeeder::class,
            DetalleIndustriaSeeder::class,
            HeroSeeder::class,
            MenuSeeder::class,
            DetalleMenuSeeder::class,
        ]);
    }
}
