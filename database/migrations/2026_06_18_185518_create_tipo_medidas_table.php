<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tipo_medidas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // milimetro, centimetro, pulgada, grado, etc.
            $table->string('abreviatura'); // mm, cm, in, deg, etc.
            $table->string('representacion'); // mm, cm, ", °, etc.
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tipo_medidas');
    }
};
