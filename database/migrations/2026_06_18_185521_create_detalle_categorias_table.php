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
        Schema::create('detalle_categorias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->foreignId('caracteristica_id')->nullable()->constrained('caracteristicas')->onDelete('cascade');
            $table->foreignId('medida_id')->nullable()->constrained('medidas')->onDelete('cascade');
            $table->foreignId('composicion_id')->nullable()->constrained('composiciones')->onDelete('cascade');
            $table->foreignId('aplicacion_id')->nullable()->constrained('aplicaciones')->onDelete('cascade');
            $table->integer('orden')->default(0);
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_categorias');
    }
};
