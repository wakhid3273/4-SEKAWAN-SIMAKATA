<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mahasiswa_magang', function (Blueprint $table) {
            $table->string('bidang')->nullable()->after('posisi');
            $table->string('cv_file')->nullable()->after('periode');
            $table->string('transkrip_file')->nullable()->after('cv_file');
            $table->text('alasan_penolakan')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('mahasiswa_magang', function (Blueprint $table) {
            $table->dropColumn(['bidang', 'cv_file', 'transkrip_file', 'alasan_penolakan']);
        });
    }
};
