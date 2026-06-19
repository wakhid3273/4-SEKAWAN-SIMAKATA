<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VerifikasiSeeder extends Seeder
{
    public function run(): void
    {
        // ── Users (mahasiswa) ───────────────────────────────────────────
        $mahasiswaData = [
            ['nim'=>'1201210045','nama_lengkap'=>'Ahmad Fauzi',    'angkatan'=>'2021','program_studi'=>'Informatika','email'=>'ahmad@student.ac.id'],
            ['nim'=>'1201210102','nama_lengkap'=>'Siti Aminah',    'angkatan'=>'2021','program_studi'=>'Informatika','email'=>'siti@student.ac.id'],
            ['nim'=>'1201200012','nama_lengkap'=>'Budi Santoso',   'angkatan'=>'2020','program_studi'=>'Informatika','email'=>'budi@student.ac.id'],
            ['nim'=>'1201210089','nama_lengkap'=>'Rizky Ramadhan', 'angkatan'=>'2021','program_studi'=>'Informatika','email'=>'rizky@student.ac.id'],
            ['nim'=>'1201210211','nama_lengkap'=>'Dewi Lestari',   'angkatan'=>'2021','program_studi'=>'Informatika','email'=>'dewi@student.ac.id'],
            ['nim'=>'1201200156','nama_lengkap'=>'Eko Prasetyo',   'angkatan'=>'2020','program_studi'=>'Informatika','email'=>'eko@student.ac.id'],
            ['nim'=>'1201210301','nama_lengkap'=>'Maya Indah',     'angkatan'=>'2021','program_studi'=>'Informatika','email'=>'maya@student.ac.id'],
            ['nim'=>'1201210023','nama_lengkap'=>'Putri Kencana',  'angkatan'=>'2021','program_studi'=>'Informatika','email'=>'putri@student.ac.id'],
            ['nim'=>'1201200111','nama_lengkap'=>'Robby Wijaya',   'angkatan'=>'2020','program_studi'=>'Informatika','email'=>'robby@student.ac.id'],
            ['nim'=>'1201210004','nama_lengkap'=>'Nila Sari',      'angkatan'=>'2021','program_studi'=>'Informatika','email'=>'nila@student.ac.id'],
        ];

        $userIds = [];
        foreach ($mahasiswaData as $m) {
            // Hindari duplikat
            $existing = DB::table('users')->where('nim', $m['nim'])->first();
            if ($existing) {
                $userIds[$m['nim']] = $existing->id;
                continue;
            }
            $id = DB::table('users')->insertGetId([
                'nim'           => $m['nim'],
                'password'      => Hash::make('password'),
                'role'          => 'user',
                'nama_lengkap'  => $m['nama_lengkap'],
                'angkatan'      => $m['angkatan'],
                'program_studi' => $m['program_studi'],
                'email'         => $m['email'],
                'status_akademik' => 'Aktif',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
            $userIds[$m['nim']] = $id;
        }

        // ── Perusahaan ──────────────────────────────────────────────────
        $perusahaanData = [
            ['nama'=>'Telkom Indonesia',  'lokasi'=>'Jakarta',  'jenis_kegiatan'=>'Kerja Praktek','jumlah_mahasiswa'=>5],
            ['nama'=>'Gojek (Goto)',       'lokasi'=>'Jakarta',  'jenis_kegiatan'=>'Magang',        'jumlah_mahasiswa'=>3],
            ['nama'=>'Bank Mandiri',       'lokasi'=>'Jakarta',  'jenis_kegiatan'=>'Kerja Praktek','jumlah_mahasiswa'=>4],
            ['nama'=>'Traveloka',          'lokasi'=>'Jakarta',  'jenis_kegiatan'=>'Magang',        'jumlah_mahasiswa'=>2],
            ['nama'=>'Tokopedia',          'lokasi'=>'Jakarta',  'jenis_kegiatan'=>'Magang',        'jumlah_mahasiswa'=>6],
            ['nama'=>'OVO',                'lokasi'=>'Jakarta',  'jenis_kegiatan'=>'Kerja Praktek','jumlah_mahasiswa'=>1],
            ['nama'=>'Shopee',             'lokasi'=>'Jakarta',  'jenis_kegiatan'=>'Magang',        'jumlah_mahasiswa'=>4],
            ['nama'=>'Dana',               'lokasi'=>'Jakarta',  'jenis_kegiatan'=>'Magang',        'jumlah_mahasiswa'=>3],
            ['nama'=>'Grab',               'lokasi'=>'Jakarta',  'jenis_kegiatan'=>'Kerja Praktek','jumlah_mahasiswa'=>2],
            ['nama'=>'Bukalapak',          'lokasi'=>'Jakarta',  'jenis_kegiatan'=>'Kerja Praktek','jumlah_mahasiswa'=>1],
        ];

        $perusahaanIds = [];
        foreach ($perusahaanData as $p) {
            $existing = DB::table('perusahaan')->where('nama', $p['nama'])->first();
            if ($existing) {
                $perusahaanIds[] = $existing->id;
                continue;
            }
            $perusahaanIds[] = DB::table('perusahaan')->insertGetId(array_merge($p, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // ── Mahasiswa Magang (KP/Magang records) ───────────────────────
        $kpData = [
            ['nim'=>'1201210045','posisi'=>'Data Scientist',      'periode'=>'3 Bulan','angkatan'=>'2021','pIdx'=>0],
            ['nim'=>'1201210102','posisi'=>'Product Manager',     'periode'=>'6 Bulan','angkatan'=>'2021','pIdx'=>1],
            ['nim'=>'1201200012','posisi'=>'Cyber Security',      'periode'=>'2 Bulan','angkatan'=>'2020','pIdx'=>2],
            ['nim'=>'1201210089','posisi'=>'Frontend Engineer',   'periode'=>'6 Bulan','angkatan'=>'2021','pIdx'=>3],
            ['nim'=>'1201210211','posisi'=>'UX Researcher',       'periode'=>'6 Bulan','angkatan'=>'2021','pIdx'=>4],
            ['nim'=>'1201200156','posisi'=>'Backend Developer',   'periode'=>'2 Bulan','angkatan'=>'2020','pIdx'=>5],
            ['nim'=>'1201210301','posisi'=>'Digital Marketing',   'periode'=>'6 Bulan','angkatan'=>'2021','pIdx'=>6],
            ['nim'=>'1201210023','posisi'=>'QA Engineer',         'periode'=>'6 Bulan','angkatan'=>'2021','pIdx'=>7],
            ['nim'=>'1201200111','posisi'=>'Mobile Developer',    'periode'=>'3 Bulan','angkatan'=>'2020','pIdx'=>8],
            ['nim'=>'1201210004','posisi'=>'Cloud Architect',     'periode'=>'2 Bulan','angkatan'=>'2021','pIdx'=>9],
        ];

        foreach ($kpData as $k) {
            $uid = $userIds[$k['nim']] ?? null;
            if (!$uid) continue;
            $existing = DB::table('mahasiswa_magang')->where('nama', DB::table('users')->where('id',$uid)->value('nama_lengkap'))->first();
            if ($existing) continue;
            DB::table('mahasiswa_magang')->insert([
                'nama'         => DB::table('users')->where('id',$uid)->value('nama_lengkap'),
                'angkatan'     => $k['angkatan'],
                'posisi'       => $k['posisi'],
                'periode'      => $k['periode'],
                'perusahaan_id'=> $perusahaanIds[$k['pIdx']],
                'created_at'   => now()->subDays(rand(1,30)),
                'updated_at'   => now(),
            ]);
        }

        // ── Final Projects (Tugas Akhir) ────────────────────────────────
        $taData = [
            ['nim'=>'1201210045','title'=>'Analisis Sentimen Media Sosial menggunakan BERT','status'=>'pending',   'submitted_at'=>'2024-01-12'],
            ['nim'=>'1201210102','title'=>'Sistem Rekomendasi Berbasis Collaborative Filtering','status'=>'approved','submitted_at'=>'2024-01-10'],
            ['nim'=>'1201200012','title'=>'Deteksi Anomali Keamanan Jaringan dengan ML',       'status'=>'pending',  'submitted_at'=>'2024-01-08'],
            ['nim'=>'1201210089','title'=>'Optimasi Algoritma Pencarian Rute Terpendek',        'status'=>'rejected', 'submitted_at'=>'2024-01-05'],
            ['nim'=>'1201210211','title'=>'Perancangan UI/UX Aplikasi e-Commerce Mobile',       'status'=>'pending',  'submitted_at'=>'2024-01-04'],
            ['nim'=>'1201200156','title'=>'Implementasi Microservices dengan Docker & K8s',     'status'=>'approved', 'submitted_at'=>'2024-01-02'],
            ['nim'=>'1201210301','title'=>'Analisis Big Data Tren Pemasaran Digital',           'status'=>'pending',  'submitted_at'=>'2023-12-30'],
            ['nim'=>'1201210023','title'=>'Otomasi Pengujian Perangkat Lunak dengan Selenium',  'status'=>'pending',  'submitted_at'=>'2023-12-28'],
            ['nim'=>'1201200111','title'=>'Pengembangan Aplikasi Mobile Hybrid React Native',   'status'=>'approved', 'submitted_at'=>'2023-12-25'],
            ['nim'=>'1201210004','title'=>'Arsitektur Cloud-Native untuk Aplikasi Skala Besar', 'status'=>'pending',  'submitted_at'=>'2023-12-20'],
        ];

        foreach ($taData as $ta) {
            $uid = $userIds[$ta['nim']] ?? null;
            if (!$uid) continue;
            $existing = DB::table('final_projects')->where('user_id', $uid)->first();
            if ($existing) continue;
            DB::table('final_projects')->insert([
                'user_id'      => $uid,
                'title'        => $ta['title'],
                'status'       => $ta['status'],
                'submitted_at' => $ta['submitted_at'],
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
    }
}
