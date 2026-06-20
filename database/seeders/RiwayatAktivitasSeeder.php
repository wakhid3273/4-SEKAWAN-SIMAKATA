<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\MahasiswaMagang;
use App\Models\FinalProject;
use App\Models\Perusahaan;
use Carbon\Carbon;

class RiwayatAktivitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil user dengan role 'user' (mahasiswa)
        $user = User::where('role', 'user')->first();
        
        if (!$user) {
            $this->command->error('User dengan role "user" tidak ditemukan!');
            return;
        }

        // Ambil beberapa perusahaan
        $perusahaan = Perusahaan::take(3)->get();
        
        if ($perusahaan->isEmpty()) {
            $this->command->error('Tidak ada data perusahaan!');
            return;
        }

        // 1. Buat pengajuan magang yang disetujui (kemarin)
        MahasiswaMagang::create([
            'user_id' => $user->id,
            'perusahaan_id' => $perusahaan[0]->id,
            'nama' => $user->nama_lengkap,
            'nim' => $user->nim,
            'kegiatan' => 'Magang',
            'status' => 'Disetujui',
            'angkatan' => '2021',
            'posisi' => 'Digital Business & Technology',
            'periode' => '2026-01-15 s/d 2026-06-15',
            'cv_file' => 'dummy/cv.pdf',
            'transkrip_file' => 'dummy/transkrip.pdf',
            'created_at' => Carbon::yesterday()->setTime(9, 45),
            'updated_at' => Carbon::yesterday()->setTime(9, 45),
        ]);

        // 2. Buat pengajuan KP yang pending (hari ini)
        MahasiswaMagang::create([
            'user_id' => $user->id,
            'perusahaan_id' => $perusahaan[1]->id,
            'nama' => $user->nama_lengkap,
            'nim' => $user->nim,
            'kegiatan' => 'Kerja Praktik',
            'status' => 'Pending Review',
            'angkatan' => '2021',
            'posisi' => 'Back-end Developer',
            'periode' => '2026-07-01 s/d 2026-09-30',
            'cv_file' => 'dummy/cv.pdf',
            'transkrip_file' => 'dummy/transkrip.pdf',
            'created_at' => Carbon::today()->setTime(8, 30),
            'updated_at' => Carbon::today()->setTime(8, 30),
        ]);

        // 3. Buat pengajuan TA yang disetujui (2 hari lalu)
        FinalProject::create([
            'user_id' => $user->id,
            'title' => 'Analisis Sentimen Berbasis Deep Learning pada Media Sosial',
            'status' => 'approved',
            'submitted_at' => Carbon::now()->subDays(2)->setTime(16, 0),
            'created_at' => Carbon::now()->subDays(2)->setTime(16, 0),
            'updated_at' => Carbon::now()->subDays(2)->setTime(16, 0),
        ]);

        // 4. Buat pengajuan magang yang ditolak (minggu lalu)
        if (isset($perusahaan[2])) {
            MahasiswaMagang::create([
                'user_id' => $user->id,
                'perusahaan_id' => $perusahaan[2]->id,
                'nama' => $user->nama_lengkap,
                'nim' => $user->nim,
                'kegiatan' => 'Magang',
                'status' => 'Ditolak',
                'alasan_penolakan' => 'Kuota untuk posisi Back-end Developer sudah penuh.',
                'angkatan' => '2021',
                'posisi' => 'Back-end Developer',
                'periode' => '2026-02-01 s/d 2026-07-01',
                'cv_file' => 'dummy/cv.pdf',
                'transkrip_file' => 'dummy/transkrip.pdf',
                'created_at' => Carbon::now()->subDays(8)->setTime(16, 0),
                'updated_at' => Carbon::now()->subDays(8)->setTime(16, 0),
            ]);
        }

        $this->command->info('✅ Riwayat aktivitas berhasil dibuat untuk user: ' . $user->nama_lengkap);
    }
}
