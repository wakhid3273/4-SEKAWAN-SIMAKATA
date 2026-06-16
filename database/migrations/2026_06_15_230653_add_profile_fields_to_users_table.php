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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nama_lengkap')->nullable()->after('nim');
            $table->string('angkatan')->nullable()->after('nama_lengkap');
            $table->string('program_studi')->nullable()->after('angkatan');
            $table->string('semester_aktif')->nullable()->after('program_studi');
            $table->string('status_akademik')->default('Aktif')->after('semester_aktif');
            $table->string('email')->nullable()->unique()->after('status_akademik');
            $table->string('nomor_telepon')->nullable()->after('email');
            $table->timestamp('last_login_at')->nullable()->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'nama_lengkap',
                'angkatan',
                'program_studi',
                'semester_aktif',
                'status_akademik',
                'email',
                'nomor_telepon',
                'last_login_at',
            ]);
        });
    }
};
