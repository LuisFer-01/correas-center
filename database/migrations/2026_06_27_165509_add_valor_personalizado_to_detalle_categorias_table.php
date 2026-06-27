<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('detalle_categorias', function (Blueprint $table) {
            $table->decimal('valor_personalizado', 10, 4)->nullable()->after('medida_id');
        });
    }

    public function down(): void
    {
        Schema::table('detalle_categorias', function (Blueprint $table) {
            $table->dropColumn('valor_personalizado');
        });
    }
};
