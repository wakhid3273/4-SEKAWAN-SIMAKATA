<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\AdminActivityLog;
use Carbon\Carbon;

class AdminActivityLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil user admin
        $admin = User::where('role', 'admin')->first();
        
        if (!$admin) {
            $this->command->error('User admin tidak ditemukan!');
            return;
        }

        // Log aktivitas hari ini
        AdminActivityLog::create([
            'admin_id' => $admin->id,
            'action' => 'approve_ta',
            'subject_type' => 'FinalProject',
            'subject_id' => 1,
            'description' => 'Menyetujui Judul Tugas Akhir atas nama Jasmine Adzra Fakhirah (1102213041)',
            'details' => json_encode([
                'mahasiswa_nama' => 'Jasmine Adzra Fakhirah',
                'mahasiswa_nim' => '1102213041',
                'judul_ta' => 'Analisis Sentimen Berbasis Deep Learning pada Media Sosial',
            ]),
            'created_at' => Carbon::today()->setTime(9, 15),
            'updated_at' => Carbon::today()->setTime(9, 15),
        ]);

        AdminActivityLog::create([
            'admin_id' => $admin->id,
            'action' => 'approve_kp',
            'subject_type' => 'MahasiswaMagang',
            'subject_id' => 1,
            'description' => 'Menyetujui pengajuan Magang atas nama Jasmine Adzra Fakhirah (1102213041)',
            'details' => json_encode([
                'mahasiswa_nama' => 'Jasmine Adzra Fakhirah',
                'mahasiswa_nim' => '1102213041',
                'kegiatan' => 'Magang',
            ]),
            'created_at' => Carbon::today()->setTime(10, 30),
            'updated_at' => Carbon::today()->setTime(10, 30),
        ]);

        // Log aktivitas kemarin
        AdminActivityLog::create([
            'admin_id' => $admin->id,
            'action' => 'create_perusahaan',
            'subject_type' => 'Perusahaan',
            'subject_id' => 1,
            'description' => 'Menambahkan perusahaan baru: PT Google Indonesia',
            'details' => json_encode([
                'nama' => 'PT Google Indonesia',
                'lokasi' => 'Jakarta',
            ]),
            'created_at' => Carbon::yesterday()->setTime(14, 20),
            'updated_at' => Carbon::yesterday()->setTime(14, 20),
        ]);

        AdminActivityLog::create([
            'admin_id' => $admin->id,
            'action' => 'reject_kp',
            'subject_type' => 'MahasiswaMagang',
            'subject_id' => 2,
            'description' => 'Menolak pengajuan Kerja Praktik atas nama Ahmad Fauzi (1102213042)',
            'details' => json_encode([
                'mahasiswa_nama' => 'Ahmad Fauzi',
                'mahasiswa_nim' => '1102213042',
                'kegiatan' => 'Kerja Praktik',
                'alasan_penolakan' => 'Dokumen tidak lengkap',
            ]),
            'created_at' => Carbon::yesterday()->setTime(16, 45),
            'updated_at' => Carbon::yesterday()->setTime(16, 45),
        ]);

        // Log aktivitas minggu lalu
        AdminActivityLog::create([
            'admin_id' => $admin->id,
            'action' => 'update_perusahaan',
            'subject_type' => 'Perusahaan',
            'subject_id' => 1,
            'description' => 'Mengubah data perusahaan: PT Telkom Indonesia',
            'details' => json_encode([
                'nama_lama' => 'PT Telkom Indonesia',
                'nama_baru' => 'PT Telkom Indonesia (Persero) Tbk',
                'lokasi' => 'Jakarta',
            ]),
            'created_at' => Carbon::now()->subDays(7)->setTime(11, 0),
            'updated_at' => Carbon::now()->subDays(7)->setTime(11, 0),
        ]);

        AdminActivityLog::create([
            'admin_id' => $admin->id,
            'action' => 'delete_perusahaan',
            'subject_type' => 'Perusahaan',
            'subject_id' => 99,
            'description' => 'Menghapus perusahaan: PT Startup XYZ',
            'details' => json_encode([
                'nama' => 'PT Startup XYZ',
            ]),
            'created_at' => Carbon::now()->subDays(10)->setTime(15, 30),
            'updated_at' => Carbon::now()->subDays(10)->setTime(15, 30),
        ]);

        $this->command->info('✅ Admin activity logs berhasil dibuat!');
    }
}
