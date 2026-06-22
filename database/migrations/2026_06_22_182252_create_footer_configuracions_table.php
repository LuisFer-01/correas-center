<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('footer_configuracions', function (Blueprint $table) {
            $table->id();
            $table->string('tipo'); // 'producto', 'industria', 'servicio', 'red_social', 'ubicacion'
            $table->unsignedBigInteger('campo_id')->nullable(); // ID del producto/industria/servicio
            $table->string('titulo')->nullable(); // Para redes sociales o ubicaciones
            $table->string('url')->nullable(); // Para redes sociales
            $table->string('icono')->nullable(); // Icono de red social
            $table->integer('orden')->default(0);
            $table->boolean('mostrar')->default(true);
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('footer_configuracions');
    }
};
