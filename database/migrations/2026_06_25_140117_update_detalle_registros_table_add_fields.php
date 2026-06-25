<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('detalle_registros', function (Blueprint $table) {
            $table->string('titulo')->nullable()->after('registro_id');
            $table->text('descripcion')->nullable()->after('titulo');
            $table->string('icono')->nullable()->after('descripcion');
            $table->string('stats')->nullable()->after('icono');
            $table->string('subtitulo')->nullable()->after('stats');
        });
    }

    public function down(): void
    {
        Schema::table('detalle_registros', function (Blueprint $table) {
            $table->dropColumn(['titulo', 'grupo', 'descripcion', 'icono', 'stats', 'subtitulo', 'orden']);
        });
    }
};
