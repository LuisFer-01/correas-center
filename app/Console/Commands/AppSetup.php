<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class AppSetup extends Command
{
    protected $signature = 'app:setup {--force : Forzar la operación en producción}';
    protected $description = 'Instala la aplicación: migra, seedea y sincroniza todos los datos';

    public function handle(): int
    {
        $this->info('🚀 Iniciando instalación de la aplicación...');
        $this->newLine();

        // Paso 1: Migrar y seedear
        $this->info('📦 Paso 1/3: Ejecutando migrate:fresh --seed...');
        $exitCode = Artisan::call('migrate:fresh', [
            '--seed' => true,
            '--force' => $this->option('force'),
        ]);

        if ($exitCode !== 0) {
            $this->error('❌ Error al ejecutar migrate:fresh --seed');
            $this->line(Artisan::output());
            return Command::FAILURE;
        }
        $this->info(Artisan::output());
        $this->info('✅ Migraciones y seeders ejecutados correctamente.');
        $this->newLine();

        // Paso 2: Sincronizar diferenciales
        $this->info('🔄 Paso 2/3: Sincronizando diferenciales hacia estadísticas...');
        $exitCode = Artisan::call('diferencials:sync');

        if ($exitCode !== 0) {
            $this->error(' Error al sincronizar diferenciales');
            $this->line(Artisan::output());
            return Command::FAILURE;
        }
        $this->info(Artisan::output());
        $this->newLine();

        // Paso 3: Limpiar caché
        $this->info('🧹 Paso 3/3: Limpiando caché...');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        $this->info('✅ Caché limpiado.');
        $this->newLine();

        $this->info('🎉 ¡Instalación completada exitosamente!');
        $this->info(' Accede a: http://localhost:8000');
        $this->info('🔐 Admin: http://localhost:8000/admin');

        return Command::SUCCESS;
    }
}
