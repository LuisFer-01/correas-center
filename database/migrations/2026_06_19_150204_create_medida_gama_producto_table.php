<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medida_gama_producto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medida_id')->constrained('medidas')->onDelete('cascade');
            $table->foreignId('gama_producto_id')->constrained('gama_productos')->onDelete('cascade');
            $table->decimal('valor', 10, 4)->nullable(); // Valor específico para esta gama (si difiere)
            $table->integer('orden')->default(0);
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();

            $table->unique(['medida_id', 'gama_producto_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medida_gama_producto');
    }
};
