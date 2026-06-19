<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_industrias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('industria_id')->constrained('industrias')->onDelete('cascade');
            $table->string('grupo'); // 'Categoria' o 'Servicio'
            $table->unsignedBigInteger('campo_id'); // ID de categoria o servicio
            $table->integer('orden')->default(0); // NUEVO: orden de visualización
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();

            $table->index(['industria_id', 'grupo', 'campo_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_industrias');
    }
};
