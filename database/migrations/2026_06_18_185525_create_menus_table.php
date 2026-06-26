<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained('Empresas')->onDelete('cascade');
            $table->string('grupo'); // 'Producto', 'Aplicacion', 'Servicio', etc.
            $table->unsignedBigInteger('campo_id')->nullable(); // ID de producto, aplicacion, servicio, etc.
            $table->string('ruta');
            $table->string('icon')->nullable();
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();

            // Índice para búsqueda rápida
            $table->index(['grupo', 'campo_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
