<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('mahasiswa_magang', function (Blueprint $table) {
            $table->string('nim')->nullable()->after('nama');
            $table->string('kegiatan')->nullable()->after('nim'); // 'Kerja Praktek' atau 'Magang'
            $table->string('status')->default('Pending Review')->after('kegiatan'); // 'Pending Review', 'Disetujui', 'Ditolak'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswa_magang', function (Blueprint $table) {
            $table->dropColumn(['nim', 'kegiatan', 'status']);
        });
    }
};
