<?php

namespace Database\Seeders;

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
            UserSeeder::class,
            EmpresaSeeder::class,
            RegistroSeeder::class,
            DetalleRegistroSeeder::class,
            SucursalSeeder::class,
            ProductoSeeder::class,
            MarcaSeeder::class,
            DetalleProductoSeeder::class,
            CategoriaSeeder::class,
            CaracteristicaSeeder::class,
            TipoMedidaSeeder::class,
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
            DiferencialSeeder::class,
            InfraestructuraSeeder::class,
            PasoWizardSeeder::class,
            FooterSeeder::class,
            PorqueElegirnosSeeder::class,
        ]);
    }
}
