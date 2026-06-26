<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained('Empresas')->onDelete('cascade');
            $table->string('imagen');
            $table->string('titulo');
            $table->string('subtitulo')->nullable();
            $table->string('badge_text')->nullable();
            $table->string('cta_primary_text')->nullable();
            $table->string('cta_primary_href')->nullable();
            $table->string('cta_secondary_text')->nullable();
            $table->string('cta_secondary_href')->nullable();
            $table->integer('orden')->default(0);
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
