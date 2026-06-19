<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('diferenciales', function (Blueprint $table) {
            $table->id();
            $table->string('titulo'); // ej: "+25 Años", "SKF", "10,000+"
            $table->string('subtitulo'); // ej: "Experiencia Comprobada"
            $table->text('descripcion');
            $table->string('icon')->nullable(); // Código de icono (lucide o fontawesome)
            $table->integer('orden')->default(0);
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('diferenciales');
    }
};
