<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('marcas', function (Blueprint $table) {
            $table->integer('orden')->default(0)->after('logo');
        });
    }

    public function down(): void
    {
        Schema::table('marcas', function (Blueprint $table) {
            $table->dropColumn('orden');
        });
    }
};
