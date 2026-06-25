<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('registros', function (Blueprint $table) {
            $table->string('identificador')->unique()->after('id');
            $table->integer('orden')->default(0)->after('descripcion');
        });
    }

    public function down(): void
    {
        Schema::table('registros', function (Blueprint $table) {
            $table->dropColumn(['identificador', 'orden']);
        });
    }
};
