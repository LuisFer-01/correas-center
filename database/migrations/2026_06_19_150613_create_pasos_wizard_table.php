<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pasos_wizard', function (Blueprint $table) {
            $table->id();
            $table->string('identificador'); // 'industria', 'producto', 'categoria'
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('fuente_datos'); // 'industrias', 'productos', 'categorias'
            $table->string('campo_filtro')->nullable(); // Campo para filtrar datos (ej: 'producto_id')
            $table->integer('orden')->default(0);
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pasos_wizard');
    }
};
