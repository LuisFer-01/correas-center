<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained('Empresas')->onDelete('cascade');
            $table->string('nombre');
            $table->string('empresa')->nullable();
            $table->string('telefono');
            $table->string('email');
            $table->text('mensaje');
            $table->enum('estado', ['nuevo', 'leido', 'respondido', 'archivado'])->default('nuevo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contactos');
    }
};
