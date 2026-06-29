<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [
            [
                'name' => 'Admin Camacho',
                'email' => 'luisfer.camacho.balli@gmail.com',
                'password' => Hash::make('admin123'),
                'estado' => 'activo',
            ],
            [
                'name' => 'Administrador Ventas',
                'email' => 'ventas@correascenter.com',
                'password' => Hash::make('ventas123'),
                'estado' => 'activo',
            ],
            [
                'name' => 'Soporte Técnico',
                'email' => 'soporte@correascenter.com',
                'password' => Hash::make('soporte123'),
                'estado' => 'activo',
            ],
            [
                'name' => 'Usuario Demo',
                'email' => 'demo@correascenter.com',
                'password' => Hash::make('demo123'),
                'estado' => 'inactivo',
            ],
        ];

        foreach ($usuarios as $usuario) {
            User::updateOrCreate(
                ['email' => $usuario['email']],
                $usuario
            );
        }

        $this->command->info('✅ Usuarios creados correctamente');
        $this->command->warn('📧 Credenciales:');
        $this->command->warn('  - luisfer.camacho.balli@gmail.com / admin123');
        $this->command->warn('  - ventas@correascenter.com / ventas123');
        $this->command->warn('  - soporte@correascenter.com / soporte123');
        $this->command->warn('  - demo@correascenter.com / demo123 (inactivo)');
    }
}
