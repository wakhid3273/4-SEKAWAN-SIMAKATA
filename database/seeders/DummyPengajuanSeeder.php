<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MahasiswaMagang;
use App\Models\Perusahaan;

class DummyPengajuanSeeder extends Seeder
{
    public function run()
    {
        $perusahaan = Perusahaan::first();
        if (!$perusahaan) {
            $perusahaan = Perusahaan::create([
                'nama' => 'PT Telkom Indonesia',
            ]);
        }

        MahasiswaMagang::updateOrCreate(
            ['nim' => '12345678'],
            [
                'nama' => 'Aditya Dharmawan',
                'kegiatan' => 'Magang',
                'status' => 'Pending Review',
                'angkatan' => '2020',
                'posisi' => 'Frontend Developer',
                'periode' => 'Feb - Jun 2024 (5 Bulan)',
                'cv_file' => 'Curriculum Vitae.pdf',
                'transkrip_file' => 'Transkrip Nilai.pdf',
                'perusahaan_id' => $perusahaan->id
            ]
        );
    }
}
