<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('perusahaan', function (Blueprint $table) {
            $table->string('jenis_kegiatan')->nullable()->after('lokasi');
            // nilai: 'Magang', 'Kerja Praktik', 'Tugas Akhir', 'Semua Kegiatan'
        });
    }

    public function down(): void
    {
        Schema::table('perusahaan', function (Blueprint $table) {
            $table->dropColumn('jenis_kegiatan');
        });
    }
};
