<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kelas', function (Blueprint $table) {
            $table->dropForeign(['tahun_ajar_id']);
            $table->dropColumn('tahun_ajar_id');
        });
    }

    public function down(): void
    {
        Schema::table('kelas', function (Blueprint $table) {
            $table->foreignId('tahun_ajar_id')
                ->constrained('tahun_ajars')
                ->onDelete('cascade');
        });
    }
};
