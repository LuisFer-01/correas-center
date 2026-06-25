<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Renombrar tabla
        Schema::rename('footer_porque_elegirnos', 'porque_elegirnos');

        // Agregar campo empresa_id
        Schema::table('porque_elegirnos', function (Blueprint $table) {
            $table->foreignId('empresa_id')->after('id')->constrained('empresas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('porque_elegirnos', function (Blueprint $table) {
            $table->dropForeign(['empresa_id']);
            $table->dropColumn('empresa_id');
        });

        Schema::rename('porque_elegirnos', 'footer_porque_elegirnos');
    }
};
