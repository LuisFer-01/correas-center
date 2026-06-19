<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_medida_id')->constrained('tipo_medidas')->onDelete('cascade');
            $table->string('nombre'); // Nombre del campo (ej: Ancho externo, Diámetro, etc.)
            $table->decimal('magnitud', 10, 4)->nullable(); // Valor numérico opcional (ej: 40, 16.27)
            $table->integer('orden')->default(0);
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medidas');
    }
};
