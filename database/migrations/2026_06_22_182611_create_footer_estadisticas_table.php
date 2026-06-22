<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('footer_estadisticas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo'); // ej: "+25 Años"
            $table->string('subtitulo'); // ej: "Experiencia Comprobada"
            $table->string('icono')->nullable(); // Icono de Lucide
            $table->integer('orden')->default(0);
            $table->boolean('mostrar')->default(true);
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('footer_estadisticas');
    }
};
